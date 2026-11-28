@extends('layouts.app')

@section('title', isset($submission) ? 'AI evaluation' : 'AI Coach')

@section('content')
<div class="mx-auto max-w-5xl space-y-7 px-4 py-10 sm:px-6 lg:px-8">
    @if (! isset($submission))
        <section class="rounded-2xl border border-secondary/20 bg-gradient-to-br from-surface-container-high to-surface-container-low p-6 sm:p-10">
            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-secondary/10 text-secondary"><span class="material-symbols-outlined text-2xl" aria-hidden="true">neurology</span></span>
            <p class="admin-eyebrow mt-6">Coming soon</p>
            <h1 class="mt-2 text-3xl font-semibold tracking-tight sm:text-4xl">AI Coach is in progress</h1>
            <p class="mt-4 max-w-2xl leading-7 text-on-surface-variant">The conversational AI Coach is being built. You can already upload a source file for each challenge task and receive an automated score, strengths, and improvement suggestions.</p>
            <a class="admin-link-button admin-link-button--primary mt-6" href="{{ route('challenges.index') }}">Explore challenges</a>
        </section>
    @else
        <a href="{{ route('challenges.show', $submission->challenge) }}" class="inline-flex items-center gap-2 text-sm font-medium text-secondary hover:text-primary"><span class="material-symbols-outlined text-lg" aria-hidden="true">arrow_back</span>{{ $submission->challenge->title }}</a>
        <header><p class="admin-eyebrow">AI code review</p><h1 class="mt-2 text-3xl font-semibold tracking-tight">Task evaluation</h1><p class="mt-2 text-on-surface-variant">{{ $submission->challenge->title }} · {{ $submission->task?->description }} · Submitted {{ $submission->created_at->diffForHumans() }}</p></header>

        @if (session('evaluation_error'))
            <div role="alert" class="rounded-xl border border-error/25 bg-error-container/20 p-4 text-sm text-error">{{ session('evaluation_error') }} Your code is saved; you can retry the review.</div>
        @endif

        <details class="rounded-xl border border-white/10 bg-surface-container-low"><summary class="cursor-pointer px-4 py-3 text-sm font-medium">Uploaded file: {{ $submission->submission_file_name ?? 'Source file' }}</summary><pre class="max-h-96 overflow-auto whitespace-pre-wrap break-words border-t border-white/5 p-4 text-xs leading-5 text-on-surface-variant"><code>{{ $submission->submission_file_content }}</code></pre></details>

        @if ($submission->status === 'ai_failed')
            <div class="rounded-xl border border-tertiary/25 bg-tertiary/10 p-5"><h2 class="font-semibold">Evaluation not available yet</h2><p class="mt-2 text-sm text-on-surface-variant">The local AI service could not complete the review. Your submission has been saved.</p><form method="post" action="{{ route('submissions.evaluate', $submission) }}" class="mt-4">@csrf<button class="admin-button admin-button--primary" type="submit">Try again</button></form></div>
        @elseif ($submission->ai_score !== null)
            <section class="rounded-2xl border border-white/10 bg-surface-container-low p-5 sm:p-7">
                <div class="flex flex-wrap items-start justify-between gap-5"><div><p class="admin-eyebrow">AI score</p><p class="mt-2 text-5xl font-semibold tracking-tight text-secondary">{{ $submission->ai_score }}<span class="text-2xl text-on-surface-variant"> / 100</span></p></div><span class="admin-badge {{ $submission->ai_score > 80 ? 'admin-badge--accent' : '' }}">{{ $submission->status === 'completed' ? 'Peer review complete' : ($submission->appointment ? 'Peer review booked' : ($submission->ai_score > 80 ? 'Peer review unlocked' : 'AI review complete')) }}</span></div>
                <p class="mt-5 leading-7 text-on-surface-variant">{{ $submission->ai_description }}</p>
                <p class="mt-4 text-xs text-outline">Reviewed {{ $submission->ai_evaluated_at?->format('M j, Y H:i') }} · Static source review by the configured Ollama model.</p>
            </section>

            <div class="grid gap-5 lg:grid-cols-2">
                <section class="rounded-2xl border border-secondary/15 bg-surface-container-low p-5 sm:p-6" aria-labelledby="strengths-heading"><div class="flex items-center gap-2"><span class="material-symbols-outlined text-secondary" aria-hidden="true">check_circle</span><h2 id="strengths-heading" class="text-lg font-semibold">Strengths</h2></div><ul class="mt-4 space-y-3">@foreach ($submission->ai_strengths ?? [] as $strength)<li class="flex items-start gap-3 text-sm leading-6 text-on-surface-variant"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-secondary"></span><span>{{ $strength }}</span></li>@endforeach</ul></section>
                <section class="rounded-2xl border border-tertiary/15 bg-surface-container-low p-5 sm:p-6" aria-labelledby="weaknesses-heading"><div class="flex items-center gap-2"><span class="material-symbols-outlined text-tertiary" aria-hidden="true">lightbulb</span><h2 id="weaknesses-heading" class="text-lg font-semibold">Areas to improve</h2></div><ul class="mt-4 space-y-3">@foreach ($submission->ai_weaknesses ?? [] as $weakness)<li class="flex items-start gap-3 text-sm leading-6 text-on-surface-variant"><span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-tertiary"></span><span>{{ $weakness }}</span></li>@endforeach</ul></section>
            </div>

            @if ($submission->status === 'peer_review' && ! $submission->appointment)
                <section class="flex flex-wrap items-center justify-between gap-4 rounded-xl border border-secondary/20 bg-secondary/10 p-5"><div><h2 class="font-semibold">You unlocked peer evaluation</h2><p class="mt-1 text-sm text-on-surface-variant">Your score is above 80. Book an open slot with a colleague to get a human review.</p></div><a class="admin-link-button admin-link-button--primary" href="{{ route('peer-evaluations.index') }}">Find an evaluation slot</a></section>
            @endif

            @if ($submission->appointment?->status === 'booked')
                <section class="rounded-xl border border-secondary/20 bg-secondary/10 p-5"><h2 class="font-semibold">Peer evaluation booked</h2><p class="mt-2 text-sm text-on-surface-variant">{{ $submission->appointment->start_date->timezone(config('app.timezone'))->format('D, M j, Y · H:i') }}–{{ $submission->appointment->end_date->timezone(config('app.timezone'))->format('H:i') }} with {{ $submission->appointment->evaluator?->name ?? 'a colleague' }}.</p></section>
            @endif

            @if ($submission->appointment?->status === 'completed')
                <section class="rounded-xl border border-white/10 bg-surface-container-low p-5"><div class="flex flex-wrap items-center justify-between gap-3"><h2 class="text-lg font-semibold">Peer evaluation</h2><span class="admin-badge admin-badge--accent">{{ $submission->appointment->human_score }}/100</span></div><p class="mt-2 text-sm text-on-surface-variant">Reviewed by {{ $submission->appointment->evaluator?->name ?? 'a colleague' }}</p><p class="mt-4 whitespace-pre-line leading-7">{{ $submission->appointment->feedback }}</p></section>
            @endif
        @endif
    @endif
</div>
@endsection
