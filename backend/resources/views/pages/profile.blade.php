@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="flex flex-col w-full">
<div class="w-full max-w-7xl mx-auto px-6 lg:px-12 py-8 flex flex-col gap-8">
<!-- Top Navigation / Breadcrumb -->
<div class="flex items-center justify-between">
<nav class="flex items-center gap-2">
<a class="group inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-surface-container-high/60 hover:bg-surface-container-highest text-on-surface-variant hover:text-on-surface transition-all" data-path="challenges" href="{{ route('challenges.index') }}">
<span class="material-symbols-outlined text-[16px] text-primary transition-transform group-hover:-translate-x-0.5">arrow_back</span>
<span class="font-body-sm text-body-sm font-medium">Back to Challenges</span>
</a>
<span class="text-outline-variant font-label-mono text-label-mono">/</span>
<span class="font-body-sm text-body-sm text-on-surface font-medium">User Profile</span>
</nav>
<div class="flex items-center gap-2">
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-low shadow-sm">
<span class="h-2 w-2 rounded-full bg-secondary animate-pulse"></span>
<span class="font-label-mono text-label-mono text-secondary">Synchronized</span>
</div>
</div>
</div>
<!-- Profile Header Hero Card -->
<div class="relative overflow-hidden rounded-2xl bg-surface-container-low p-6 lg:p-8 shadow-xl">
<!-- Ambient Radial Backdrops -->
<div class="absolute -right-20 -top-20 w-96 h-96 rounded-full bg-primary-container/10 blur-3xl pointer-events-none"></div>
<div class="absolute -left-12 -bottom-12 w-80 h-80 rounded-full bg-secondary/10 blur-3xl pointer-events-none"></div>
<div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-8">
<!-- Left: Avatar & Identity -->
<div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
<!-- Avatar with Luminescent Layering -->
<div class="relative shrink-0 group">
<div class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl p-1 bg-gradient-to-tr from-secondary via-primary-container to-secondary-container shadow-[0_0_24px_rgba(123,208,255,0.35)] transition-all group-hover:shadow-[0_0_36px_rgba(123,208,255,0.6)]">
<img class="w-full h-full object-cover rounded-xl bg-surface-container-lowest" data-alt="Intense high-tech cinematic portrait of Alex Chen, an East Asian male software architect wearing modern dark minimalist developer hoodie with subtle neon cyan reflections and dark atmospheric coding room lighting." src="{{ asset('images/profile.png') }}"/>
</div>
<div class="absolute -bottom-2 -right-2 px-2 py-0.5 rounded-md bg-surface-container-highest shadow-md flex items-center gap-1">
<span class="material-symbols-outlined text-secondary text-[14px]" style="font-variation-settings: 'FILL' 1;">verified</span>
<span class="font-caption-caps text-caption-caps text-on-surface font-semibold tracking-wider">L14</span>
</div>
</div>
<!-- Names & Bio -->
<div class="flex flex-col gap-2 max-w-xl">
<div class="flex flex-wrap items-center gap-3">
<h1 class="font-headline-lg text-headline-lg font-bold text-on-surface tracking-tight">Alex Chen</h1>
<span class="font-label-mono text-label-mono text-outline">@alexchen_dev</span>
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-primary-container/20 text-primary font-caption-caps text-caption-caps uppercase tracking-wider font-semibold">
                Pro Member
              </span>
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-container/20 text-secondary font-caption-caps text-caption-caps uppercase tracking-wider font-semibold">
                Tier 1 Master
              </span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
              Fullstack enthusiast mastering modern CSS architecture, AST parsing &amp; responsive web interactions. Building high-velocity UI systems.
            </p>
