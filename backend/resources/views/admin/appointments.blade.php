@extends('layouts.admin')

@section('title', 'Appointments')
@section('page-heading', 'Appointments')

@section('content')
<div class="admin-page">
    <header class="admin-page-header">
        <div>
            <p class="admin-eyebrow">Coaching schedule</p>
            <h1 class="admin-page-heading">Appointments</h1>
            <p class="admin-page-description">Schedule non-overlapping evaluation sessions.</p>
        </div>
        <a class="admin-link-button admin-link-button--primary" href="{{ route('admin.appointments.create') }}">
            <span class="material-symbols-outlined text-lg" aria-hidden="true">event_available</span>
            Create appointment
        </a>
    </header>

    <section class="admin-panel" aria-labelledby="appointments-table-heading">
        <div class="admin-panel-header">
            <div>
                <h2 id="appointments-table-heading" class="admin-panel-title">Scheduled sessions</h2>
                <p class="admin-panel-copy">{{ $appointments->total() }} sessions in the schedule</p>
            </div>
        </div>
        <div class="admin-table-scroll">
            <table class="admin-table min-w-[780px]">
                <thead><tr><th>Date and time</th><th>Evaluator</th><th>User</th><th>Duration</th><th>Actions</th></tr></thead>
                <tbody>
                    @forelse ($appointments as $appointment)
                        <tr>
                            <td><span class="block font-medium">{{ $appointment->start_date->format('M j, Y') }}</span><span class="mt-1 block text-xs text-on-surface-variant">{{ $appointment->start_date->format('H:i') }} – {{ $appointment->end_date->format('H:i') }}</span></td>
                            <td>{{ $appointment->evaluator?->name ?? '—' }}</td>
                            <td>{{ $appointment->user?->name ?? '—' }}</td>
                            <td><span class="admin-badge">{{ $appointment->start_date->diffInMinutes($appointment->end_date) }} min</span></td>
                            <td>
                                <div class="admin-actions">
                                    <a class="admin-link-button admin-link-button--secondary admin-link-button--small" href="{{ route('admin.appointments.show', $appointment) }}">View</a>
                                    <a class="admin-link-button admin-link-button--secondary admin-link-button--small" href="{{ route('admin.appointments.edit', $appointment) }}">Edit</a>
                                    <form class="admin-inline-form" method="post" action="{{ route('admin.appointments.destroy', $appointment) }}" onsubmit="return confirm('Delete this appointment?')">
                                        @csrf @method('DELETE')
                                        <button class="admin-button admin-button--danger admin-button--small" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="admin-empty">No appointments yet. Schedule an evaluation session to get started.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($appointments->hasPages())<div class="border-t border-white/10 px-5 py-4">{{ $appointments->links() }}</div>@endif
    </section>
</div>
@endsection
