@extends('layouts.app')

@section('title', 'Admin sign in')

@section('content')
<section class="auth-card">
    <div class="mb-7">
        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary-container/15 text-secondary"><span class="material-symbols-outlined text-2xl" aria-hidden="true">admin_panel_settings</span></span>
        <p class="admin-eyebrow mt-5">Administrator access</p>
        <h1 class="mt-1 text-3xl font-semibold tracking-tight">Admin sign in</h1>
        <p class="mt-2 text-sm leading-6 text-on-surface-variant">Sign in to manage learners, challenges, and coaching sessions.</p>
    </div>

    @if ($errors->any())<div role="alert" class="mb-5 rounded-xl border border-error/25 bg-error-container/20 px-4 py-3 text-sm text-error">{{ $errors->first() }}</div>@endif

    <form method="post" action="{{ route('admin.login.store') }}" class="auth-form">
        @csrf
        <label class="admin-form-field"><span class="admin-form-label">Admin email</span><input class="form-control" required type="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus></label>
        <label class="admin-form-field"><span class="admin-form-label">Password</span><input class="form-control" required type="password" name="password" autocomplete="current-password"></label>
        <label class="form-check-row"><input type="checkbox" name="remember" value="1" @checked(old('remember'))><span>Remember me on this device</span></label>
        <button class="admin-button admin-button--primary mt-1 w-full" type="submit">Sign in as admin</button>
    </form>

    <p class="mt-6 text-center text-sm text-on-surface-variant"><a class="font-semibold text-secondary hover:text-primary" href="{{ route('login') }}">User sign in</a></p>
</section>
@endsection