<!-- Metadata Badges -->
<div class="flex flex-wrap items-center gap-2 pt-1">
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-surface-container-high text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[16px] text-outline">calendar_month</span>
<span>Member since Jan 2024</span>
</div>
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-surface-container-high text-secondary font-body-sm text-body-sm font-medium">
<span class="material-symbols-outlined text-[16px] text-secondary">local_fire_department</span>
<span>7-Day Streak 🔥</span>
</div>
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-surface-container-high text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[16px] text-outline">location_on</span>
<span>San Francisco, CA / UTC-8</span>
</div>
</div>
</div>
</div>
<!-- Right: Actions -->
<div class="flex sm:flex-row lg:flex-col items-stretch sm:items-center lg:items-end gap-3 shrink-0">
<button class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-surface-container-high hover:bg-surface-container-highest text-on-surface font-body-md text-body-md font-medium shadow-sm transition-all hover:scale-[1.02]" type="button">
<span class="material-symbols-outlined text-[18px]">edit</span>
<span>Edit Profile</span>
</button>
<button class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-primary-container to-secondary-container text-on-primary-container font-body-md text-body-md font-medium shadow-[0_0_20px_-2px_rgba(59,130,246,0.35)] hover:shadow-[0_0_28px_rgba(59,130,246,0.55)] transition-all hover:scale-[1.02]" type="button">
<span class="material-symbols-outlined text-[18px]">share</span>
<span>Share Profile ↗</span>
</button>
</div>
</div>
</div>
<!-- 4 Key Statistics Cards Overview -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
<!-- Card 1: My Appointments -->
<div class="relative overflow-hidden rounded-2xl bg-surface-container-low p-6 flex flex-col justify-between gap-4 shadow-lg hover:shadow-xl transition-all">
<div class="flex items-center justify-between">
<span class="font-body-sm text-body-sm font-semibold uppercase tracking-wider text-outline">Appointments</span>
<div class="w-10 h-10 rounded-xl bg-surface-container-high flex items-center justify-center shadow-inner">
<span class="material-symbols-outlined text-secondary text-[22px]">calendar_clock</span>
</div>
</div>
<div>
<div class="font-headline-xl text-headline-xl font-bold text-on-surface tracking-tight">3 Scheduled</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Next: Thu, Mar 20 at 02:30 PM</p>
</div>
<div class="pt-2 flex items-center justify-between">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-surface-container-high text-secondary font-caption-caps text-caption-caps font-semibold">
<span class="h-1.5 w-1.5 rounded-full bg-secondary"></span>
            1 Pending Review
          </span>
<span class="material-symbols-outlined text-outline text-[18px]">schedule</span>
</div>
</div>
<!-- Card 2: My Level -->
<div class="relative overflow-hidden rounded-2xl bg-surface-container-low p-6 flex flex-col justify-between gap-4 shadow-lg hover:shadow-xl transition-all">
<div class="flex items-center justify-between">
<span class="font-body-sm text-body-sm font-semibold uppercase tracking-wider text-outline">Tier Progression</span>
<div class="w-10 h-10 rounded-xl bg-surface-container-high flex items-center justify-center shadow-inner">
<span class="material-symbols-outlined text-primary text-[22px]" style="font-variation-settings: 'FILL' 1;">military_tech</span>
</div>
</div>
<div>
<div class="flex items-baseline justify-between">
<div class="font-headline-xl text-headline-xl font-bold text-on-surface tracking-tight">Level 14</div>
<span class="font-label-mono text-label-mono text-primary font-medium">81%</span>
</div>
<div class="w-full bg-surface-container-highest rounded-full h-2 mt-3 overflow-hidden">
<div class="bg-gradient-to-r from-primary to-secondary h-2 rounded-full shadow-[0_0_12px_rgba(123,208,255,0.7)]" style="width: 81%;"></div>
</div>
<div class="flex items-center justify-between font-label-mono text-label-mono text-outline mt-2 text-xs">
<span>4,850 XP</span>
<span>6,000 XP</span>
</div>
</div>
<div class="pt-1 flex items-center justify-between">
<span class="font-body-sm text-body-sm text-on-surface-variant font-medium">+150 XP to Staff UI Specialist</span>
<span class="material-symbols-outlined text-secondary text-[18px]">arrow_forward</span>
</div>
</div>
<!-- Card 3: Evaluation Points -->
<div class="relative overflow-hidden rounded-2xl bg-surface-container-low p-6 flex flex-col justify-between gap-4 shadow-lg hover:shadow-xl transition-all">
<div class="flex items-center justify-between">
<span class="font-body-sm text-body-sm font-semibold uppercase tracking-wider text-outline">Evaluation Points</span>
<div class="w-10 h-10 rounded-xl bg-surface-container-high flex items-center justify-center shadow-inner">
<span class="material-symbols-outlined text-secondary-container text-[22px]" style="font-variation-settings: 'FILL' 1;">bolt</span>
</div>
</div>
<div>
<div class="font-headline-xl text-headline-xl font-bold text-on-surface tracking-tight">12,450 XP</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Total lifetime XP from AI &amp; peer audits</p>
</div>
<div class="pt-2 flex items-center justify-between">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-secondary/10 text-secondary font-caption-caps text-caption-caps font-semibold">
<span class="material-symbols-outlined text-[14px]">trending_up</span>
            +650 this week
          </span>
