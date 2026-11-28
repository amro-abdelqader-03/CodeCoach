@extends('layouts.app')

@section('title', 'Peer evaluations')

@section('content')
<div class="mx-auto max-w-6xl space-y-10 px-4 py-10 sm:px-6 lg:px-8">
    <header><p class="admin-eyebrow">Learn together</p><h1 class="mt-2 text-3xl font-semibold tracking-tight">Peer evaluations</h1><p class="mt-2 max-w-2xl text-on-surface-variant">Book an open time with a colleague to review a submission, or open a slot so another learner can book you as their evaluator.</p></header>

    @if (session('success'))<p role="status" class="rounded-xl border border-secondary/20 bg-secondary/10 px-4 py-3 text-sm text-secondary">{{ session('success') }}</p>@endif
    @if ($errors->any())<div role="alert" class="rounded-xl border border-error/25 bg-error-container/20 px-4 py-3 text-sm text-error"><ul class="list-inside list-disc">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif

    <section class="grid gap-6 lg:grid-cols-[.85fr_1.15fr]">
        <div class="space-y-4 rounded-2xl border border-white/10 bg-surface-container-low p-5 sm:p-6">
            <div><p class="admin-eyebrow">Offer your time</p><h2 class="mt-1 text-xl font-semibold">Open an evaluation slot</h2><p class="mt-2 text-sm leading-6 text-on-surface-variant">Choose a future time between 15 minutes and 2 hours. Learners with an AI score above 80 can book it.</p></div>
            <form method="post" action="{{ route('peer-evaluations.slots.store') }}" class="grid gap-3">
                @csrf
                <label class="admin-form-field"><span class="admin-form-label">Start</span><input class="form-control" type="datetime-local" name="start_date" min="{{ now()->format('Y-m-d\TH:i') }}" value="{{ old('start_date') }}" required></label>
                <label class="admin-form-field"><span class="admin-form-label">End</span><input class="form-control" type="datetime-local" name="end_date" min="{{ now()->format('Y-m-d\TH:i') }}" value="{{ old('end_date') }}" required></label>
                <p class="form-help">Times use {{ config('app.timezone') }}.</p>
                <button class="admin-button admin-button--primary justify-self-start" type="submit"><span class="material-symbols-outlined text-lg" aria-hidden="true">event_available</span>Open slot</button>
            </form>
        </div>

        <div class="space-y-4 rounded-2xl border border-white/10 bg-surface-container-low p-5 sm:p-6">
            <div><p class="admin-eyebrow">Your availability</p><h2 class="mt-1 text-xl font-semibold">Open slots</h2></div>
            <div class="space-y-3">
                @forelse ($mySlots as $slot)
                    <article class="flex flex-wrap items-center justify-between gap-3 rounded-xl bg-surface-container-lowest/70 p-4"><div><p class="font-medium">{{ $slot->start_date->timezone(config('app.timezone'))->format('D, M j, Y') }}</p><p class="mt-1 text-sm text-on-surface-variant">{{ $slot->start_date->timezone(config('app.timezone'))->format('H:i') }}–{{ $slot->end_date->timezone(config('app.timezone'))->format('H:i') }}</p></div><form method="post" action="{{ route('peer-evaluations.slots.destroy', $slot) }}" onsubmit="return confirm('Remove this open slot?')">@csrf @method('DELETE')<button class="admin-button admin-button--danger admin-button--small" type="submit">Remove slot</button></form></article>
                @empty
                    <p class="rounded-xl bg-surface-container-lowest/70 p-4 text-sm text-on-surface-variant">You do not have any future slots open. Add one above to offer peer reviews.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="space-y-4" aria-labelledby="available-slots-heading">
        <div><p class="admin-eyebrow">Book a colleague</p><h2 id="available-slots-heading" class="text-2xl font-semibold">Available evaluation slots</h2><p class="mt-1 text-sm text-on-surface-variant">A submission needs an AI score above 80 before it can be booked for peer review.</p></div>
        @if ($eligibleSubmissions->isEmpty())
            <div class="rounded-xl border border-dashed border-outline-variant/50 bg-surface-container-low/60 p-5 text-sm text-on-surface-variant">@if ($peerSubmissions->isNotEmpty())You have a submission above 80. Its peer evaluation is already booked; you can see the appointment below.@else Submit challenge code and reach a score above 80 to unlock peer booking. @endif</div>
        @endif
        <div class="grid gap-4 md:grid-cols-2">
            @forelse ($openSlots as $slot)
                <article class="space-y-4 rounded-xl border border-white/10 bg-surface-container-low p-5">
                    <div class="flex items-start justify-between gap-3"><div><p class="font-semibold">{{ $slot->evaluator->name }}</p><p class="mt-1 text-sm text-on-surface-variant">{{ $slot->start_date->timezone(config('app.timezone'))->format('D, M j, Y') }}</p><p class="text-sm text-on-surface-variant">{{ $slot->start_date->timezone(config('app.timezone'))->format('H:i') }}–{{ $slot->end_date->timezone(config('app.timezone'))->format('H:i') }}</p></div><span class="admin-badge admin-badge--accent">Open</span></div>
                    @if ($eligibleSubmissions->isNotEmpty())
                        <form method="post" action="{{ route('peer-evaluations.book', $slot) }}" class="flex flex-wrap items-end gap-3">@csrf<label class="admin-form-field min-w-52 flex-1"><span class="admin-form-label">Submission</span><select class="form-control" name="submission_id" required>@foreach ($eligibleSubmissions as $submission)<option value="{{ $submission->id }}">{{ $submission->challenge->title }} — {{ $submission->task->description }} · {{ $submission->ai_score }}/100</option>@endforeach</select></label><button class="admin-button admin-button--primary" type="submit">Book this slot</button></form>
                    @endif
                </article>
            @empty
                <p class="rounded-xl border border-dashed border-outline-variant/50 p-5 text-sm text-on-surface-variant md:col-span-2">No colleagues have open evaluation slots at the moment. Check back later or open a slot to help another learner.</p>
            @endforelse
        </div>
    </section>

    <section class="space-y-4" aria-labelledby="reviews-to-complete-heading">
        <div><p class="admin-eyebrow">Your review queue</p><h2 id="reviews-to-complete-heading" class="text-2xl font-semibold">Evaluations to complete</h2><p class="mt-1 text-sm text-on-surface-variant">Read your colleague’s code and save a score with actionable feedback.</p></div>
        <div class="space-y-5">
            @forelse ($appointmentsToEvaluate as $appointment)
                <article class="space-y-4 rounded-2xl border border-white/10 bg-surface-container-low p-5 sm:p-6">
                    <div class="flex flex-wrap items-start justify-between gap-3"><div><h3 class="font-semibold">{{ $appointment->submission?->challenge?->title ?? 'Challenge submission' }}@if ($appointment->submission?->task) · {{ $appointment->submission->task->description }}@endif</h3><p class="mt-1 text-sm text-on-surface-variant">{{ $appointment->user->name }} · {{ $appointment->start_date->timezone(config('app.timezone'))->format('D, M j · H:i') }}–{{ $appointment->end_date->timezone(config('app.timezone'))->format('H:i') }}</p></div><span class="admin-badge">{{ $appointment->submission?->ai_score }}/100 AI score</span></div>
                    @if ($appointment->submission)
                        <details class="rounded-xl bg-surface-container-lowest/75"><summary class="cursor-pointer px-4 py-3 text-sm font-medium">Review file: {{ $appointment->submission->submission_file_name ?? 'Source file' }}</summary><pre class="max-h-96 overflow-auto whitespace-pre-wrap break-words border-t border-white/5 p-4 text-xs leading-5 text-on-surface-variant"><code>{{ $appointment->submission->submission_file_content }}</code></pre></details>
                        <form method="post" action="{{ route('peer-evaluations.appointments.complete', $appointment) }}" class="grid gap-4 rounded-xl border border-white/5 bg-surface-container-lowest/50 p-4 sm:grid-cols-[12rem_1fr_auto] sm:items-end">@csrf<label class="admin-form-field"><span class="admin-form-label">Human score</span><input class="form-control" name="human_score" type="number" min="0" max="100" required></label><label class="admin-form-field"><span class="admin-form-label">Feedback</span><textarea class="form-control" name="feedback" rows="3" maxlength="5000" required placeholder="Share concrete strengths and next steps"></textarea></label><button class="admin-button admin-button--primary" type="submit">Save review</button></form>
                    @endif
                </article>
            @empty
                <p class="rounded-xl border border-dashed border-outline-variant/50 p-5 text-sm text-on-surface-variant">You do not have any peer reviews to complete.</p>
            @endforelse
        </div>
    </section>

    <section class="space-y-4" aria-labelledby="my-appointments-heading">
        <div><p class="admin-eyebrow">Your sessions</p><h2 id="my-appointments-heading" class="text-2xl font-semibold">Appointments I booked</h2></div>
        <div class="grid gap-3 md:grid-cols-2">
            @forelse ($myAppointments as $appointment)
                <article class="rounded-xl border border-white/10 bg-surface-container-low p-5"><div class="flex items-start justify-between gap-3"><div><h3 class="font-semibold">{{ $appointment->submission?->challenge?->title ?? 'Peer evaluation' }}@if ($appointment->submission?->task) · {{ $appointment->submission->task->description }}@endif</h3><p class="mt-1 text-sm text-on-surface-variant">With {{ $appointment->evaluator?->name ?? 'colleague' }}</p><p class="mt-2 text-sm text-on-surface-variant">{{ $appointment->start_date->timezone(config('app.timezone'))->format('D, M j, Y · H:i') }}–{{ $appointment->end_date->timezone(config('app.timezone'))->format('H:i') }}</p></div><span class="admin-badge {{ $appointment->status === 'completed' ? 'admin-badge--accent' : '' }}">{{ ucfirst($appointment->status) }}</span></div>
                    @if ($appointment->human_score !== null)<p class="mt-3 text-sm text-secondary">Peer score: {{ $appointment->human_score }}/100</p><p class="mt-2 whitespace-pre-line text-sm leading-6 text-on-surface-variant">{{ $appointment->feedback }}</p>@endif
                    @if ($appointment->submission)<a class="mt-3 inline-block text-sm font-medium text-secondary hover:text-primary" href="{{ route('ai-evaluation.result', $appointment->submission) }}">View submission evaluation →</a>@endif
                </article>
            @empty
                <p class="rounded-xl border border-dashed border-outline-variant/50 p-5 text-sm text-on-surface-variant md:col-span-2">You have not booked a peer evaluation yet.</p>
            @endforelse
        </div>
    </section>
</div>
@endsection
