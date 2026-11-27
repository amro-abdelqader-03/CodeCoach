@extends('layouts.admin')

@section('title', 'Users')
@section('page-heading', 'Users')

@section('content')
<div class="admin-page">
    <header class="admin-page-header">
        <div>
            <p class="admin-eyebrow">People</p>
            <h1 class="admin-page-heading">Users</h1>
            <p class="admin-page-description">Manage account access and learning progress.</p>
        </div>
        <a class="admin-link-button admin-link-button--primary" href="{{ route('admin.users.create') }}">
            <span class="material-symbols-outlined text-lg" aria-hidden="true">person_add</span>
            Create user
        </a>
    </header>

    <section class="admin-panel" aria-labelledby="users-table-heading">
        <div class="admin-panel-header">
            <div>
                <h2 id="users-table-heading" class="admin-panel-title">All accounts</h2>
                <p class="admin-panel-copy">{{ $users->total() }} accounts in the workspace</p>
            </div>
        </div>
        <div class="admin-table-scroll">
            <table class="admin-table min-w-[850px]">
                <thead><tr><th>User</th><th>Role</th><th>Level</th><th>XP</th><th>Coins</th><th>Plan</th><th>Actions</th></tr></thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>
                                <div class="flex min-w-48 items-center gap-3">
                                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-primary-container/20 text-xs font-semibold text-secondary">{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                                    <span class="min-w-0"><span class="block truncate font-medium text-on-surface">{{ $user->name }}</span><span class="mt-0.5 block truncate text-xs text-on-surface-variant">{{ $user->email }}</span></span>
                                </div>
                            </td>
                            <td><span class="admin-badge {{ $user->role === 'admin' ? 'admin-badge--accent' : '' }}">{{ ucfirst($user->role) }}</span></td>
                            <td class="font-label-mono">{{ $user->level }}</td>
                            <td class="font-label-mono">{{ number_format($user->xp) }}</td>
                            <td class="font-label-mono">{{ number_format($user->coins) }}</td>
                            <td>{{ ucfirst($user->plan) }}</td>
                            <td>
                                <div class="admin-actions">
                                    <a class="admin-link-button admin-link-button--secondary admin-link-button--small" href="{{ route('admin.users.show', $user) }}">View</a>
                                    <a class="admin-link-button admin-link-button--secondary admin-link-button--small" href="{{ route('admin.users.edit', $user) }}">Edit</a>
                                    <form class="admin-inline-form" method="post" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Delete this user?')">
                                        @csrf @method('DELETE')
                                        <button class="admin-button admin-button--danger admin-button--small" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="admin-empty">No users found. Create the first account to get started.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($users->hasPages())<div class="border-t border-white/10 px-5 py-4">{{ $users->links() }}</div>@endif
    </section>
</div>
@endsection
