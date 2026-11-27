<!doctype html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0e131f">
    <title>@yield('title', 'Admin') · Smart Coach</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body data-admin class="min-h-screen bg-background font-body-md text-on-surface antialiased selection:bg-primary-container selection:text-on-primary-container">
    <style>
        button { cursor: pointer; transition: background-color .15s ease, color .15s ease, filter .15s ease, box-shadow .15s ease; }
        button:hover:not(:disabled) { filter: brightness(1.08); }
        button:focus-visible, a:focus-visible, input:focus-visible, select:focus-visible, textarea:focus-visible { outline: 2px solid #7bd0ff; outline-offset: 2px; }
        button:disabled { cursor: not-allowed; opacity: .55; }
    </style>
    <aside id="admin-sidebar" class="fixed inset-y-0 left-0 z-50 flex w-64 -translate-x-full flex-col justify-between bg-surface-container-lowest shadow-xl transition-transform md:translate-x-0">
        <div class="flex min-h-0 flex-1 flex-col overflow-y-auto">
            <div class="flex h-16 items-center justify-between px-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
                    <img src="{{ asset('images/Brand_logo.png') }}" alt="" class="h-9 w-9 rounded-lg">
                    <span class="font-headline-sm text-headline-sm font-semibold">Smart Coach</span>
                </a>
                <span class="rounded bg-primary-container/20 px-2 py-1 text-[10px] font-semibold uppercase tracking-wider text-secondary">Admin</span>
            </div>
            <nav class="flex-1 space-y-1 px-2 py-4" aria-label="Admin navigation">
                @php($adminLinks = [
                    ['admin.dashboard', 'Dashboard', 'grid_view'],
                    ['admin.users', 'Users', 'group'],
                    ['admin.challenges', 'Challenges', 'code_blocks'],
                    ['admin.evaluations', 'Evaluations', 'analytics'],
                    ['admin.appointments', 'Appointments', 'calendar_month'],
                    ['admin.items', 'Shop items', 'shopping_bag'],
                    ['admin.reports', 'Reports', 'description'],
                    ['admin.settings', 'Settings', 'settings'],
                ])
                @foreach ($adminLinks as [$routeName, $label, $icon])
                    <a href="{{ route($routeName) }}" @class(['flex items-center gap-3 rounded-lg px-3 py-2.5 transition-colors', 'bg-surface-container-high font-medium text-on-surface shadow-[inset_0_1px_0_rgba(255,255,255,0.05)]' => request()->routeIs($routeName), 'text-on-surface-variant hover:bg-surface-container hover:text-on-surface' => ! request()->routeIs($routeName)])>
                        <span class="material-symbols-outlined text-[20px]">{{ $icon }}</span><span>{{ $label }}</span>
                    </a>
                @endforeach
            </nav>
        </div>
        <div class="space-y-1 border-t border-white/5 p-2">
            <a href="{{ route('home') }}" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-on-surface-variant transition-colors hover:bg-surface-container hover:text-on-surface"><span class="material-symbols-outlined text-[18px]">open_in_new</span><span>View site</span></a>
            <form method="post" action="{{ route('logout') }}">@csrf<button class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-left text-sm text-error transition-colors hover:bg-error-container/20"><span class="material-symbols-outlined text-[18px]">logout</span><span>Sign out</span></button></form>
        </div>
    </aside>
    <button id="admin-sidebar-backdrop" class="fixed inset-0 z-40 hidden bg-black/60 backdrop-blur-[2px] md:hidden" type="button" aria-label="Close navigation"></button>
    <div class="min-h-screen md:pl-64">
        <header class="fixed inset-x-0 top-0 z-40 flex h-16 items-center justify-between bg-surface-container-lowest/90 px-4 shadow-[0_1px_8px_rgba(0,0,0,0.12)] backdrop-blur-xl md:left-64 md:px-6">
            <div class="flex min-w-0 items-center gap-3">
                <button id="admin-menu-toggle" class="flex h-9 w-9 items-center justify-center rounded-lg text-on-surface-variant hover:bg-surface-container md:hidden" type="button" aria-label="Toggle navigation" aria-controls="admin-sidebar" aria-expanded="false"><span class="material-symbols-outlined">menu</span></button>
                <div class="flex min-w-0 items-center gap-2 text-sm"><span class="hidden text-on-surface-variant sm:inline">Admin</span><span class="hidden text-outline-variant sm:inline">/</span><span class="truncate font-medium text-on-surface">@yield('page-heading', 'Dashboard Overview')</span></div>
            </div>
            <div class="flex items-center gap-3">
                <label class="relative hidden lg:block"><span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[18px] text-outline">search</span><input class="w-64 rounded-lg bg-surface-container-low py-2 pl-9 pr-3 text-sm text-on-surface placeholder:text-outline focus:outline-none focus:ring-1 focus:ring-secondary" type="search" placeholder="Search admin..." aria-label="Search admin"></label>
                <span class="hidden items-center gap-2 rounded-full bg-surface-container-low px-3 py-1 text-[10px] font-semibold uppercase tracking-wide text-secondary xl:flex"><span class="h-2 w-2 animate-pulse rounded-full bg-secondary"></span>Core online</span>
                <button type="button" aria-label="Notifications" class="relative rounded-lg p-2 text-on-surface-variant hover:bg-surface-container"><span class="material-symbols-outlined">notifications</span><span class="absolute right-2 top-2 h-2 w-2 rounded-full bg-error"></span></button>
                <div class="flex items-center gap-2 border-l border-outline-variant/30 pl-3"><span class="flex h-8 w-8 items-center justify-center rounded-full bg-primary text-on-primary"><span class="material-symbols-outlined text-[18px]">person</span></span><span class="hidden max-w-32 truncate text-sm sm:block">{{ auth()->user()?->name ?? 'Admin' }}</span></div>
            </div>
        </header>
        <main class="min-h-screen pt-16">
            @if (session('success'))<div class="mx-auto max-w-[1440px] px-4 pt-5 sm:px-6 lg:px-10"><p role="status" class="rounded-xl border border-secondary/20 bg-secondary/10 px-4 py-3 text-sm text-secondary">{{ session('success') }}</p></div>@endif
            @if ($errors->any())<div class="mx-auto max-w-[1440px] px-4 pt-5 sm:px-6 lg:px-10"><div role="alert" class="rounded-xl border border-error/20 bg-error-container/20 px-4 py-3 text-sm text-error">@foreach ($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div></div>@endif
            @yield('content')
        </main>
    </div>
    <script>
        const sidebar = document.getElementById('admin-sidebar');
        const backdrop = document.getElementById('admin-sidebar-backdrop');
        const menuToggle = document.getElementById('admin-menu-toggle');
        const setSidebarOpen = (open) => {
            sidebar?.classList.toggle('-translate-x-full', !open);
            backdrop?.classList.toggle('hidden', !open);
            document.body.classList.toggle('overflow-hidden', open);
            menuToggle?.setAttribute('aria-expanded', String(open));
        };
        menuToggle?.addEventListener('click', () => setSidebarOpen(sidebar?.classList.contains('-translate-x-full')));
        backdrop?.addEventListener('click', () => setSidebarOpen(false));
        sidebar?.querySelectorAll('nav a').forEach((link) => link.addEventListener('click', () => setSidebarOpen(false)));
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') setSidebarOpen(false);
        });
    </script>
    @stack('scripts')
</body>
</html>
