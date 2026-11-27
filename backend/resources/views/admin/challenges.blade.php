@extends('layouts.admin')

@section('title', 'Challenges')
@section('page-heading', 'Challenges')

@section('content')
<div class="admin-page">
    <header class="admin-page-header">
        <div>
            <p class="admin-eyebrow">Learning library</p>
            <h1 class="admin-page-heading">Challenges</h1>
            <p class="admin-page-description">Manage challenge content, owners, and tasks.</p>
        </div>
        <a class="admin-link-button admin-link-button--primary" href="{{ route('admin.challenges.create') }}">
            <span class="material-symbols-outlined text-lg" aria-hidden="true">add</span>
            Create challenge
        </a>
    </header>

    <section class="admin-panel" aria-labelledby="challenge-table-heading">
        <div class="admin-panel-header">
            <div>
                <h2 id="challenge-table-heading" class="admin-panel-title">Challenge library</h2>
                <p class="admin-panel-copy">{{ $challenges->total() }} challenges available</p>
            </div>
        </div>
        <div class="admin-table-scroll">
            <table class="admin-table min-w-[760px]">
                <thead><tr><th>Challenge</th><th>Difficulty</th><th>Owner</th><th>Tasks</th><th>Actions</th></tr></thead>
                <tbody>
                    @forelse ($challenges as $challenge)
                        <tr>
                            <td><div class="flex min-w-52 items-center gap-3">@if ($challenge->image)<img src="{{ asset('storage/'.$challenge->image) }}" alt="" class="h-11 w-14 shrink-0 rounded-lg object-cover">@else<span class="flex h-11 w-14 shrink-0 items-center justify-center rounded-lg bg-surface-container-high text-secondary"><span class="material-symbols-outlined" aria-hidden="true">code_blocks</span></span>@endif<span class="min-w-0"><span class="block max-w-xs truncate font-medium">{{ $challenge->title }}</span><span class="mt-1 block max-w-sm truncate text-xs text-on-surface-variant">{{ $challenge->description }}</span></span></div></td>
                            <td><span class="admin-badge {{ $challenge->difficulty === 'hard' ? 'admin-badge--danger' : ($challenge->difficulty === 'easy' ? 'admin-badge--accent' : '') }}">{{ ucfirst($challenge->difficulty) }}</span></td>
                            <td>{{ $challenge->user?->name ?? 'Unassigned' }}</td>
                            <td><span class="admin-badge">{{ $challenge->tasks->count() }} tasks</span></td>
                            <td>
                                <div class="admin-actions">
                                    <a class="admin-link-button admin-link-button--secondary admin-link-button--small" href="{{ route('admin.challenges.show', $challenge) }}">View</a>
                                    <a class="admin-link-button admin-link-button--secondary admin-link-button--small" href="{{ route('admin.challenges.edit', $challenge) }}">Edit</a>
                                    <form class="admin-inline-form" method="post" action="{{ route('admin.challenges.destroy', $challenge) }}" onsubmit="return confirm('Delete this challenge and its tasks?')">
                                        @csrf @method('DELETE')
                                        <button class="admin-button admin-button--danger admin-button--small" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="admin-empty">No challenges yet. Add one to build the learning library.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($challenges->hasPages())<div class="border-t border-white/10 px-5 py-4">{{ $challenges->links() }}</div>@endif
    </section>
</div>
@endsection
