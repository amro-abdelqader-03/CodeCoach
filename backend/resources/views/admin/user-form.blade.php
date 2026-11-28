@extends('layouts.admin')

@php($editing = isset($user))
@section('title', $editing ? 'Edit user' : 'Create user')
@section('page-heading', $editing ? 'Edit user' : 'Create user')

@section('content')
<div class="admin-page admin-page--narrow">
    <header class="admin-page-header">
        <div>
            <a class="inline-flex items-center gap-1 text-sm font-medium text-secondary hover:text-primary" href="{{ route('admin.users') }}"><span class="material-symbols-outlined text-base" aria-hidden="true">arrow_back</span>Back to users</a>
            <p class="admin-eyebrow mt-4">People</p>
            <h1 class="admin-page-heading">{{ $editing ? 'Edit user' : 'Create user' }}</h1>
            <p class="admin-page-description">{{ $editing ? 'Update account access and learning progress.' : 'Set up a new learner or administrator account.' }}</p>
        </div>
    </header>

    <form method="post" action="{{ $editing ? route('api.admin.users.update', $user) : route('api.admin.users.store') }}" data-api-form data-success-redirect="{{ route('admin.users') }}" enctype="multipart/form-data" class="admin-panel admin-form-card">
        @csrf
        @if ($editing) @method('PUT') @endif

        <section class="admin-form-section">
            <h2 class="admin-form-section-heading">Account details</h2>
            <p class="admin-form-section-copy">Name and sign-in information for this account.</p>
            <div class="admin-form-grid">
                <label class="admin-form-field">
                    <span class="admin-form-label">Full name</span>
                    <input class="form-control" name="name" value="{{ old('name', $user->name ?? '') }}" autocomplete="name" maxlength="255" required>
                    @error('name')<span class="form-error">{{ $message }}</span>@enderror
                </label>
                <label class="admin-form-field">
                    <span class="admin-form-label">Email address</span>
                    <input class="form-control" type="email" name="email" value="{{ old('email', $user->email ?? '') }}" autocomplete="email" maxlength="255" required>
                    @error('email')<span class="form-error">{{ $message }}</span>@enderror
                </label>
                <label class="admin-form-field">
                    <span class="admin-form-label">Password {{ $editing ? '(optional)' : '' }}</span>
                    <input class="form-control" type="password" name="password" autocomplete="new-password" minlength="8" {{ $editing ? '' : 'required' }}>
                    <span class="form-help">{{ $editing ? 'Leave blank to keep the current password.' : 'Use at least 8 characters.' }}</span>
                    @error('password')<span class="form-error">{{ $message }}</span>@enderror
                </label>
                <label class="admin-form-field">
                    <span class="admin-form-label">Role</span>
                    <select class="form-control" name="role" required>
                        <option value="user" @selected(old('role', $user->role ?? 'user') === 'user')>Learner</option>
                        <option value="admin" @selected(old('role', $user->role ?? '') === 'admin')>Administrator</option>
                    </select>
                    @error('role')<span class="form-error">{{ $message }}</span>@enderror
                </label>
                <label class="admin-form-field admin-form-field--wide">
                    <span class="admin-form-label">Profile picture</span>
                    <input class="form-control" type="file" name="profile_pic" accept="image/png,image/jpeg,image/webp">
                    <span class="form-help">PNG, JPG, or WEBP. Maximum 2 MB.</span>
                    @error('profile_pic')<span class="form-error">{{ $message }}</span>@enderror
                </label>
                @if ($editing && $user->profile_pic)
                    <div class="admin-form-field admin-form-field--wide"><span class="admin-form-label">Current picture</span><img src="{{ asset('storage/'.$user->profile_pic) }}" alt="Current profile picture for {{ $user->name }}" class="h-16 w-16 rounded-full border border-white/10 object-cover"></div>
                @endif
            </div>
        </section>

        <section class="admin-form-section">
            <h2 class="admin-form-section-heading">Learning progress</h2>
            <p class="admin-form-section-copy">Adjust the account’s level, rewards, and plan.</p>
            <div class="admin-form-grid">
                @foreach ([['level', 'Level', 1], ['xp', 'Experience points', 0], ['coins', 'Coins', 0], ['evaluation_points', 'Evaluation points', 0]] as [$field, $label, $minimum])
                    <label class="admin-form-field">
                        <span class="admin-form-label">{{ $label }}</span>
                        <input class="form-control" type="number" min="{{ $minimum }}" step="1" name="{{ $field }}" value="{{ old($field, $user->$field ?? ($field === 'level' ? 1 : ($field === 'evaluation_points' ? 5 : 0))) }}" required>
                        @error($field)<span class="form-error">{{ $message }}</span>@enderror
                    </label>
                @endforeach
                <label class="admin-form-field admin-form-field--wide">
                    <span class="admin-form-label">Plan</span>
                    <input class="form-control" name="plan" value="{{ old('plan', $user->plan ?? 'free') }}" maxlength="40" required>
                    @error('plan')<span class="form-error">{{ $message }}</span>@enderror
                </label>
            </div>
        </section>

        <div class="admin-form-actions">
            <button class="admin-button admin-button--primary" type="submit"><span class="material-symbols-outlined text-lg" aria-hidden="true">save</span>{{ $editing ? 'Save changes' : 'Create user' }}</button>
            <a class="admin-link-button admin-link-button--secondary" href="{{ route('admin.users') }}">Cancel</a>
        </div>
    </form>
</div>
@endsection
