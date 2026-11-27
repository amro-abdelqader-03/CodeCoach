@extends('layouts.app')

@section('title', $challenge->title)

@section('content')
<div class="mx-auto max-w-5xl space-y-7 px-4 py-9 sm:px-6 lg:px-8 lg:py-12">
    <a href="{{ route('challenges.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-secondary transition hover:text-primary"><span class="material-symbols-outlined text-lg" aria-hidden="true">arrow_back</span>All challenges</a>

    @if (session('success'))<p role="status" class="rounded-xl border border-secondary/20 bg-secondary/10 px-4 py-3 text-sm text-secondary">{{ session('success') }}</p>@endif

    <article class="overflow-hidden rounded-2xl border border-white/10 bg-surface-container-low shadow-xl">
        @if ($challenge->image)<img src="{{ asset('storage/'.$challenge->image) }}" alt="{{ $challenge->title }}" class="max-h-[30rem] w-full object-cover">@endif
        <div class="space-y-5 p-5 sm:p-8">
            <div class="flex flex-wrap items-center gap-2"><span class="rounded-full bg-primary-container/15 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-secondary">{{ ucfirst($challenge->difficulty) }} difficulty</span><span class="rounded-full bg-surface-container-high px-3 py-1 text-xs font-medium text-on-surface-variant">{{ $challenge->tasks->count() }} tasks</span></div>
            <div><h1 class="font-headline-xl text-3xl font-semibold tracking-tight sm:text-4xl">{{ $challenge->title }}</h1><p class="mt-3 text-sm text-on-surface-variant">Created by {{ $challenge->user?->name ?? 'CodeCoach' }}</p></div>
            <p class="whitespace-pre-line text-base leading-7 text-on-surface-variant">{{ $challenge->description }}</p>
        </div>
    </article>

    <section class="space-y-4" aria-labelledby="challenge-tasks-heading">
        <div><h2 id="challenge-tasks-heading" class="text-xl font-semibold">Build it in three steps</h2><p class="mt-1 text-sm text-on-surface-variant">Work through each part, then polish the page across screen sizes.</p></div>
        <div class="grid gap-3">
            @foreach ($challenge->tasks as $index => $task)
                <article class="rounded-xl border border-white/10 bg-surface-container-low p-4 sm:p-5">
                    <div class="flex items-start gap-3">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-primary-container/20 text-sm font-semibold text-secondary">{{ $index + 1 }}</span>
                        <div class="min-w-0 flex-1"><h3 class="font-medium leading-6">{{ $task->description }}</h3><div class="mt-3 flex flex-wrap gap-2">@forelse ($task->skills ?? [] as $skill)<span class="rounded-full bg-surface-container-high px-2.5 py-1 text-xs text-on-surface-variant">{{ $skill }}</span>@empty<span class="text-xs text-outline">No skill tags</span>@endforelse</div></div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</div>
@endsection
