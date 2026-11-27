@extends('layouts.admin')

@section('title', $challenge->title)
@section('page-heading', 'Challenge details')

@section('content')
<div class="admin-page admin-page--narrow">
    <header class="admin-page-header">
        <div>
            <a class="inline-flex items-center gap-1 text-sm font-medium text-secondary hover:text-primary" href="{{ route('admin.challenges') }}"><span class="material-symbols-outlined text-base" aria-hidden="true">arrow_back</span>Back to challenges</a>
            <p class="admin-eyebrow mt-4">Challenge details</p>
            <h1 class="admin-page-heading">{{ $challenge->title }}</h1>
            <p class="admin-page-description">Review the challenge brief, owner, and learning tasks.</p>
        </div>
        <a class="admin-link-button admin-link-button--primary" href="{{ route('admin.challenges.edit', $challenge) }}"><span class="material-symbols-outlined text-lg" aria-hidden="true">edit</span>Edit challenge</a>
    </header>

    <section class="admin-panel overflow-hidden">
        @if ($challenge->image)<img src="{{ asset('storage/'.$challenge->image) }}" alt="{{ $challenge->title }}" class="max-h-[28rem] w-full object-cover">@endif
        <div class="space-y-4 p-5 sm:p-7">
            <div class="flex flex-wrap items-center gap-2"><span class="admin-badge {{ $challenge->difficulty === 'hard' ? 'admin-badge--danger' : 'admin-badge--accent' }}">{{ ucfirst($challenge->difficulty) }} difficulty</span><span class="admin-badge">{{ $challenge->tasks->count() }} tasks</span></div>
            <p class="whitespace-pre-line leading-7 text-on-surface-variant">{{ $challenge->description }}</p>
            <div class="border-t border-white/10 pt-4 text-sm"><span class="text-on-surface-variant">Owner</span><span class="ml-2 font-medium">{{ $challenge->user?->name ?? 'Unassigned' }}</span></div>
        </div>
    </section>

    <section class="admin-panel p-5 sm:p-6" aria-labelledby="challenge-tasks-heading">
        <div class="mb-4"><h2 id="challenge-tasks-heading" class="admin-panel-title">Learning tasks</h2><p class="admin-panel-copy">The steps learners follow to complete this challenge.</p></div>
        <div class="grid gap-3">
            @forelse ($challenge->tasks as $index => $task)
                <article class="generator-task">
                    <div class="flex items-start gap-3">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-primary-container/20 text-sm font-semibold text-secondary">{{ $index + 1 }}</span>
                        <div class="min-w-0 flex-1"><p class="font-medium leading-6">{{ $task->description }}</p><div class="mt-3 flex flex-wrap gap-2">@forelse ($task->skills ?? [] as $skill)<span class="admin-badge">{{ $skill }}</span>@empty<span class="text-xs text-on-surface-variant">No skill tags</span>@endforelse</div></div>
                        <span class="admin-badge {{ $task->status === 'complete' ? 'admin-badge--accent' : '' }}">{{ ucfirst($task->status) }}</span>
                    </div>
                </article>
            @empty
                <p class="text-sm text-on-surface-variant">No tasks have been added yet.</p>
            @endforelse
        </div>
    </section>
</div>
@endsection
