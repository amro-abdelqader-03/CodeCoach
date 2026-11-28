@extends('layouts.app')

@section('title', $challenge->title)

@section('content')
<div class="mx-auto max-w-5xl space-y-7 px-4 py-9 sm:px-6 lg:px-8 lg:py-12">
    <a href="{{ route('challenges.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-secondary transition hover:text-primary"><span class="material-symbols-outlined text-lg" aria-hidden="true">arrow_back</span>All challenges</a>

    @if (session('success'))<p role="status" class="rounded-xl border border-secondary/20 bg-secondary/10 px-4 py-3 text-sm text-secondary">{{ session('success') }}</p>@endif
    @if ($errors->has('publish'))<p role="alert" class="rounded-xl border border-error/25 bg-error-container/20 px-4 py-3 text-sm text-error">{{ $errors->first('publish') }}</p>@endif
    @if ($errors->has('submission_file'))<p role="alert" class="rounded-xl border border-error/25 bg-error-container/20 px-4 py-3 text-sm text-error">{{ $errors->first('submission_file') }}</p>@endif

    <article class="overflow-hidden rounded-2xl border border-white/10 bg-surface-container-low shadow-xl">
        @if ($challenge->image)<img src="{{ asset('storage/'.$challenge->image) }}" alt="{{ $challenge->title }}" class="max-h-[30rem] w-full object-cover">@endif
        <div class="space-y-5 p-5 sm:p-8">
            <div class="flex flex-wrap items-center gap-2"><span class="rounded-full bg-primary-container/15 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-secondary">{{ ucfirst($challenge->difficulty) }} difficulty</span><span class="rounded-full bg-surface-container-high px-3 py-1 text-xs font-medium text-on-surface-variant">{{ $challenge->tasks->count() }} tasks</span><span class="admin-badge {{ $challenge->status === 'published' ? 'admin-badge--accent' : '' }}">{{ ucfirst($challenge->status) }}</span></div>
            <div class="flex flex-wrap items-start justify-between gap-4"><div><h1 class="font-headline-xl text-3xl font-semibold tracking-tight sm:text-4xl">{{ $challenge->title }}</h1><p class="mt-3 text-sm text-on-surface-variant">Created by {{ $challenge->user?->name ?? 'Smart Coach' }}</p></div>
                @if ($isOwner && $challenge->status === 'draft')
                    @if ($allTasksComplete)
                        <form method="post" action="{{ route('challenges.publish', $challenge) }}">@csrf<button class="admin-button admin-button--primary" type="submit">Publish challenge</button></form>
                    @else
                        <span class="admin-badge">Complete all tasks to publish</span>
                    @endif
                @endif
            </div>
            <p class="whitespace-pre-line text-base leading-7 text-on-surface-variant">{{ $challenge->description }}</p>
        </div>
    </article>

    <section class="space-y-4" aria-labelledby="challenge-tasks-heading">
        <div><h2 id="challenge-tasks-heading" class="text-xl font-semibold">Complete each task in order</h2><p class="mt-1 text-sm text-on-surface-variant">Upload one source file for each task. The next task unlocks after you submit the previous one.</p></div>
        <div class="grid gap-4">
            @foreach ($taskProgress as $index => $progress)
                @php($task = $progress['task'])
                @php($latestSubmission = $progress['latestSubmission'])
                <article class="space-y-4 rounded-xl border border-white/10 bg-surface-container-low p-4 sm:p-5">
                    <div class="flex items-start gap-3">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-primary-container/20 text-sm font-semibold text-secondary">{{ $index + 1 }}</span>
                        <div class="min-w-0 flex-1"><div class="flex flex-wrap items-center justify-between gap-2"><h3 class="font-medium leading-6">{{ $task->description }}</h3>
                            @if ($progress['completed'])<span class="admin-badge admin-badge--accent">Complete</span>@elseif ($progress['unlocked'])<span class="admin-badge">Ready</span>@else<span class="admin-badge">Locked</span>@endif
                        </div><div class="mt-3 flex flex-wrap gap-2">@forelse ($task->skills ?? [] as $skill)<span class="rounded-full bg-surface-container-high px-2.5 py-1 text-xs text-on-surface-variant">{{ $skill }}</span>@empty<span class="text-xs text-outline">No skill tags</span>@endforelse</div></div>
                    </div>

                    @if ($latestSubmission)
                        <div class="flex flex-wrap items-center justify-between gap-3 rounded-lg bg-surface-container-lowest/70 p-3"><div><p class="text-sm font-medium">Latest file: {{ $latestSubmission->submission_file_name }}</p><p class="mt-1 text-xs text-on-surface-variant">{{ ucfirst(str_replace('_', ' ', $latestSubmission->status)) }}@if ($latestSubmission->ai_score !== null) · AI score {{ $latestSubmission->ai_score }}/100 @endif</p></div><a class="text-sm font-medium text-secondary hover:text-primary" href="{{ route('ai-evaluation.result', $latestSubmission) }}">View evaluation →</a></div>
                    @endif

                    @if (auth()->check() && auth()->user()->role === 'user')
                        @if ($progress['unlocked'])
                            <form method="post" action="{{ route('submissions.store', [$challenge, $task]) }}" enctype="multipart/form-data" class="grid gap-3 rounded-lg border border-white/5 bg-surface-container-lowest/40 p-4 sm:grid-cols-[1fr_auto] sm:items-end">
                                @csrf
                                <label class="admin-form-field"><span class="admin-form-label">{{ $progress['completed'] ? 'Upload a new file for this task' : 'Submit your task file' }}</span><input class="form-control" type="file" name="submission_file" accept=".html,.css,.js,.jsx,.ts,.tsx,.vue,.json,.txt" required><span class="form-help">One UTF-8 source file, up to 2 MB: HTML, CSS, JS, JSX, TS, TSX, Vue, JSON, or TXT.</span></label>
                                <button class="admin-button admin-button--primary" type="submit"><span class="material-symbols-outlined text-lg" aria-hidden="true">upload_file</span>Submit file</button>
                            </form>
                        @else
                            <p class="rounded-lg bg-surface-container-lowest/50 p-3 text-sm text-on-surface-variant">Complete Task {{ $index }} first to unlock this task.</p>
                        @endif
                    @elseif (! auth()->check())
                        <p class="rounded-lg bg-surface-container-lowest/50 p-3 text-sm text-on-surface-variant"><a class="font-semibold text-secondary" href="{{ route('login') }}">Sign in</a> to submit a file for this task.</p>
                    @endif
                </article>
            @endforeach
        </div>
    </section>
</div>
@endsection