<span class="font-label-mono text-label-mono text-outline">Top 3%</span>
</div>
</div>
<!-- Card 4: My Points -->
<div class="relative overflow-hidden rounded-2xl bg-surface-container-low p-6 flex flex-col justify-between gap-4 shadow-lg hover:shadow-xl transition-all">
<div class="flex items-center justify-between">
<span class="font-body-sm text-body-sm font-semibold uppercase tracking-wider text-outline">Store Points</span>
<div class="w-10 h-10 rounded-xl bg-surface-container-high flex items-center justify-center shadow-inner">
<span class="material-symbols-outlined text-primary text-[22px]" style="font-variation-settings: 'FILL' 1;">diamond</span>
</div>
</div>
<div>
<div class="font-headline-xl text-headline-xl font-bold text-on-surface tracking-tight">1,820 Points</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Available store currency to redeem perks</p>
</div>
<div class="pt-2 flex items-center justify-between">
<a class="inline-flex items-center gap-1 text-primary hover:text-primary-fixed transition-colors font-body-sm text-body-sm font-semibold" href="{{ route('challenges.index') }}">
<span>Redeem Rewards</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
<span class="material-symbols-outlined text-outline text-[18px]">shopping_bag</span>
</div>
</div>
</div>
<!-- Interactive Activity Calendar (GitHub Contributions style) -->
<div class="rounded-2xl bg-surface-container-low p-6 lg:p-8 shadow-xl flex flex-col gap-6">
<!-- Calendar Header & Controls -->
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
<div>
<div class="flex items-center gap-3">
<h2 class="font-headline-lg text-headline-lg font-bold text-on-surface">Activity Contributions</h2>
<span class="px-2.5 py-0.5 rounded-full bg-surface-container-high text-primary font-caption-caps text-caption-caps font-semibold">1,248 in 2025</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Interactive overview of code audits, AST challenges, and peer-to-peer mentoring sessions.</p>
</div>
<!-- Year Selector Pills -->
<div class="inline-flex p-1 rounded-xl bg-surface-container-lowest" id="yearSelector">
<button class="year-btn px-4 py-1.5 rounded-lg font-body-sm text-body-sm font-semibold bg-primary-container text-on-primary-container shadow-sm transition-all" data-year="2025" type="button">2025</button>
<button class="year-btn px-4 py-1.5 rounded-lg font-body-sm text-body-sm font-medium text-on-surface-variant hover:text-on-surface transition-all" data-year="2024" type="button">2024</button>
<button class="year-btn px-4 py-1.5 rounded-lg font-body-sm text-body-sm font-medium text-on-surface-variant hover:text-on-surface transition-all" data-year="2023" type="button">2023</button>
</div>
</div>
<!-- Contributions Scroll Viewport -->
<div class="w-full overflow-x-auto pb-3 pt-1">
<div class="min-w-[850px] flex flex-col gap-2">
<!-- Month Labels (X-Axis) -->
<div class="grid grid-cols-12 pl-8 font-label-mono text-label-mono text-outline text-xs">
<span>Jan</span>
<span>Feb</span>
<span>Mar</span>
<span>Apr</span>
<span>May</span>
<span>Jun</span>
<span>Jul</span>
<span>Aug</span>
<span>Sep</span>
<span>Oct</span>
<span>Nov</span>
<span>Dec</span>
</div>
<!-- Weekday Labels + Matrix Grid -->
<div class="flex gap-2">
<!-- Weekday Labels (Y-Axis) -->
<div class="flex flex-col justify-between py-1 font-label-mono text-label-mono text-outline text-xs w-6 select-none">
<span>Mon</span>
<span>Wed</span>
<span>Fri</span>
</div>
<!-- 53 Weeks Grid Columns -->
<div class="relative flex gap-1.5 flex-1" id="heatmapGrid">
<!-- Dynamically structured contribution cells (Pure HTML generation with interactive states) -->
<!-- Repeating weeks container -->
<div class="flex gap-1.5">
<!-- Sample Weeks with simulated heat distribution -->
<!-- Week 1 - 4 -->
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform" data-tip="Sun, Jan 05: 0 contributions"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform" data-tip="Mon, Jan 06: 2 challenges (+80 XP)"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform" data-tip="Tue, Jan 07: 0 contributions"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform" data-tip="Wed, Jan 08: 3 challenges (+140 XP)"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform" data-tip="Thu, Jan 09: 1 challenge (+50 XP)"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb] cursor-pointer hover:scale-125 transition-transform" data-tip="Fri, Jan 10: 4 challenges (+220 XP)"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform" data-tip="Sat, Jan 11: 0 contributions"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform" data-tip="Sun, Jan 12: 2 challenges (+100 XP)"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb] cursor-pointer hover:scale-125 transition-transform" data-tip="Mon, Jan 13: 4 challenges (+180 XP)"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#38bdf8] shadow-[0_0_8px_rgba(56,189,248,0.7)] cursor-pointer hover:scale-125 transition-transform" data-tip="Tue, Jan 14: 6 challenges, AI evaluation completed (+320 XP)"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform" data-tip="Wed, Jan 15: 3 challenges (+150 XP)"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform" data-tip="Thu, Jan 16: 1 challenge (+60 XP)"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform" data-tip="Fri, Jan 17: Rest day"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform" data-tip="Sat, Jan 18: 1 peer review (+40 XP)"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#38bdf8] shadow-[0_0_8px_rgba(56,189,248,0.7)] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform"></div>
</div>
<!-- Weeks 5 - 8 -->
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#38bdf8] shadow-[0_0_8px_rgba(56,189,248,0.7)] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#38bdf8] shadow-[0_0_8px_rgba(56,189,248,0.7)] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#38bdf8] shadow-[0_0_8px_rgba(56,189,248,0.7)] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform"></div>
</div>
<!-- Weeks 9 - 12 (March) -->
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#38bdf8] shadow-[0_0_8px_rgba(56,189,248,0.7)] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb] cursor-pointer hover:scale-125 transition-transform"></div>
<!-- The Active Highlighted Day (Wednesday, Mar 12, 2025) -->
<div class="relative group/day w-3 h-3 rounded-[3px] bg-[#38bdf8] shadow-[0_0_12px_rgba(56,189,248,0.9)] cursor-pointer scale-110">
<!-- High Fidelity Hover Tooltip -->
<div class="hidden group-hover/day:flex flex-col gap-1.5 absolute bottom-full left-1/2 -translate-x-1/2 mb-3 p-3 rounded-xl bg-surface-container-highest shadow-2xl z-50 w-64 pointer-events-none">
<div class="flex items-center justify-between pb-1 border-b border-surface-container">
<span class="font-body-sm text-body-sm font-semibold text-on-surface">Wed, Mar 12, 2025</span>
<span class="font-label-mono text-label-mono text-secondary font-semibold">+280 XP</span>
</div>
<div class="flex flex-col gap-1 text-xs font-body-sm text-on-surface-variant">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[14px] text-primary">check_circle</span>
<span>3 Challenges Completed</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[14px] text-secondary">smart_toy</span>
<span>2 AI Evaluations (Avg 91%)</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[14px] text-secondary-container">rate_review</span>
<span>1 Peer Review Conducted</span>
</div>
</div>
</div>
</div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#38bdf8] shadow-[0_0_8px_rgba(56,189,248,0.7)] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f] cursor-pointer hover:scale-125 transition-transform"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625] cursor-pointer hover:scale-125 transition-transform"></div>
</div>
<!-- Weeks 13 - 16 -->
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#38bdf8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#38bdf8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
</div>
<!-- Weeks 17 - 20 -->
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#38bdf8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#38bdf8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
</div>
<!-- Weeks 21 - 24 -->
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#38bdf8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#38bdf8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
</div>
<!-- Weeks 25 - 28 -->
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#38bdf8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#38bdf8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#38bdf8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
</div>
<!-- Weeks 29 - 32 -->
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#38bdf8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
</div>
<div class="flex flex-col gap-1.5">
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#38bdf8]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></div>
<div class="w-3 h-3 rounded-[3px] bg-[#111625]"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Legend and Footnote -->
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pt-2">
<div class="flex items-center gap-2 font-body-sm text-body-sm text-outline">
<span class="material-symbols-outlined text-[16px] text-secondary">info</span>
<span>Hover over active day tokens for detailed challenge and code review breakdowns.</span>
</div>
<div class="flex items-center gap-2 font-body-sm text-body-sm text-outline">
<span>Less</span>
<div class="flex items-center gap-1.5">
<span class="w-3 h-3 rounded-[3px] bg-[#111625]"></span>
<span class="w-3 h-3 rounded-[3px] bg-[#1e3a5f]"></span>
<span class="w-3 h-3 rounded-[3px] bg-[#1d63b8]"></span>
<span class="w-3 h-3 rounded-[3px] bg-[#2563eb]"></span>
<span class="w-3 h-3 rounded-[3px] bg-[#38bdf8] shadow-[0_0_8px_rgba(56,189,248,0.7)]"></span>
</div>
<span>More</span>
</div>
</div>
</div>
<!-- Recent Activity Feed -->
<div class="rounded-2xl bg-surface-container-low p-6 lg:p-8 shadow-xl flex flex-col gap-6">
<!-- Section Title & Link -->
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">history</span>
<h2 class="font-headline-lg text-headline-lg font-bold text-on-surface">Recent Activity</h2>
</div>
<a class="inline-flex items-center gap-1 text-primary hover:text-primary-fixed transition-colors font-body-sm text-body-sm font-semibold" href="{{ route('challenges.index') }}">
<span>View All History</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</a>
</div>
<!-- Activity Timeline List -->
<div class="flex flex-col gap-3">
<!-- Activity 1 -->
<div class="group flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 p-4 rounded-xl bg-surface-container hover:bg-surface-container-high transition-all shadow-sm">
<div class="flex items-start gap-4">
<div class="w-10 h-10 rounded-xl bg-secondary/10 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-secondary text-[20px]">check_box</span>
</div>
<div class="flex flex-col gap-1">
<span class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary transition-colors">
                Completed Challenge: Linear Minimalist SaaS Landing Page
              </span>
