@extends('layouts.admin')

@section('title', $title)
@section('page-heading', $title.' details')

@section('content')
<div class="admin-page admin-page--narrow">
    <header class="admin-page-header">
        <div>
            <a class="inline-flex items-center gap-1 text-sm font-medium text-secondary hover:text-primary" href="{{ url()->previous() }}"><span class="material-symbols-outlined text-base" aria-hidden="true">arrow_back</span>Back</a>
            <p class="admin-eyebrow mt-4">Record details</p>
            <h1 class="admin-page-heading">{{ $title }}</h1>
            <p class="admin-page-description">Review this record and its current values.</p>
        </div>
        @if ($record instanceof \App\Models\User)
            <a class="admin-link-button admin-link-button--secondary" href="{{ route('admin.users.edit', $record) }}">Edit user</a>
        @elseif ($record instanceof \App\Models\ShopItem)
            <a class="admin-link-button admin-link-button--secondary" href="{{ route('admin.items.edit', $record) }}">Edit item</a>
        @endif
    </header>

    @if ($record instanceof \App\Models\ShopItem)
        <section class="admin-panel p-5 sm:p-6">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                <img src="{{ asset('storage/'.$record->image) }}" alt="{{ $record->name }}" class="h-32 w-32 rounded-2xl border border-white/10 object-cover">
                <div><p class="admin-eyebrow">{{ ucfirst($record->type) }}</p><h2 class="mt-1 text-2xl font-semibold">{{ $record->name }}</h2><p class="mt-2 text-on-surface-variant">{{ number_format($record->price) }} {{ strtoupper($record->currency) }}</p><span class="admin-badge mt-3 {{ $record->is_active ? 'admin-badge--accent' : '' }}">{{ $record->is_active ? 'Available in shop' : 'Hidden from shop' }}</span></div>
            </div>
        </section>
    @endif

    <section class="admin-panel p-5 sm:p-6">
        <h2 class="admin-panel-title mb-4">Record information</h2>
        <dl class="admin-record-list">
            @foreach ($record->getAttributes() as $key => $value)
                @continue(in_array($key, ['password', 'remember_token', 'image']))
                <div class="admin-record-item">
                    <dt class="admin-record-label">{{ ucfirst(str_replace('_', ' ', $key)) }}</dt>
                    <dd class="admin-record-value">{{ $value === null || $value === '' ? '—' : $value }}</dd>
                </div>
            @endforeach
            @if ($record instanceof \App\Models\Appointment)
                <div class="admin-record-item"><dt class="admin-record-label">Evaluator</dt><dd class="admin-record-value">{{ $record->evaluator?->name ?? '—' }}</dd></div>
                <div class="admin-record-item"><dt class="admin-record-label">Learner</dt><dd class="admin-record-value">{{ $record->user?->name ?? '—' }}</dd></div>
            @endif
        </dl>
    </section>
</div>
@endsection
