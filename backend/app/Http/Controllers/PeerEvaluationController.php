<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\ChallengeSubmission;
use App\Models\EvaluationSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PeerEvaluationController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return view('pages.peer_evaluations', [
            'eligibleSubmissions' => ChallengeSubmission::with(['challenge', 'task'])
                ->where('user_id', $user->id)
                ->whereNotNull('challenge_task_id')
                ->where('status', 'peer_review')
                ->where('ai_score', '>', 80)
                ->whereDoesntHave('appointment', fn ($query) => $query->whereIn('status', ['booked', 'completed']))
                ->latest()
                ->get(),
            'peerSubmissions' => ChallengeSubmission::with(['challenge', 'appointment'])
                ->where('user_id', $user->id)
                ->whereNotNull('challenge_task_id')
                ->where('status', 'peer_review')
                ->where('ai_score', '>', 80)
                ->latest()
                ->get(),
            'openSlots' => EvaluationSlot::with('evaluator')
                ->where('status', 'open')
                ->where('start_date', '>', now())
                ->where('evaluator_id', '!=', $user->id)
                ->orderBy('start_date')
                ->get(),
            'mySlots' => EvaluationSlot::where('evaluator_id', $user->id)
                ->where('status', 'open')
                ->where('start_date', '>', now())
                ->orderBy('start_date')
                ->get(),
            'appointmentsToEvaluate' => Appointment::with(['user', 'submission.challenge', 'submission.task'])
                ->where('evaluator_id', $user->id)
                ->whereNotNull('submission_id')
                ->where('status', 'booked')
                ->orderBy('start_date')
                ->get(),
            'myAppointments' => Appointment::with(['evaluator', 'submission.challenge', 'submission.task'])
                ->where('user_id', $user->id)
                ->latest('start_date')
                ->get(),
        ]);
    }

    public function storeSlot(Request $request)
    {
        $data = $request->validate([
            'start_date' => ['required', 'date', 'after:now'],
            'end_date' => ['required', 'date', 'after:start_date'],
        ]);
        $start = Carbon::parse($data['start_date']);
        $end = Carbon::parse($data['end_date']);
        $duration = $start->diffInMinutes($end);

        if ($duration < 15 || $duration > 120) {
            throw ValidationException::withMessages([
                'end_date' => 'An evaluation slot must last between 15 minutes and 2 hours.',
            ]);
        }

        DB::transaction(function () use ($request, $start, $end): void {
            $userId = $request->user()->id;
            $slotOverlap = EvaluationSlot::where('evaluator_id', $userId)
                ->whereIn('status', ['open', 'booked'])
                ->where('start_date', '<', $end)
                ->where('end_date', '>', $start)
                ->exists();
            $appointmentOverlap = Appointment::where('status', 'booked')
                ->where(fn ($query) => $query->where('evaluator_id', $userId)->orWhere('user_id', $userId))
                ->where('start_date', '<', $end)
                ->where('end_date', '>', $start)
                ->exists();

            if ($slotOverlap || $appointmentOverlap) {
                throw ValidationException::withMessages([
                    'start_date' => 'You already have an evaluation slot or appointment during that time.',
                ]);
            }

            EvaluationSlot::create([
                'evaluator_id' => $userId,
                'start_date' => $start,
                'end_date' => $end,
                'status' => 'open',
            ]);
        });

        return redirect()->route('peer-evaluations.index')->with('success', 'Your evaluation slot is open for booking.');
    }

    public function destroySlot(Request $request, EvaluationSlot $slot)
    {
        abort_unless((int) $slot->evaluator_id === (int) $request->user()->id, 404);
        abort_unless($slot->status === 'open', 409, 'Only open slots can be removed.');

        $slot->delete();

        return redirect()->route('peer-evaluations.index')->with('success', 'Your open slot was removed.');
    }

    public function book(Request $request, EvaluationSlot $slot)
    {
        $data = $request->validate([
            'submission_id' => ['required', 'integer', 'exists:challenge_submissions,id'],
        ]);

        DB::transaction(function () use ($request, $slot, $data): void {
            $slot = EvaluationSlot::whereKey($slot->id)->lockForUpdate()->firstOrFail();
            abort_unless($slot->status === 'open' && $slot->start_date->isFuture(), 409, 'This evaluation slot is no longer available.');
            abort_if((int) $slot->evaluator_id === (int) $request->user()->id, 403, 'You cannot book your own evaluation slot.');

            $submission = ChallengeSubmission::whereKey($data['submission_id'])
                ->where('user_id', $request->user()->id)
                ->whereNotNull('challenge_task_id')
                ->where('status', 'peer_review')
                ->where('ai_score', '>', 80)
                ->lockForUpdate()
                ->firstOrFail();

            if ($submission->appointment()->whereIn('status', ['booked', 'completed'])->exists()) {
                throw ValidationException::withMessages([
                    'submission_id' => 'This submission already has a peer evaluation booked or completed.',
                ]);
            }

            $participantIds = [$slot->evaluator_id, $request->user()->id];
            $busy = Appointment::where('status', 'booked')
                ->where(fn ($query) => $query->whereIn('evaluator_id', $participantIds)->orWhereIn('user_id', $participantIds))
                ->where('start_date', '<', $slot->end_date)
                ->where('end_date', '>', $slot->start_date)
                ->exists();
            $userHasOpenSlot = EvaluationSlot::where('evaluator_id', $request->user()->id)
                ->whereIn('status', ['open', 'booked'])
                ->where('start_date', '<', $slot->end_date)
                ->where('end_date', '>', $slot->start_date)
                ->exists();

            if ($busy || $userHasOpenSlot) {
                throw ValidationException::withMessages([
                    'submission_id' => 'You or the evaluator already has an appointment during this time.',
                ]);
            }

            Appointment::create([
                'start_date' => $slot->start_date,
                'end_date' => $slot->end_date,
                'evaluator_id' => $slot->evaluator_id,
                'user_id' => $request->user()->id,
                'submission_id' => $submission->id,
                'evaluation_slot_id' => $slot->id,
                'status' => 'booked',
            ]);

            $slot->update(['status' => 'booked']);
        });

        return redirect()->route('peer-evaluations.index')->with('success', 'Your peer evaluation is booked.');
    }

    public function complete(Request $request, Appointment $appointment)
    {
        abort_unless((int) $appointment->evaluator_id === (int) $request->user()->id, 404);
        abort_unless($appointment->status === 'booked' && $appointment->submission_id, 409, 'This evaluation cannot be completed.');

        $data = $request->validate([
            'human_score' => ['required', 'integer', 'min:0', 'max:100'],
            'feedback' => ['required', 'string', 'max:5000'],
        ]);

        DB::transaction(function () use ($appointment, $data): void {
            $appointment = Appointment::whereKey($appointment->id)->lockForUpdate()->firstOrFail();
            abort_unless($appointment->status === 'booked', 409, 'This evaluation has already been completed.');

            $appointment->update([
                'human_score' => $data['human_score'],
                'feedback' => $data['feedback'],
                'status' => 'completed',
                'completed_at' => now(),
            ]);
            $appointment->slot?->update(['status' => 'completed']);
            $appointment->submission?->update(['status' => 'completed']);
        });

        return redirect()->route('peer-evaluations.index')->with('success', 'Your peer feedback was saved.');
    }
}