<div class="flex flex-wrap items-center gap-2 text-xs">
<span class="inline-flex items-center px-2 py-0.5 rounded-md bg-surface-container-highest text-on-surface-variant font-label-mono text-label-mono">
                  Score: 88/100
                </span>
<span class="inline-flex items-center px-2 py-0.5 rounded-md bg-secondary/10 text-secondary font-label-mono text-label-mono font-medium">
                  ⚡ +100 XP
                </span>
<span class="inline-flex items-center px-2 py-0.5 rounded-md bg-primary-container/20 text-primary font-label-mono text-label-mono font-medium">
                  💎 +100 Points
                </span>
</div>
</div>
</div>
<span class="font-label-mono text-label-mono text-outline shrink-0">Today, 11:42 AM</span>
</div>
<!-- Activity 2 -->
<div class="group flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 p-4 rounded-xl bg-surface-container hover:bg-surface-container-high transition-all shadow-sm">
<div class="flex items-start gap-4">
<div class="w-10 h-10 rounded-xl bg-primary-container/15 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-primary text-[20px]">calendar_month</span>
</div>
<div class="flex flex-col gap-1">
<span class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary transition-colors">
                Scheduled Human Evaluation appointment
              </span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                Slot confirmed for Thu, Mar 20, 2025 at 02:30 PM with peer reviewer
              </p>
