<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\ChallengeSubmission;
use App\Models\ChallengeTask;
use App\Services\OllamaCodeEvaluationService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use RuntimeException;

class ChallengeSubmissionController extends Controller
{
    public function store(Request $request, Challenge $challenge, ChallengeTask $task, OllamaCodeEvaluationService $evaluator)
    {
        abort_unless(
            $challenge->status === 'published' || (int) $challenge->user_id === (int) $request->user()->id,
            404,
        );

        abort_unless((int) $task->challenge_id === (int) $challenge->id, 404);

        $data = $request->validate([
            'submission_file' => ['required', 'file', 'max:2048', 'extensions:html,css,js,jsx,ts,tsx,vue,json,txt'],
        ]);

        $tasks = $challenge->tasks()->orderBy('id')->get();
        $taskIndex = $tasks->search(fn (ChallengeTask $challengeTask): bool => (int) $challengeTask->id === (int) $task->id);
        abort_if($taskIndex === false, 404);

        $previousTaskIds = $tasks->take($taskIndex)->pluck('id');
        $completedPreviousCount = $previousTaskIds->isEmpty()
            ? 0
            : ChallengeSubmission::where('user_id', $request->user()->id)
                ->where('challenge_id', $challenge->id)
                ->whereIn('challenge_task_id', $previousTaskIds)
                ->whereNotNull('task_completed_at')
                ->pluck('challenge_task_id')
                ->unique()
                ->count();

        if ($completedPreviousCount !== $previousTaskIds->count()) {
            throw ValidationException::withMessages([
                'submission_file' => 'Complete the previous task before submitting this one.',
            ]);
        }

        $file = $data['submission_file'];
        $code = file_get_contents($file->getRealPath());
        if ($code === false || trim($code) === '' || ! mb_check_encoding($code, 'UTF-8')) {
            throw ValidationException::withMessages([
                'submission_file' => 'Upload a non-empty UTF-8 source file.',
            ]);
        }
        if (mb_strlen($code) > 80000) {
            throw ValidationException::withMessages([
                'submission_file' => 'Keep the source file under 80,000 characters so the local AI model can review it.',
            ]);
        }

        $fileName = $file->getClientOriginalName();
        $extension = strtolower($file->getClientOriginalExtension());
        $filePath = $file->storeAs(
            'submissions/'.$request->user()->id,
            Str::ulid().'.'.$extension,
            'local',
        );
        if (! is_string($filePath)) {
            throw ValidationException::withMessages([
                'submission_file' => 'The uploaded file could not be saved. Please try again.',
            ]);
        }

        $submission = $challenge->submissions()->create([
            'challenge_task_id' => $task->id,
            'user_id' => $request->user()->id,
            'html_code' => '',
            'submission_file_path' => $filePath,
            'submission_file_name' => $fileName,
            'submission_file_content' => $code,
            'submission_file_size' => $file->getSize(),
            'task_completed_at' => now(),
            'status' => 'ai_pending',
        ]);

        return $this->runEvaluation($submission, $evaluator);
    }

    public function evaluate(Request $request, ChallengeSubmission $submission, OllamaCodeEvaluationService $evaluator)
    {
        abort_unless((int) $submission->user_id === (int) $request->user()->id, 404);
        abort_unless($submission->challenge_task_id && $submission->submission_file_content !== null, 404);

        if ($submission->status !== 'ai_failed') {
            return redirect()->route('ai-evaluation.result', $submission);
        }

        return $this->runEvaluation($submission, $evaluator);
    }

    public function show(Request $request, ChallengeSubmission $submission)
    {
        abort_unless((int) $submission->user_id === (int) $request->user()->id, 404);

        return view('pages.ai_evaluation', [
            'submission' => $submission->load(['challenge', 'task', 'appointment.evaluator']),
        ]);
    }

    private function runEvaluation(ChallengeSubmission $submission, OllamaCodeEvaluationService $evaluator)
    {
        set_time_limit(300);

        try {
            $result = $evaluator->evaluate(
                $submission->challenge()->firstOrFail(),
                $submission->task()->firstOrFail(),
                $submission->submission_file_name,
                $submission->submission_file_content,
            );

            $submission->update([
                'status' => $result['score'] > 80 ? 'peer_review' : 'evaluated',
                'ai_score' => $result['score'],
                'ai_description' => $result['description'],
                'ai_strengths' => $result['strengths'],
                'ai_weaknesses' => $result['weaknesses'],
                'ai_evaluated_at' => now(),
            ]);
        } catch (RuntimeException $exception) {
            $submission->update(['status' => 'ai_failed']);

            return redirect()
                ->route('ai-evaluation.result', $submission)
                ->with('evaluation_error', $exception->getMessage());
        }

        return redirect()->route('ai-evaluation.result', $submission);
    }
}
