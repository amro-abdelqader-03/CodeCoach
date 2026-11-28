<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\ChallengeSubmission;
use App\Models\ShopItem;
use App\Services\OllamaChallengeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class UserPagesController extends Controller
{
    public function profile(Request $request)
    {
        return view('pages.profile', ['member' => $request->user()]);
    }

    public function progress(Request $request)
    {
        return view('pages.gamification', [
            'member' => $request->user(),
            'items' => ShopItem::where('is_active', true)->get(),
        ]);
    }

    public function challenges(Request $request)
    {
        $user = $request->user();
        $published = Challenge::with(['user', 'tasks'])
            ->where('status', 'published')
            ->when($user?->role === 'user', function ($query) use ($user): void {
                $query->where(function ($query) use ($user): void {
                    $query->whereNull('user_id')->orWhere('user_id', '!=', $user->id);
                });
            })
            ->latest()
            ->get();

        $myChallenges = $user?->role === 'user'
            ? $user->challenges()->with([
                'user',
                'tasks.submissions' => fn ($query) => $query
                    ->where('user_id', $user->id)
                    ->whereNotNull('task_completed_at'),
            ])->latest()->get()
            : collect();

        return view('pages.challenges', [
            'challenges' => $published,
            'myChallenges' => $myChallenges,
        ]);
    }

    public function challenge(Request $request, Challenge $challenge)
    {
        $isOwner = $request->user()?->role === 'user'
            && (int) $challenge->user_id === (int) $request->user()->id;
        abort_unless($challenge->status === 'published' || $isOwner, 404);

        $userId = $request->user()?->id ?? 0;
        $challenge->load([
            'user',
            'tasks.submissions' => fn ($query) => $query->where('user_id', $userId)->latest(),
        ]);

        $previousTasksComplete = true;
        $taskProgress = $challenge->tasks->values()->map(function ($task) use (&$previousTasksComplete): array {
            $completed = $task->submissions->contains(fn ($submission): bool => $submission->task_completed_at !== null);
            $progress = [
                'task' => $task,
                'latestSubmission' => $task->submissions->first(),
                'completed' => $completed,
                'unlocked' => $previousTasksComplete,
            ];
            $previousTasksComplete = $previousTasksComplete && $completed;

            return $progress;
        });
        $allTasksComplete = $taskProgress->isNotEmpty() && $taskProgress->every(fn (array $progress): bool => $progress['completed']);

        return view('pages.challenge_details', compact('challenge', 'isOwner', 'taskProgress', 'allTasksComplete'));
    }

    public function publishChallenge(Request $request, Challenge $challenge)
    {
        abort_unless((int) $challenge->user_id === (int) $request->user()->id, 404);
        abort_unless($challenge->status === 'draft', 409, 'Only draft challenges can be published.');

        $taskIds = $challenge->tasks()->pluck('id');
        $completedTaskIds = ChallengeSubmission::where('challenge_id', $challenge->id)
            ->where('user_id', $request->user()->id)
            ->whereIn('challenge_task_id', $taskIds)
            ->whereNotNull('task_completed_at')
            ->pluck('challenge_task_id')
            ->unique();

        if ($taskIds->isEmpty() || $completedTaskIds->count() !== $taskIds->count()) {
            throw ValidationException::withMessages([
                'publish' => 'Complete every challenge task before publishing it.',
            ]);
        }

        $challenge->update(['status' => 'published']);

        return redirect()->route('challenges.show', $challenge)->with('success', 'Your challenge is now published.');
    }

    public function storeChallenge(Request $request, OllamaChallengeService $covers)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:12000'],
            'difficulty' => ['required', 'in:easy,medium,hard'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'tasks' => ['required', 'array', 'size:3'],
            'tasks.*.description' => ['required', 'string', 'max:1200'],
            'tasks.*.skills' => ['nullable', 'string', 'max:500'],
        ]);

        $challenge = DB::transaction(function () use ($request, $data, $covers): Challenge {
            $challenge = $request->user()->challenges()->create([
                'title' => $data['title'],
                'description' => $data['description'],
                'difficulty' => $data['difficulty'],
                'image' => $request->hasFile('image')
                    ? $request->file('image')->store('challenges', 'public')
                    : $covers->storeGeneratedCover($data['title'], $data['difficulty']),
            ]);

            foreach ($data['tasks'] as $task) {
                $challenge->tasks()->create([
                    'description' => $task['description'],
                    'skills' => array_values(array_filter(array_map('trim', explode(',', $task['skills'] ?? '')))),
                    'status' => 'incomplete',
                ]);
            }

            return $challenge;
        });

        return redirect()->route('challenges.show', $challenge)->with('success', 'Your draft challenge is ready. Complete all three tasks to unlock publishing.');
    }
}
