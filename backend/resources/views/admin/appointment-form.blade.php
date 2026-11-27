@extends('layouts.admin')

@php($editing = isset($appointment))
@section('title', $editing ? 'Edit appointment' : 'Create appointment')
@section('page-heading', $editing ? 'Edit appointment' : 'Create appointment')

@section('content')
<div class="admin-page admin-page--narrow">
    <header class="admin-page-header">
        <div>
            <a class="inline-flex items-center gap-1 text-sm font-medium text-secondary hover:text-primary" href="{{ route('admin.appointments') }}"><span class="material-symbols-outlined text-base" aria-hidden="true">arrow_back</span>Back to appointments</a>
            <p class="admin-eyebrow mt-4">Coaching schedule</p>
            <h1 class="admin-page-heading">{{ $editing ? 'Edit appointment' : 'Schedule appointment' }}</h1>
            <p class="admin-page-description">Choose a time and the two participants for the evaluation.</p>
        </div>
    </header>

    <form method="post" action="{{ $editing ? route('admin.appointments.update', $appointment) : route('admin.appointments.store') }}" class="admin-panel admin-form-card">
        @csrf
        @if ($editing) @method('PUT') @endif

        <section class="admin-form-section !mt-0 !border-0 !pt-0">
            <h2 class="admin-form-section-heading">Session time</h2>
            <p class="admin-form-section-copy">Appointments use 30-minute increments.</p>
            <div class="admin-form-grid">
                <label class="admin-form-field admin-form-field--wide">
                    <span class="admin-form-label">Date</span>
                    <input class="form-control" type="date" min="{{ now()->addDay()->toDateString() }}" name="date" value="{{ old('date', $editing ? $appointment->start_date->toDateString() : '') }}" required>
                    @error('date')<span class="form-error">{{ $message }}</span>@enderror
                </label>
                <label class="admin-form-field">
                    <span class="admin-form-label">Start time</span>
                    <input class="form-control" type="time" step="1800" name="start_time" value="{{ old('start_time', $editing ? $appointment->start_date->format('H:i') : '') }}" required>
                    <span class="form-help">Choose a 30-minute interval.</span>
                    @error('start_time')<span class="form-error">{{ $message }}</span>@enderror
                </label>
                <label class="admin-form-field">
                    <span class="admin-form-label">End time</span>
                    <input class="form-control" type="time" step="1800" name="end_time" value="{{ old('end_time', $editing ? $appointment->end_date->format('H:i') : '') }}" required>
                    <span class="form-help">Must be after the start time.</span>
                    @error('end_time')<span class="form-error">{{ $message }}</span>@enderror
                </label>
            </div>
        </section>

        <section class="admin-form-section">
            <h2 class="admin-form-section-heading">Participants</h2>
            <p class="admin-form-section-copy">The evaluator and learner cannot be the same person.</p>
            <div class="admin-form-grid">
                <label class="admin-form-field">
                    <span class="admin-form-label">Evaluator</span>
                    <select class="form-control" name="evaluator_id" required>
                        <option value="">Select evaluator</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @selected((string) old('evaluator_id', $appointment->evaluator_id ?? '') === (string) $user->id)>{{ $user->name }} · {{ ucfirst($user->role) }}</option>
                        @endforeach
                    </select>
                    @error('evaluator_id')<span class="form-error">{{ $message }}</span>@enderror
                </label>
                <label class="admin-form-field">
                    <span class="admin-form-label">Learner</span>
                    <select class="form-control" name="user_id" required>
                        <option value="">Select learner</option>
                        @foreach ($users->where('role', 'user') as $user)
                            <option value="{{ $user->id }}" @selected((string) old('user_id', $appointment->user_id ?? '') === (string) $user->id)>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')<span class="form-error">{{ $message }}</span>@enderror
                </label>
            </div>
        </section>

        <div class="admin-form-actions">
            <button class="admin-button admin-button--primary" type="submit"><span class="material-symbols-outlined text-lg" aria-hidden="true">event_available</span>{{ $editing ? 'Save changes' : 'Schedule appointment' }}</button>
            <a class="admin-link-button admin-link-button--secondary" href="{{ route('admin.appointments') }}">Cancel</a>
        </div>
    </form>
</div>
@endsection