</div>
</div>
<span class="font-label-mono text-label-mono text-outline shrink-0">Today, 10:15 AM</span>
</div>
<!-- Activity 3 -->
<div class="group flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 p-4 rounded-xl bg-surface-container hover:bg-surface-container-high transition-all shadow-sm">
<div class="flex items-start gap-4">
<div class="w-10 h-10 rounded-xl bg-secondary-container/15 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-secondary-container text-[20px]">smart_toy</span>
</div>
<div class="flex flex-col gap-1">
<span class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary transition-colors">
                Received AI Evaluation Report
              </span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                AST &amp; Pixel diff completed with 88% Match Confidence on Chromium 124
              </p>
</div>
</div>
<span class="font-label-mono text-label-mono text-outline shrink-0">Yesterday, 04:30 PM</span>
</div>
<!-- Activity 4 -->
<div class="group flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 p-4 rounded-xl bg-surface-container hover:bg-surface-container-high transition-all shadow-sm">
<div class="flex items-start gap-4">
<div class="w-10 h-10 rounded-xl bg-surface-container-highest flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-on-surface text-[20px]">rate_review</span>
</div>
<div class="flex flex-col gap-1">
<span class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary transition-colors">
                Submitted Peer Review
              </span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                Reviewed 'FinTech Analytics Dashboard' for <span class="text-secondary font-label-mono text-label-mono">@dev_sarah</span> (+50 XP bonus earned)
              </p>
