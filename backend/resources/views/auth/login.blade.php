@extends('layouts.app')

@section('title', 'Sign in')

@section('content')
<section class="auth-card">
    <div class="mb-7">
        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary-container/15 text-secondary"><span class="material-symbols-outlined text-2xl" aria-hidden="true">waving_hand</span></span>
        <p class="admin-eyebrow mt-5">Welcome back</p>
        <h1 class="mt-1 text-3xl font-semibold tracking-tight">Sign in</h1>
        <p class="mt-2 text-sm leading-6 text-on-surface-variant">Continue building your frontend skills and learning streak.</p>
    </div>

    @if ($errors->any())<div role="alert" class="mb-5 rounded-xl border border-error/25 bg-error-container/20 px-4 py-3 text-sm text-error">{{ $errors->first() }}</div>@endif

    <form method="post" action="{{ route('login.store') }}" class="auth-form">
        @csrf
        <label class="admin-form-field"><span class="admin-form-label">Email address</span><input class="form-control" required type="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus></label>
        <label class="admin-form-field"><span class="admin-form-label">Password</span><input class="form-control" required type="password" name="password" autocomplete="current-password"></label>
        <label class="form-check-row"><input type="checkbox" name="remember" value="1" @checked(old('remember'))><span>Remember me on this device</span></label>
        <button class="admin-button admin-button--primary mt-1 w-full" type="submit">Sign in</button>
    </form>

    <p class="mt-6 text-center text-sm text-on-surface-variant">New here? <a class="font-semibold text-secondary hover:text-primary" href="{{ route('register') }}">Create an account</a></p>
</section>
<p class="auth-footer">Administrator? <a class="font-semibold text-secondary hover:text-primary" href="{{ route('admin.login') }}">Sign in to admin</a></p>
@endsection
