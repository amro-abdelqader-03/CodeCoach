<!doctype html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0e131f">
    <title>@yield('title', 'Smart Coach') · {{ config('app.name', 'Smart Coach') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen bg-surface font-body-md text-on-surface antialiased">
    <header class="fixed inset-x-0 top-0 z-50 border-b border-outline-variant/30 bg-surface-container-lowest/90 shadow-[0_1px_8px_rgba(0,0,0,0.25)] backdrop-blur-xl">
        <div class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-4 px-5 lg:px-12">
            <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-2.5" aria-label="Smart Coach home">
                <img src="{{ asset('images/Brand_logo.png') }}" alt="" class="h-9 w-9 rounded-lg">
                <span class="font-headline-sm text-headline-sm font-semibold tracking-tight">Smart Coach</span>
            </a>
            <nav class="hidden items-center gap-1 md:flex" aria-label="Main navigation">
                <a href="{{ route('challenges.index') }}" @class(['rounded-full px-3 py-2 transition-colors hover:bg-surface-container-high hover:text-on-surface', 'bg-primary-container text-on-primary-container font-semibold' => request()->routeIs('challenges.*'), 'text-on-surface-variant' => ! request()->routeIs('challenges.*')])>Challenges</a>
                <a href="{{ route('how-it-works') }}" @class(['rounded-full px-3 py-2 transition-colors hover:bg-surface-container-high hover:text-on-surface', 'bg-primary-container text-on-primary-container font-semibold' => request()->routeIs('how-it-works'), 'text-on-surface-variant' => ! request()->routeIs('how-it-works')])>How it works</a>
                <a href="{{ route('gamification') }}" @class(['rounded-full px-3 py-2 transition-colors hover:bg-surface-container-high hover:text-on-surface', 'bg-primary-container text-on-primary-container font-semibold' => request()->routeIs('gamification'), 'text-on-surface-variant' => ! request()->routeIs('gamification')])>Gamification</a>
                <a href="{{ route('ai-evaluation') }}" @class(['rounded-full px-3 py-2 transition-colors hover:bg-surface-container-high hover:text-on-surface', 'bg-primary-container text-on-primary-container font-semibold' => request()->routeIs('ai-evaluation'), 'text-on-surface-variant' => ! request()->routeIs('ai-evaluation')])>AI Coach</a>
                <a href="{{ route('profile') }}" @class(['rounded-full px-3 py-2 transition-colors hover:bg-surface-container-high hover:text-on-surface', 'bg-primary-container text-on-primary-container font-semibold' => request()->routeIs('profile'), 'text-on-surface-variant' => ! request()->routeIs('profile')])>Profile</a>
            </nav>
            <div class="flex shrink-0 items-center gap-3">
                <a href="{{ route('challenges.create') }}" class="rounded-lg bg-gradient-to-r from-primary-container to-secondary-container px-4 py-2 font-medium text-on-primary-container shadow-[0_0_18px_-2px_rgba(77,142,255,0.35)] transition hover:brightness-110">Get started</a>
                <a href="{{ route('profile') }}" aria-label="Profile" class="flex h-9 w-9 items-center justify-center rounded-full bg-primary text-on-primary"><span class="material-symbols-outlined text-[19px]">person</span></a>
            </div>
        </div>
    </header>

    <main class="min-h-[calc(100vh-16rem)] pt-16">
        @yield('content')
    </main>

    <footer class="mt-auto border-t border-white/5 bg-surface-container-lowest">
        <div class="mx-auto max-w-7xl px-5 py-10 lg:px-12">
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <div class="lg:col-span-2">
                    <a href="{{ route('home') }}" class="mb-3 inline-flex items-center gap-2 font-headline-sm text-headline-sm font-semibold"><img src="{{ asset('images/Brand_logo.png') }}" alt="" class="h-8 w-8 rounded-md">Smart Coach</a>
                    <p class="max-w-md text-on-surface-variant">Practice frontend engineering with real website challenges, AI feedback, and a clear path to mastery.</p>
                </div>
                <div class="flex flex-col gap-2 text-on-surface-variant">
                    <span class="mb-1 text-xs font-semibold uppercase tracking-wider text-outline">Learn</span>
                    <a class="hover:text-secondary" href="{{ route('challenges.index') }}">Challenges</a>
                    <a class="hover:text-secondary" href="{{ route('how-it-works') }}">How it works</a>
                    <a class="hover:text-secondary" href="{{ route('gamification') }}">Gamification</a>
                </div>
                <div class="flex flex-col gap-2 text-on-surface-variant">
                    <span class="mb-1 text-xs font-semibold uppercase tracking-wider text-outline">Account</span>
                    <a class="hover:text-secondary" href="{{ route('profile') }}">Profile</a>
                    <a class="hover:text-secondary" href="{{ route('ai-evaluation') }}">AI Coach</a>
                    <a class="hover:text-secondary" href="{{ route('admin.dashboard') }}">Admin demo</a>
                </div>
            </div>
            <div class="mt-8 flex flex-col gap-2 border-t border-white/5 pt-5 text-sm text-outline sm:flex-row sm:items-center sm:justify-between">
                <span>© {{ date('Y') }} Smart Coach. All rights reserved.</span>
                <span>Built for developers who keep learning.</span>
            </div>
        </div>
    </footer>
    @stack('scripts')
</body>
</html>
