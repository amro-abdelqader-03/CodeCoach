@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-heading', 'Dashboard')

@section('content')
<div class="admin-page">
    <section class="admin-page-header">
        <div>
            <p class="admin-eyebrow">{{ now()->format('l, F j, Y') }}</p>
            <h1 class="admin-page-heading">Platform overview</h1>
            <p class="admin-page-description">Here’s a quick look at how Smart Coach is doing.</p>
        </div>
        <a href="{{ route('admin.reports') }}" class="admin-link-button admin-link-button--primary">
            <span class="material-symbols-outlined text-[18px]">bar_chart</span>
            View reports
        </a>
    </section>

    <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4" aria-label="Platform overview">
        @foreach ([[$userCount, 'Users', 'group', 'Registered accounts'], [$challengeCount, 'Challenges', 'code_blocks', 'In the library'], [$appointmentCount, 'Appointments', 'event', 'Scheduled sessions'], [$itemCount, 'Shop items', 'shopping_bag', 'Available rewards']] as [$value, $label, $icon, $note])
            <article class="admin-stat-card">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="text-sm text-on-surface-variant">{{ $label }}</p>
                        <p class="mt-3 font-headline-xl text-headline-xl font-semibold">{{ $value }}</p>
                    </div>
                    <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-surface-container-high text-secondary" aria-hidden="true">
                        <span class="material-symbols-outlined">{{ $icon }}</span>
                    </span>
                </div>
                <p class="mt-3 text-xs text-on-surface-variant">{{ $note }}</p>
            </article>
        @endforeach
    </section>

    <div class="grid gap-6 xl:grid-cols-2">
        <section class="admin-panel" aria-labelledby="attention-heading">
            <div class="admin-panel-header">
                <div>
                    <h2 id="attention-heading" class="font-headline-sm text-headline-sm font-semibold">Needs attention</h2>
                    <p class="mt-1 text-sm text-on-surface-variant">Manage upcoming evaluations and sessions.</p>
                </div>
                <span class="rounded-full bg-primary-container/15 px-2.5 py-1 text-xs font-medium text-primary">{{ $appointments->count() }} upcoming</span>
            </div>
            <div class="divide-y divide-white/5">
                <a href="{{ route('admin.evaluations') }}" class="flex items-center justify-between gap-4 px-5 py-4 transition hover:bg-surface-container-high/50">
                    <span class="flex items-center gap-3">
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-surface-container-high text-secondary"><span class="material-symbols-outlined text-[19px]">rate_review</span></span>
                        <span><span class="block text-sm font-medium">Flagged evaluations</span><span class="mt-0.5 block text-xs text-on-surface-variant">Submissions that need a second look</span></span>
                    </span>
                    <span class="text-sm font-medium text-on-surface">{{ $appointments->count() }} <span class="material-symbols-outlined align-middle text-[18px] text-outline">chevron_right</span></span>
                </a>
                <a href="{{ route('admin.challenges') }}" class="flex items-center justify-between gap-4 px-5 py-4 transition hover:bg-surface-container-high/50">
                    <span class="flex items-center gap-3">
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-surface-container-high text-primary"><span class="material-symbols-outlined text-[19px]">pending_actions</span></span>
                        <span><span class="block text-sm font-medium">Challenges in review</span><span class="mt-0.5 block text-xs text-on-surface-variant">Drafts waiting for approval</span></span>
                    </span>
                    <span class="text-sm font-medium text-on-surface">{{ $challengeCount }} <span class="material-symbols-outlined align-middle text-[18px] text-outline">chevron_right</span></span>
                </a>
                <a href="{{ route('admin.appointments') }}" class="flex items-center justify-between gap-4 px-5 py-4 transition hover:bg-surface-container-high/50">
                    <span class="flex items-center gap-3">
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-surface-container-high text-tertiary"><span class="material-symbols-outlined text-[19px]">event</span></span>
                        <span><span class="block text-sm font-medium">Session requests</span><span class="mt-0.5 block text-xs text-on-surface-variant">Appointments awaiting confirmation</span></span>
                    </span>
                    <span class="text-sm font-medium text-on-surface">{{ $appointmentCount }} <span class="material-symbols-outlined align-middle text-[18px] text-outline">chevron_right</span></span>
                </a>
            </div>
        </section>

        <section class="admin-panel" aria-labelledby="activity-heading">
            <div class="admin-panel-header">
                <div>
                    <h2 id="activity-heading" class="font-headline-sm text-headline-sm font-semibold">Recent activity</h2>
                    <p class="mt-1 text-sm text-on-surface-variant">Latest updates from your community.</p>
                </div>
                <a href="{{ route('admin.users') }}" class="text-sm font-medium text-secondary transition hover:text-primary">All users</a>
            </div>
            <ul class="divide-y divide-white/5">
                @foreach ($recentUsers as $user)
                    <li class="flex items-center gap-3 px-5 py-4">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-surface-container-high text-xs font-semibold text-secondary">{{ strtoupper(substr($user->name,0,2)) }}</span>
                        <div class="min-w-0 flex-1">
                            <p class="truncate text-sm"><span class="font-medium">{{ $user->name }}</span> <span class="text-on-surface-variant">joined the platform</span></p>
                        </div>
                        <time class="shrink-0 text-xs text-on-surface-variant">{{ $user->created_at->diffForHumans() }}</time>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
</div>
@endsection
