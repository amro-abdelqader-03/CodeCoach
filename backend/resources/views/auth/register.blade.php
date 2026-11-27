@extends('layouts.app')

@section('title', 'Create account')

@section('content')
<section class="auth-card">
    <div class="mb-7">
        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary-container/15 text-secondary"><span class="material-symbols-outlined text-2xl" aria-hidden="true">person_add</span></span>
        <p class="admin-eyebrow mt-5">Start learning</p>
        <h1 class="mt-1 text-3xl font-semibold tracking-tight">Create your account</h1>
        <p class="mt-2 text-sm leading-6 text-on-surface-variant">Set up your profile to explore challenges and track your progress.</p>
    </div>

    @if ($errors->any())<div role="alert" class="mb-5 rounded-xl border border-error/25 bg-error-container/20 px-4 py-3 text-sm text-error">@foreach ($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>@endif

    <form method="post" action="{{ route('register.store') }}" class="auth-form">
        @csrf
        <label class="admin-form-field"><span class="admin-form-label">Full name</span><input class="form-control" required name="name" value="{{ old('name') }}" autocomplete="name" maxlength="255"></label>
        <label class="admin-form-field"><span class="admin-form-label">Email address</span><input class="form-control" required type="email" name="email" value="{{ old('email') }}" autocomplete="email"></label>
        <label class="admin-form-field"><span class="admin-form-label">Password</span><input class="form-control" required type="password" name="password" autocomplete="new-password" minlength="8"><span class="form-help">Use at least 8 characters.</span></label>
        <label class="admin-form-field"><span class="admin-form-label">Confirm password</span><input class="form-control" required type="password" name="password_confirmation" autocomplete="new-password" minlength="8"></label>
        <button class="admin-button admin-button--primary mt-1 w-full" type="submit">Create account</button>
    </form>

    <p class="mt-6 text-center text-sm text-on-surface-variant">Already have an account? <a class="font-semibold text-secondary hover:text-primary" href="{{ route('login') }}">Sign in</a></p>
</section>
@endsection
