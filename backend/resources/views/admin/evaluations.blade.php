@extends('layouts.admin')

@section('title', 'Evaluations')
@section('page-heading', 'Evaluation Queue')

@section('content')
<div class="admin-page">
    <section class="admin-page-header"><div><p class="admin-eyebrow">Quality assurance</p><h1 class="admin-page-heading">Evaluations</h1><p class="admin-page-description">AI reviews, score-gated peer reviews, and completed colleague feedback.</p></div></section>

    <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        @foreach ([[$evaluationCount, 'Submissions', 'assignment'], [$pendingCount, 'AI review pending', 'hourglass_top'], [$peerReviewCount, 'Peer reviews unlocked', 'groups'], [$averageScore.'%', 'Average AI score', 'grade']] as [$value, $label, $icon])
            <div class="admin-stat-card"><div class="flex items-center justify-between text-sm text-on-surface-variant"><span>{{ $label }}</span><span class="material-symbols-outlined text-secondary">{{ $icon }}</span></div><p class="mt-3 font-headline-xl text-headline-xl font-semibold">{{ $value }}</p></div>
        @endforeach
    </section>

    <section class="admin-panel">
        <div class="admin-panel-header"><div><h2 class="admin-panel-title">Challenge submissions</h2><p class="admin-panel-copy">AI feedback and peer evaluation outcomes saved for each submission.</p></div></div>
        <div class="admin-table-scroll"><table class="admin-table min-w-[900px]"><thead><tr><th>Challenge</th><th>Learner</th><th>AI score</th><th>Peer score</th><th>Status</th><th>Submitted</th></tr></thead><tbody>
            @forelse ($submissions as $submission)
                <tr><td><span class="font-medium">{{ $submission->challenge?->title ?? 'Deleted challenge' }}</span><span class="mt-1 block text-xs text-on-surface-variant">{{ $submission->task?->description ?? $submission->submission_file_name ?? 'Submission' }} · #{{ $submission->id }}</span></td><td>{{ $submission->user?->name ?? 'Deleted learner' }}</td><td class="font-label-mono text-secondary">{{ $submission->ai_score !== null ? $submission->ai_score.'/100' : '—' }}</td><td class="font-label-mono text-secondary">{{ $submission->appointment?->human_score !== null ? $submission->appointment->human_score.'/100' : '—' }}</td><td><span class="admin-badge {{ in_array($submission->status, ['peer_review', 'completed'], true) ? 'admin-badge--accent' : '' }}">{{ ucfirst(str_replace('_', ' ', $submission->status)) }}</span></td><td class="text-on-surface-variant">{{ $submission->created_at->format('M j, Y H:i') }}</td></tr>
            @empty
                <tr><td colspan="6" class="admin-empty">No challenge submissions yet.</td></tr>
            @endforelse
        </tbody></table></div>
        @if ($submissions->hasPages())<div class="border-t border-white/10 px-5 py-4">{{ $submissions->links() }}</div>@endif
    </section>
</div>
@endsection
