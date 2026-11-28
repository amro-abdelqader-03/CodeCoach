<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Challenge;
use App\Models\ChallengeSubmission;
use App\Models\ShopItem;
use App\Models\User;
use App\Services\OllamaChallengeService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class AdminApiController extends Controller
{
    public function dashboard(): JsonResponse
    {
        return response()->json([
            'data' => [
                'user_count' => User::where('role', 'user')->count(),
                'challenge_count' => Challenge::count(),
                'appointment_count' => Appointment::count(),
                'item_count' => ShopItem::count(),
                'appointments' => Appointment::with(['user', 'evaluator'])->latest()->take(5)->get(),
                'recent_users' => User::where('role', 'user')->latest()->take(4)->get(),
            ],
        ]);
    }

    public function me(Request $request): JsonResponse
    {
        return response()->json(['data' => $request->user()]);
    }

    public function users(): JsonResponse
    {
        return response()->json(User::latest()->paginate(15));
    }

    public function showUser(User $user): JsonResponse
    {
        return response()->json(['data' => $user]);
    }

    public function storeUser(Request $request): JsonResponse
    {
        $data = $request->validate($this->userRules());

        if ($request->hasFile('profile_pic')) {
            $data['profile_pic'] = $request->file('profile_pic')->store('profiles', 'public');
        }

        $user = User::create($data);

        return response()->json(['data' => $user], 201);
    }

    public function updateUser(Request $request, User $user): JsonResponse
    {
        $data = $request->validate($this->userRules($user, partial: true));

        if ($request->hasFile('profile_pic')) {
            $data['profile_pic'] = $request->file('profile_pic')->store('profiles', 'public');
        }

        if (empty($data['password'] ?? null)) {
            unset($data['password']);
        }

        $user->update($data);

        return response()->json(['data' => $user->fresh()]);
    }

    public function deleteUser(Request $request, User $user): Response
    {
        abort_if($user->is($request->user()), 403, 'You cannot delete your own account.');

        $user->delete();

        return response()->noContent();
    }

    public function challenges(): JsonResponse
    {
        return response()->json(
            Challenge::with(['user', 'tasks'])->latest()->paginate(15),
        );
    }

    public function showChallenge(Challenge $challenge): JsonResponse
    {
        return response()->json(['data' => $challenge->load(['user', 'tasks'])]);
    }

    public function storeChallenge(Request $request, OllamaChallengeService $covers): JsonResponse
    {
        $data = $request->validate($this->challengeRules());
        $challenge = $this->persistChallenge($request, $data, $covers);

        return response()->json(['data' => $challenge->load(['user', 'tasks'])], 201);
    }

    public function updateChallenge(Request $request, Challenge $challenge, OllamaChallengeService $covers): JsonResponse
    {
        $data = $request->validate($this->challengeRules(partial: true));
        $challenge = $this->persistChallenge($request, $data, $covers, $challenge);

        return response()->json(['data' => $challenge->load(['user', 'tasks'])]);
    }

    public function deleteChallenge(Challenge $challenge): Response
    {
        $challenge->delete();

        return response()->noContent();
    }

    public function appointments(): JsonResponse
    {
        return response()->json(
            Appointment::with(['user', 'evaluator'])->latest()->paginate(15),
        );
    }

    public function showAppointment(Appointment $appointment): JsonResponse
    {
        return response()->json(['data' => $appointment->load(['user', 'evaluator'])]);
    }

    public function storeAppointment(Request $request): JsonResponse
    {
        $appointment = Appointment::create($this->appointmentValues($request));

        return response()->json(['data' => $appointment->load(['user', 'evaluator'])], 201);
    }

    public function updateAppointment(Request $request, Appointment $appointment): JsonResponse
    {
        $appointment->update($this->appointmentValues($request, $appointment));

        return response()->json(['data' => $appointment->fresh()->load(['user', 'evaluator'])]);
    }

    public function deleteAppointment(Appointment $appointment): Response
    {
        $appointment->delete();

        return response()->noContent();
    }

    public function items(): JsonResponse
    {
        return response()->json(ShopItem::latest()->paginate(15));
    }

    public function showItem(ShopItem $item): JsonResponse
    {
        return response()->json(['data' => $item]);
    }

    public function storeItem(Request $request): JsonResponse
    {
        $data = $request->validate($this->itemRules());
        $data['image'] = $request->file('image')->store('shop', 'public');

        $item = ShopItem::create($data);

        return response()->json(['data' => $item], 201);
    }

    public function updateItem(Request $request, ShopItem $item): JsonResponse
    {
        $data = $request->validate($this->itemRules(partial: true));

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('shop', 'public');
        }

        $item->update($data);

        return response()->json(['data' => $item->fresh()]);
    }

    public function deleteItem(ShopItem $item): Response
    {
        $item->delete();

        return response()->noContent();
    }

    public function evaluations(): JsonResponse
    {
        return response()->json(
            ChallengeSubmission::with(['challenge', 'task', 'user', 'appointment.evaluator'])
                ->latest()
                ->paginate(15),
        );
    }

    public function reports(): JsonResponse
    {
        return response()->json([
            'data' => [
                'users' => User::where('role', 'user')->count(),
                'challenges' => Challenge::count(),
                'appointments' => Appointment::count(),
                'shop_items' => ShopItem::count(),
            ],
        ]);
    }

    public function settings(): JsonResponse
    {
        return response()->json([
            'data' => [
                'workspace_name' => config('app.name'),
                'support_email' => config('mail.from.address'),
            ],
        ]);
    }

    private function userRules(?User $user = null, bool $partial = false): array
    {
        $required = $partial ? 'sometimes|required' : 'required';
        $email = Rule::unique('users', 'email');

        if ($user) {
            $email->ignore($user->getKey());
        }

        return [
            'name' => [$required, 'string', 'max:255'],
            'email' => [$required, 'email', 'max:255', $email],
            'password' => $partial
                ? ['sometimes', 'nullable', 'string', 'min:8']
                : ['required', 'string', 'min:8'],
            'role' => [$required, Rule::in(['user', 'admin'])],
            'level' => [$required, 'integer', 'min:1'],
            'xp' => [$required, 'integer', 'min:0'],
            'coins' => [$required, 'integer', 'min:0'],
            'evaluation_points' => ['sometimes', 'integer', 'min:0'],
            'plan' => [$required, 'string', 'max:40'],
            'profile_pic' => ['sometimes', 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }

    private function challengeRules(bool $partial = false): array
    {
        $required = $partial ? 'sometimes|required' : 'required';

        return [
            'title' => [$required, 'string', 'max:255'],
            'description' => [$required, 'string'],
            'difficulty' => [$required, Rule::in(['easy', 'medium', 'hard'])],
            'status' => ['sometimes', Rule::in(['draft', 'published', 'archived'])],
            'user_id' => ['sometimes', 'nullable', 'exists:users,id'],
            'image' => ['sometimes', 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'tasks' => [$required, 'array', 'size:3'],
            'tasks.*.description' => ['required', 'string'],
            'tasks.*.skills' => ['sometimes', 'array'],
            'tasks.*.skills.*' => ['string', 'max:80'],
            'tasks.*.status' => ['sometimes', Rule::in(['incomplete', 'complete'])],
        ];
    }

    private function persistChallenge(
        Request $request,
        array $data,
        OllamaChallengeService $covers,
        ?Challenge $challenge = null,
    ): Challenge {
        $values = Arr::except($data, ['tasks']);

        if ($request->hasFile('image')) {
            $values['image'] = $request->file('image')->store('challenges', 'public');
        } elseif (! $challenge && empty($values['image'] ?? null)) {
            $values['image'] = $covers->storeGeneratedCover($data['title'], $data['difficulty']);
        } else {
            unset($values['image']);
        }

        return DB::transaction(function () use ($challenge, $values, $data): Challenge {
            $challenge ??= Challenge::create($values);

            if ($challenge->exists && $values !== [] && $challenge->wasRecentlyCreated === false) {
                $challenge->update($values);
            }

            if (array_key_exists('tasks', $data)) {
                $challenge->tasks()->delete();

                foreach ($data['tasks'] as $task) {
                    $challenge->tasks()->create([
                        'description' => $task['description'],
                        'skills' => array_values(array_filter(array_map('trim', $task['skills'] ?? []))),
                        'status' => $task['status'] ?? 'incomplete',
                    ]);
                }
            }

            return $challenge;
        });
    }

    private function appointmentValues(Request $request, ?Appointment $appointment = null): array
    {
        $data = $request->validate([
            'date' => ['required', 'date', 'after:today'],
            'start_time' => ['required', 'date_format:H:i', 'regex:/^(?:[01]\d|2[0-3]):(?:00|30)$/'],
            'end_time' => ['required', 'date_format:H:i', 'regex:/^(?:[01]\d|2[0-3]):(?:00|30)$/'],
            'evaluator_id' => ['required', 'exists:users,id', 'different:user_id'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $start = Carbon::parse($data['date'].' '.$data['start_time']);
        $end = Carbon::parse($data['date'].' '.$data['end_time']);

        if ($end->lessThanOrEqualTo($start)) {
            throw ValidationException::withMessages([
                'end_time' => ['End time must be after the start time.'],
            ]);
        }

        $participants = [$data['evaluator_id'], $data['user_id']];
        $busy = Appointment::query()
            ->when($appointment, fn ($query) => $query->whereKeyNot($appointment->getKey()))
            ->where(function ($query) use ($participants): void {
                $query->whereIn('evaluator_id', $participants)
                    ->orWhereIn('user_id', $participants);
            })
            ->where('start_date', '<', $end)
            ->where('end_date', '>', $start)
            ->exists();

        if ($busy) {
            throw ValidationException::withMessages([
                'start_time' => ['The evaluator or evaluated user already has an appointment during this time.'],
            ]);
        }

        return [
            'start_date' => $start,
            'end_date' => $end,
            'evaluator_id' => $data['evaluator_id'],
            'user_id' => $data['user_id'],
        ];
    }

    private function itemRules(bool $partial = false): array
    {
        $required = $partial ? 'sometimes|required' : 'required';

        return [
            'name' => [$required, 'string', 'max:255'],
            'type' => [$required, Rule::in(['sticker', 'avatar'])],
            'image' => $partial
                ? ['sometimes', 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096']
                : ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'currency' => [$required, Rule::in(['coins', 'xp'])],
            'price' => [$required, 'integer', 'min:0'],
            'is_active' => ['sometimes', 'boolean'],
        ];
    }
}