</div>
</div>
<span class="font-label-mono text-label-mono text-outline shrink-0">2 days ago</span>
</div>
<!-- Activity 5 -->
<div class="group flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 p-4 rounded-xl bg-surface-container hover:bg-surface-container-high transition-all shadow-sm">
<div class="flex items-start gap-4">
<div class="w-10 h-10 rounded-xl bg-secondary/15 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-secondary text-[20px]" style="font-variation-settings: 'FILL' 1;">emoji_events</span>
</div>
<div class="flex flex-col gap-1">
<div class="flex items-center gap-2">
<span class="font-body-md text-body-md font-semibold text-on-surface group-hover:text-primary transition-colors">
                  Level Up! Reached Level 14
                </span>
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-secondary/10 text-secondary font-caption-caps text-caption-caps font-semibold">
                  Milestone
                </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                Unlocked 'Staff Code Reviewer' badge and custom avatar border
              </p>
</div>
</div>
<span class="font-label-mono text-label-mono text-outline shrink-0">4 days ago</span>
</div>
</div>
</div>
</div>
<script>
    // Lightweight interactivity for Year Selector buttons
    document.querySelectorAll('.year-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.year-btn').forEach(b => {
          b.classList.remove('bg-primary-container', 'text-on-primary-container', 'font-semibold', 'shadow-sm');
          b.classList.add('text-on-surface-variant', 'font-medium');
        });
        btn.classList.add('bg-primary-container', 'text-on-primary-container', 'font-semibold', 'shadow-sm');
        btn.classList.remove('text-on-surface-variant', 'font-medium');
      });
    });
  </script>
</div>
@endsection

