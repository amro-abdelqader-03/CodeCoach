@extends('layouts.app')

@section('title', 'Challenges')

@section('content')
<div class="mx-auto max-w-6xl space-y-12 px-5 py-10">
    <header class="flex flex-wrap items-end justify-between gap-4">
        <div>
            <p class="admin-eyebrow">Practice by building</p>
            <h1 class="mt-2 text-3xl font-semibold tracking-tight">Challenges</h1>
            <p class="mt-2 text-on-surface-variant">Browse published challenges or manage the challenges you created.</p>
        </div>
        @auth
            @if (auth()->user()->role === 'user')
                <a class="admin-link-button admin-link-button--primary" href="{{ route('challenges.create') }}"><span class="material-symbols-outlined text-lg" aria-hidden="true">add</span>Create challenge</a>
            @endif
        @else
            <a class="admin-link-button admin-link-button--primary" href="{{ route('register') }}">Join to create a challenge</a>
        @endauth
    </header>

    @if (session('success'))<p role="status" class="rounded-xl border border-secondary/20 bg-secondary/10 px-4 py-3 text-sm text-secondary">{{ session('success') }}</p>@endif
    @if ($errors->has('publish'))<p role="alert" class="rounded-xl border border-error/25 bg-error-container/20 px-4 py-3 text-sm text-error">{{ $errors->first('publish') }}</p>@endif

    @auth
        @if (auth()->user()->role === 'user')
            <section id="my-challenges" class="space-y-5" aria-labelledby="my-challenges-heading">
                <div class="flex flex-wrap items-end justify-between gap-3">
                    <div><p class="admin-eyebrow">Your workspace</p><h2 id="my-challenges-heading" class="mt-1 text-2xl font-semibold">My challenges</h2><p class="mt-1 text-sm text-on-surface-variant">New challenges stay private drafts until you publish them.</p></div>
                    <span class="admin-badge">{{ $myChallenges->count() }} created</span>
                </div>
                <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    @forelse ($myChallenges as $challenge)
                        @php($completedTasks = $challenge->tasks->filter(fn ($task) => $task->submissions->isNotEmpty())->count())
                        <article class="overflow-hidden rounded-xl border border-white/10 bg-surface-container-low">
                            @if ($challenge->image)<img src="{{ asset('storage/'.$challenge->image) }}" alt="{{ $challenge->title }}" class="h-44 w-full object-cover">@endif
                            <div class="space-y-3 p-5">
                                <div class="flex items-center justify-between gap-2"><span class="text-xs uppercase text-secondary">{{ $challenge->difficulty }}</span><span class="admin-badge {{ $challenge->status === 'published' ? 'admin-badge--accent' : '' }}">{{ ucfirst($challenge->status) }}</span></div>
                                <h3 class="text-lg font-semibold">{{ $challenge->title }}</h3>
                                <p class="line-clamp-3 text-sm text-on-surface-variant">{{ $challenge->description }}</p>
                                <p class="text-xs text-outline">{{ $completedTasks }}/{{ $challenge->tasks->count() }} tasks complete · Created {{ $challenge->created_at->diffForHumans() }}</p>
                                <div class="flex flex-wrap items-center gap-3 pt-1">
                                    <a class="text-sm font-medium text-secondary hover:text-primary" href="{{ route('challenges.show', $challenge) }}">Open challenge →</a>
                                    @if ($challenge->status === 'draft')
                                        @if ($challenge->tasks->count() > 0 && $completedTasks === $challenge->tasks->count())
                                            <form method="post" action="{{ route('challenges.publish', $challenge) }}">@csrf<button class="admin-button admin-button--secondary admin-button--small" type="submit">Publish challenge</button></form>
                                        @else
                                            <span class="admin-badge">Complete all tasks to publish</span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="rounded-xl border border-dashed border-outline-variant/50 bg-surface-container-low/50 p-7 text-sm text-on-surface-variant sm:col-span-2 lg:col-span-3">You have not created a challenge yet. Create one from a website URL or screenshots to get started.</div>
                    @endforelse
                </div>
            </section>
        @endif
    @endauth

    <section class="space-y-5" aria-labelledby="published-challenges-heading">
        <div><p class="admin-eyebrow">Community library</p><h2 id="published-challenges-heading" class="mt-1 text-2xl font-semibold">Published challenges</h2><p class="mt-1 text-sm text-on-surface-variant">Pick a challenge, complete its tasks in order, and upload a source file for each AI review.</p></div>
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($challenges as $challenge)
                <article class="overflow-hidden rounded-xl border border-white/10 bg-surface-container-low">
                    @if ($challenge->image)<img src="{{ asset('storage/'.$challenge->image) }}" alt="{{ $challenge->title }}" class="h-44 w-full object-cover">@endif
                    <div class="space-y-2 p-5">
                        <p class="text-xs uppercase text-secondary">{{ $challenge->difficulty }}</p>
                        <h3 class="text-lg font-semibold">{{ $challenge->title }}</h3>
                        <p class="line-clamp-3 text-sm text-on-surface-variant">{{ $challenge->description }}</p>
                        <p class="text-xs text-outline">By {{ $challenge->user?->name ?? 'Smart Coach' }} · {{ $challenge->tasks->count() }} tasks</p>
                        <a class="inline-block pt-2 text-sm font-medium text-secondary hover:text-primary" href="{{ route('challenges.show', $challenge) }}">View challenge →</a>
                    </div>
                </article>
            @empty
                <p class="rounded-xl border border-dashed border-outline-variant/50 p-7 text-sm text-on-surface-variant sm:col-span-2 lg:col-span-3">No published challenges yet. Create one and publish it for other learners.</p>
            @endforelse
        </div>
    </section>
</div>
@endsection
