@extends('layouts.app')

@section('title', 'How It Works')

@section('content')
<div class="flex flex-col w-full selection:bg-secondary-container selection:text-on-secondary-container">
<!-- Atmospheric Background Glow Elements -->
<div class="relative w-full overflow-hidden">
<div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[900px] h-[480px] bg-gradient-to-b from-primary-container/20 via-secondary/10 to-transparent blur-[140px] pointer-events-none -z-10"></div>
<div class="absolute top-[800px] -right-48 w-[600px] h-[500px] bg-secondary-container/10 blur-[130px] pointer-events-none -z-10"></div>
<div class="absolute top-[2100px] -left-48 w-[650px] h-[500px] bg-tertiary-container/15 blur-[150px] pointer-events-none -z-10"></div>
<!-- ========================================== -->
<!-- 1. HERO SECTION                            -->
<!-- ========================================== -->
<section class="relative max-w-7xl mx-auto px-6 lg:px-12 pt-16 pb-20 flex flex-col items-center text-center">
<!-- Eyebrow Badge -->
<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-surface-container-high/80 border border-secondary/20 shadow-[0_0_16px_rgba(123,208,255,0.2)] mb-8 transition-transform hover:scale-105">
<span class="font-caption-caps text-caption-caps text-secondary font-semibold uppercase tracking-wider flex items-center gap-1.5">
<span class="material-symbols-outlined text-[14px] text-secondary animate-pulse" style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
          Your Learning Journey
        </span>
<div class="w-1.5 h-1.5 rounded-full bg-secondary shadow-[0_0_6px_#7bd0ff]"></div>
</div>
<!-- Main Headline -->
<h1 class="font-display-hero text-display-hero max-w-4xl text-on-surface font-semibold tracking-tight leading-tight">
        From Website to <span class="bg-gradient-to-r from-secondary via-primary-container to-tertiary bg-clip-text text-transparent drop-shadow-[0_0_24px_rgba(123,208,255,0.35)]">Developer.</span>
</h1>
<!-- Supporting Paragraph -->
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mt-6 mb-10 text-balance leading-relaxed">
        Learn frontend development by recreating real websites, getting AI-powered feedback, and sharing your work with a global engineering community.
      </p>
<!-- Action Buttons -->
<div class="flex flex-wrap items-center justify-center gap-4 mb-16">
<a class="px-6 py-3.5 rounded-xl bg-gradient-to-b from-primary-container to-inverse-primary text-on-primary font-headline-sm text-body-md font-semibold shadow-[0_0_24px_rgba(77,142,255,0.45)] hover:shadow-[0_0_32px_rgba(77,142,255,0.7)] hover:brightness-110 transition-all flex items-center gap-2" data-path="challenges" href="{{ route('challenges.index') }}">
<span>Explore Challenges</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
<a class="px-6 py-3.5 rounded-xl bg-surface-container-high/60 hover:bg-surface-container-high text-on-surface font-headline-sm text-body-md font-medium border border-white/10 hover:border-white/20 shadow-md transition-all flex items-center gap-2" href="#pipeline">
<span class="material-symbols-outlined text-secondary text-[20px]">terminal</span>
<span>Start Learning</span>
</a>
</div>
<!-- Simplified Airy 4-Step Sequence Pill/Breadcrumb Bar -->
<div class="w-full max-w-4xl p-2 rounded-2xl bg-surface-container-low/70 border border-white/10 shadow-xl backdrop-blur-md">
<div class="grid grid-cols-2 sm:grid-cols-4 gap-2 text-center">
<div class="flex items-center justify-center gap-2 px-3 py-2.5 rounded-xl bg-surface-container/60 hover:bg-surface-container transition-all">
<span class="w-2 h-2 rounded-full bg-secondary shadow-[0_0_8px_#7bd0ff]"></span>
<span class="font-label-mono text-body-sm text-on-surface"><span class="text-secondary font-semibold">1.</span> Pick a Site</span>
</div>
<div class="flex items-center justify-center gap-2 px-3 py-2.5 rounded-xl bg-surface-container/60 hover:bg-surface-container transition-all">
<span class="w-2 h-2 rounded-full bg-primary-container shadow-[0_0_8px_#4d8eff]"></span>
<span class="font-label-mono text-body-sm text-on-surface"><span class="text-primary font-semibold">2.</span> AI Creates Challenge</span>
</div>
<div class="flex items-center justify-center gap-2 px-3 py-2.5 rounded-xl bg-surface-container/60 hover:bg-surface-container transition-all">
<span class="w-2 h-2 rounded-full bg-tertiary shadow-[0_0_8px_#b4c5ff]"></span>
<span class="font-label-mono text-body-sm text-on-surface"><span class="text-tertiary font-semibold">3.</span> Code &amp; Get Feedback</span>
</div>
<div class="flex items-center justify-center gap-2 px-3 py-2.5 rounded-xl bg-surface-container/60 hover:bg-surface-container transition-all">
<span class="w-2 h-2 rounded-full bg-secondary shadow-[0_0_8px_#7bd0ff]"></span>
<span class="font-label-mono text-body-sm text-on-surface"><span class="text-secondary font-semibold">4.</span> Earn XP &amp; Publish</span>
</div>
</div>
</div>
</section>
<!-- ========================================== -->
<!-- 2. THE 4-STEP LEARNING PIPELINE            -->
<!-- ========================================== -->
<section class="relative max-w-7xl mx-auto px-6 lg:px-12 py-20 flex flex-col gap-24" id="pipeline">
<!-- Section Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
<div class="max-w-2xl flex flex-col gap-3">
<div class="inline-flex items-center gap-2 font-caption-caps text-caption-caps uppercase tracking-wider text-secondary font-semibold">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
            The 4-Step Learning Pipeline
          </div>
<h2 class="font-headline-xl text-headline-xl text-on-surface font-semibold tracking-tight">
            How You Master Frontend on Smart Coach
          </h2>
<p class="font-body-lg text-body-lg text-on-surface-variant">
            Turn any inspiring production website into an interactive developer challenge, submit your code, and level up through structured automated and peer feedback.
          </p>
</div>
<div class="font-label-mono text-body-sm text-outline hidden md:block">
          REVERSE-ENGINEERING METHODOLOGY // STAGE 01 - 04
        </div>
</div>
<!-- Step 01: Start With Any Website -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
<div class="lg:col-span-5 flex flex-col gap-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-surface-container-high border border-white/10 flex items-center justify-center text-secondary shadow-[0_0_16px_rgba(123,208,255,0.25)]">
<span class="material-symbols-outlined text-[22px]">public</span>
</div>
<span class="font-label-mono text-body-md text-secondary font-semibold">STEP 01</span>
</div>
<h3 class="font-headline-lg text-headline-lg text-on-surface font-semibold">
            Start With Any Website
          </h3>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
            Find a website that inspires you. Copy its URL and submit it to Smart Coach to start your challenge.
          </p>
<div class="flex flex-wrap gap-2 pt-2">
<span class="px-2.5 py-1 rounded bg-surface-container-high border border-white/5 text-on-surface-variant font-label-mono text-body-sm">Any Public URL</span>
<span class="px-2.5 py-1 rounded bg-surface-container-high border border-white/5 text-on-surface-variant font-label-mono text-body-sm">Zero Setup</span>
</div>
</div>
<div class="lg:col-span-7">
<div class="rounded-2xl bg-surface-container-low border border-white/10 p-6 shadow-2xl flex flex-col gap-5">
<div class="flex items-center gap-2 pb-1">
<div class="w-2.5 h-2.5 rounded-full bg-error/70"></div>
<div class="w-2.5 h-2.5 rounded-full bg-tertiary-container/70"></div>
<div class="w-2.5 h-2.5 rounded-full bg-secondary/70"></div>
<span class="ml-3 font-label-mono text-body-sm text-outline">Smart Coach Inspector • URL Ingest</span>
</div>
<!-- Sleek Single-line URL Bar Mockup -->
<div class="flex flex-col sm:flex-row items-center gap-2 p-1.5 rounded-xl bg-surface-container-lowest border border-white/5 shadow-inner">
<div class="flex items-center gap-2 px-3 py-2 w-full text-on-surface font-label-mono text-body-md">
<span class="material-symbols-outlined text-outline text-[18px]">search</span>
<span class="text-secondary">https://</span>
<span class="text-on-surface">linear.app</span>
</div>
<button class="w-full sm:w-auto px-5 py-2.5 rounded-lg bg-gradient-to-r from-primary-container to-inverse-primary text-on-primary font-headline-sm text-body-sm font-medium whitespace-nowrap shadow-[0_0_14px_rgba(77,142,255,0.4)] flex items-center justify-center gap-2 hover:brightness-110 transition-all">
<span class="material-symbols-outlined text-[16px]">radar</span>
<span>Analyze</span>
</button>
</div>
<!-- 2 Clean Tags Only -->
<div class="flex items-center gap-3 pt-1">
<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container-high border border-white/5 text-secondary font-label-mono text-body-sm">
<span class="material-symbols-outlined text-[16px] text-secondary">grid_view</span>
            Layout Analysis
          </span>
<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container-high border border-white/5 text-primary font-label-mono text-body-sm">
<span class="material-symbols-outlined text-[16px] text-primary">widgets</span>
            Component Detection
          </span>
</div>
</div>
</div>
</div>
<!-- Step 02: Turn Inspiration Into a Challenge -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
<div class="lg:col-span-7 order-2 lg:order-1">
<div class="rounded-2xl bg-surface-container-low border border-white/10 p-6 shadow-2xl flex flex-col gap-5">
<div class="flex items-center justify-between border-b border-white/5 pb-4">
<div>
<div class="font-caption-caps text-caption-caps uppercase tracking-wider text-outline">Generated Challenge</div>
<div class="font-headline-sm text-body-lg font-semibold text-on-surface mt-0.5">Linear Modern Hero</div>
</div>
<span class="px-3 py-1 rounded-full bg-secondary-container/20 text-secondary border border-secondary/30 font-label-mono text-body-sm font-medium">
            Medium (300 XP)
          </span>
</div>
<!-- 3 Clean Target Checklist Pills -->
<div class="space-y-2.5">
<div class="flex items-center gap-3 p-3 rounded-xl bg-surface-container border border-white/5 text-on-surface font-body-md">
<span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
<span>Recreate hero split-screen responsive layout</span>
</div>
<div class="flex items-center gap-3 p-3 rounded-xl bg-surface-container border border-white/5 text-on-surface font-body-md">
<span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
<span>Extract typography and dark theme color tokens</span>
</div>
<div class="flex items-center gap-3 p-3 rounded-xl bg-surface-container border border-white/5 text-on-surface font-body-md">
<span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
<span>Match mobile (375px) and desktop (1280px) breakpoints</span>
</div>
</div>
</div>
</div>
<div class="lg:col-span-5 order-1 lg:order-2 flex flex-col gap-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-surface-container-high border border-white/10 flex items-center justify-center text-primary shadow-[0_0_16px_rgba(77,142,255,0.25)]">
<span class="material-symbols-outlined text-[22px]">auto_fix_high</span>
</div>
<span class="font-label-mono text-body-md text-primary font-semibold">STEP 02</span>
</div>
<h3 class="font-headline-lg text-headline-lg text-on-surface font-semibold">
            Turn Inspiration Into a Challenge
          </h3>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
            AI deconstructs the website into structured specifications, responsive breakpoints, and target milestones.
          </p>
<div class="flex flex-wrap gap-2 pt-2">
<span class="px-2.5 py-1 rounded bg-surface-container-high border border-white/5 text-on-surface-variant font-label-mono text-body-sm">Tailored Task Lists</span>
<span class="px-2.5 py-1 rounded bg-surface-container-high border border-white/5 text-on-surface-variant font-label-mono text-body-sm">Extracted Tokens</span>
</div>
</div>
</div>
<!-- Step 03: Build. Submit. Improve. -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
<div class="lg:col-span-5 flex flex-col gap-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-surface-container-high border border-white/10 flex items-center justify-center text-secondary shadow-[0_0_16px_rgba(123,208,255,0.25)]">
<span class="material-symbols-outlined text-[22px]">neurology</span>
</div>
<span class="font-label-mono text-body-md text-secondary font-semibold">STEP 03</span>
</div>
<h3 class="font-headline-lg text-headline-lg text-on-surface font-semibold">
            Build. Submit. Improve.
          </h3>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
            Recreate the website in your favorite editor. Submit your implementation and receive instant AI feedback across visual similarity, layout precision, and responsiveness.
          </p>
<div class="flex flex-wrap gap-2 pt-2">
<span class="px-2.5 py-1 rounded bg-surface-container-high border border-white/5 text-on-surface-variant font-label-mono text-body-sm">Visual Pixel Diffing</span>
<span class="px-2.5 py-1 rounded bg-surface-container-high border border-white/5 text-on-surface-variant font-label-mono text-body-sm">Layout Scoring</span>
</div>
</div>
<div class="lg:col-span-7">
<!-- Sleek Score Dashboard Card -->
<div class="rounded-2xl bg-surface-container-low border border-white/10 p-6 shadow-2xl flex flex-col gap-6">
<div class="flex items-center justify-between">
<span class="font-headline-sm text-body-md font-semibold text-on-surface">Automated Evaluation Results</span>
<span class="px-2.5 py-1 rounded-full bg-secondary/10 text-secondary font-label-mono text-[11px] border border-secondary/20">Analysis Complete</span>
</div>
<div class="grid grid-cols-3 gap-3">
<div class="p-4 rounded-xl bg-surface-container border border-white/5 flex flex-col items-center justify-center text-center gap-1.5">
<span class="font-caption-caps text-caption-caps text-outline uppercase tracking-wider">Visual Similarity</span>
<span class="font-headline-xl text-headline-xl font-bold text-secondary">92%</span>
</div>
<div class="p-4 rounded-xl bg-surface-container border border-white/5 flex flex-col items-center justify-center text-center gap-1.5">
<span class="font-caption-caps text-caption-caps text-outline uppercase tracking-wider">Layout Precision</span>
<span class="font-headline-xl text-headline-xl font-bold text-primary">88%</span>
</div>
<div class="p-4 rounded-xl bg-surface-container border border-white/5 flex flex-col items-center justify-center text-center gap-1.5">
<span class="font-caption-caps text-caption-caps text-outline uppercase tracking-wider">Responsiveness</span>
<span class="font-headline-xl text-headline-xl font-bold text-secondary">95%</span>
</div>
</div>
<div class="p-3.5 rounded-xl bg-gradient-to-r from-primary-container/20 to-secondary/15 border border-primary-container/30 flex items-center justify-between">
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-secondary text-[20px]" style="font-variation-settings: 'FILL' 1;">stars</span>
<span class="font-headline-sm text-body-md font-semibold text-on-surface">+250 XP Awarded ✓</span>
</div>
<span class="font-label-mono text-body-sm text-secondary">Score: 92/100</span>
</div>
</div>
</div>
</div>
<!-- Step 04: Learn Together. Publish Your Work. -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
<div class="lg:col-span-7 order-2 lg:order-1">
<div class="rounded-2xl bg-surface-container-low border border-white/10 p-6 shadow-2xl flex flex-col gap-6">
<div class="flex items-center justify-between">
<span class="font-headline-sm text-body-md font-semibold text-on-surface">Community Verification</span>
<span class="inline-flex items-center gap-1.5 text-secondary font-label-mono text-body-sm font-semibold">
<span class="material-symbols-outlined text-[18px]">verified</span>
            3/3 Peer Reviews Approved ✓
          </span>
</div>
<!-- 3-Avatar Review Approval Row -->
<div class="flex flex-col sm:flex-row items-center justify-between gap-4 p-4 rounded-xl bg-surface-container border border-white/5">
<div class="flex items-center gap-3">
<div class="flex -space-x-2">
<div class="w-9 h-9 rounded-full bg-secondary-container flex items-center justify-center font-label-mono text-on-secondary-container text-body-sm font-bold border-2 border-surface-container">ER</div>
<div class="w-9 h-9 rounded-full bg-primary-container flex items-center justify-center font-label-mono text-on-primary-container text-body-sm font-bold border-2 border-surface-container">MV</div>
<div class="w-9 h-9 rounded-full bg-tertiary-container flex items-center justify-center font-label-mono text-on-tertiary-container text-body-sm font-bold border-2 border-surface-container">AP</div>
</div>
<div class="text-left">
<div class="font-body-md text-body-sm text-on-surface font-medium">3 Senior Developers Approved</div>
<div class="font-label-mono text-[11px] text-outline">Consensus verified without flags</div>
</div>
</div>
<div class="flex items-center gap-1 px-3 py-1 rounded-full bg-secondary/10 text-secondary font-label-mono text-body-sm border border-secondary/20">
<span>All Checks Passed</span>
<span class="material-symbols-outlined text-[16px]">check</span>
</div>
</div>
<!-- Published Badge -->
<div class="flex items-center justify-between pt-1">
<div class="flex items-center gap-2">
<div class="w-2 h-2 rounded-full bg-secondary shadow-[0_0_8px_#7bd0ff]"></div>
<span class="font-label-mono text-body-sm text-outline">Live on Portfolio</span>
</div>
<span class="px-4 py-2 rounded-xl bg-gradient-to-r from-primary-container to-secondary-container text-on-primary font-headline-sm text-body-sm font-semibold shadow-[0_0_16px_rgba(77,142,255,0.35)] flex items-center gap-2">
<span class="material-symbols-outlined text-[16px]">rocket_launch</span>
<span>Published to Community</span>
</span>
</div>
</div>
</div>
<div class="lg:col-span-5 order-1 lg:order-2 flex flex-col gap-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-surface-container-high border border-white/10 flex items-center justify-center text-secondary shadow-[0_0_16px_rgba(123,208,255,0.25)]">
<span class="material-symbols-outlined text-[22px]">verified</span>
</div>
<span class="font-label-mono text-body-md text-secondary font-semibold">STEP 04</span>
</div>
<h3 class="font-headline-lg text-headline-lg text-on-surface font-semibold">
            Learn Together. Publish Your Work.
          </h3>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
            Three community peers review your submission. Once approved, your project is minted into your public engineering portfolio.
          </p>
<div class="flex flex-wrap gap-2 pt-2">
<span class="px-2.5 py-1 rounded bg-surface-container-high border border-white/5 text-on-surface-variant font-label-mono text-body-sm">Peer Review</span>
<span class="px-2.5 py-1 rounded bg-surface-container-high border border-white/5 text-on-surface-variant font-label-mono text-body-sm">Public Portfolio Showcase</span>
</div>
</div>
</div>
</section>
<!-- ========================================== -->
<!-- 3. LEVEL UP & REWARDS (Streamlined)        -->
<!-- ========================================== -->
<section class="relative max-w-7xl mx-auto px-6 lg:px-12 py-20">
<div class="rounded-3xl bg-surface-container-low border border-white/10 p-8 lg:p-12 shadow-2xl flex flex-col gap-10 relative overflow-hidden">
<div class="absolute -right-20 -bottom-20 w-96 h-96 bg-primary-container/10 blur-[100px] pointer-events-none"></div>
<!-- Header -->
<div class="max-w-2xl flex flex-col gap-3">
<div class="inline-flex items-center gap-2 font-caption-caps text-caption-caps uppercase tracking-wider text-secondary font-semibold">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
          Developer Progression &amp; Rewards
        </div>
<h2 class="font-headline-xl text-headline-xl text-on-surface font-semibold tracking-tight">
          Every Challenge Makes You Stronger.
        </h2>
<p class="font-body-lg text-body-lg text-on-surface-variant">
          Your progress is more than completed tasks. Every evaluation helps you grow, accumulate real XP, and unlock perks inside our developer economy.
        </p>
</div>
<!-- Top Level Progress Card -->
<div class="p-6 rounded-2xl bg-surface-container-lowest border border-white/5 shadow-inner flex flex-col gap-4">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
<div class="flex items-center gap-3">
<div class="w-11 h-11 rounded-xl bg-surface-container-high border border-white/10 flex items-center justify-center text-secondary shadow-[0_0_16px_rgba(123,208,255,0.25)]">
<span class="material-symbols-outlined text-[24px]">terminal</span>
</div>
<div>
<div class="font-caption-caps text-caption-caps uppercase tracking-wider text-outline">Current Standing</div>
<div class="font-headline-sm text-body-lg font-bold text-on-surface">Frontend Explorer (Level 4)</div>
</div>
</div>
<div class="font-label-mono text-body-sm text-secondary font-semibold">
            1,250 / 2,000 XP
          </div>
</div>
<div class="space-y-1.5">
<div class="w-full h-2.5 rounded-full bg-surface-container overflow-hidden">
<div class="h-full rounded-full bg-gradient-to-r from-secondary via-primary to-primary-container shadow-[0_0_10px_rgba(123,208,255,0.5)] w-[62.5%]"></div>
</div>
<div class="flex justify-between font-label-mono text-[12px] text-outline">
<span>Level 04</span>
<span>750 XP to Level 5</span>
</div>
</div>
</div>
<!-- 3 Clean Balanced Benefit Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="p-6 rounded-2xl bg-surface-container border border-white/5 flex flex-col gap-3 hover:border-secondary/20 transition-all">
<div class="w-10 h-10 rounded-xl bg-surface-container-high border border-white/5 flex items-center justify-center text-secondary shadow-[0_0_12px_rgba(123,208,255,0.2)]">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">bolt</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Earn XP</h3>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
            Complete challenges and automated evaluations to gain experience points.
          </p>
</div>
<div class="p-6 rounded-2xl bg-surface-container border border-white/5 flex flex-col gap-3 hover:border-primary/20 transition-all">
<div class="w-10 h-10 rounded-xl bg-surface-container-high border border-white/5 flex items-center justify-center text-primary shadow-[0_0_12px_rgba(77,142,255,0.2)]">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">upgrade</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Level Up</h3>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
            Advance engineering ranks from Junior Apprentice to Senior Architect.
          </p>
</div>
<div class="p-6 rounded-2xl bg-surface-container border border-white/5 flex flex-col gap-3 hover:border-secondary-container/20 transition-all">
<div class="w-10 h-10 rounded-xl bg-surface-container-high border border-white/5 flex items-center justify-center text-secondary shadow-[0_0_12px_rgba(0,166,224,0.2)]">
<span class="material-symbols-outlined text-[20px]">storefront</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Unlock Rewards</h3>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
            Spend earned points on custom terminal IDE themes, portfolio badges, and sandbox perks.
          </p>
</div>
</div>
</div>
</section>
<!-- ========================================== -->
<!-- 4. MEET YOUR AI COACH (Voice Mentor)       -->
<!-- ========================================== -->
<section class="relative max-w-7xl mx-auto px-6 lg:px-12 py-20">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<!-- Text Column -->
<div class="lg:col-span-6 flex flex-col gap-5">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gradient-to-r from-tertiary-container/30 to-primary-container/30 self-start border border-primary-container/30 shadow-[0_0_14px_rgba(97,139,255,0.25)]">
<span class="w-1.5 h-1.5 rounded-full bg-secondary animate-pulse"></span>
<span class="font-caption-caps text-caption-caps uppercase tracking-wider text-secondary font-semibold">PRO FEATURE</span>
</div>
<h2 class="font-headline-xl text-display-hero text-on-surface font-semibold tracking-tight">
          Never Learn Alone.
        </h2>
<p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
          Your voice-guided AI mentor observes your code in real-time, diagnoses layout bugs, and suggests targeted practice.
        </p>
<div class="pt-2 flex items-center gap-4">
<button class="px-6 py-3 rounded-xl bg-gradient-to-r from-primary-container to-inverse-primary text-on-primary font-headline-sm text-body-md font-semibold shadow-[0_0_20px_rgba(77,142,255,0.4)] hover:shadow-[0_0_28px_rgba(77,142,255,0.6)] hover:brightness-110 transition-all flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">mic</span>
<span>Try Voice Mode</span>
</button>
<span class="font-body-sm text-body-sm text-outline">Included with Smart Coach Pro</span>
</div>
</div>
<!-- Voice Mentor Card Mockup -->
<div class="lg:col-span-6">
<div class="rounded-2xl bg-surface-container-low border border-white/10 p-6 shadow-2xl flex flex-col gap-5 relative">
<!-- Card Header with Glowing Waveform Orb -->
<div class="flex items-center justify-between pb-3 border-b border-white/5">
<div class="flex items-center gap-3">
<!-- Glowing Waveform Orb -->
<div class="relative w-10 h-10 rounded-full bg-gradient-to-tr from-secondary-container via-primary-container to-secondary flex items-center justify-center shadow-[0_0_20px_rgba(123,208,255,0.6)] animate-pulse">
<span class="material-symbols-outlined text-surface text-[20px]">graphic_eq</span>
</div>
<div>
<div class="font-headline-sm text-body-md font-semibold text-on-surface">Athena Voice</div>
<div class="font-label-mono text-[11px] text-secondary flex items-center gap-1.5">
<span class="w-1.5 h-1.5 rounded-full bg-secondary shadow-[0_0_6px_#7bd0ff]"></span>
              Always Listening
            </div>
</div>
</div>
<span class="px-2.5 py-0.5 rounded-full bg-surface-container-high border border-white/5 text-outline font-label-mono text-body-sm">Voice Active</span>
</div>
<!-- Clean Query / Answer Flow -->
<div class="flex flex-col gap-3 font-body-md text-body-md">
<!-- User Query -->
<div class="self-end max-w-[85%] p-3.5 rounded-2xl rounded-tr-none bg-primary-container/20 border border-primary-container/30 text-on-surface">
<p class="font-body-md text-body-sm sm:text-body-md">"Athena, why is my grid overflowing?"</p>
</div>
<!-- Athena Concise Answer -->
<div class="self-start max-w-[95%] p-4 rounded-2xl rounded-tl-none bg-surface-container border border-white/5 flex flex-col gap-2">
<div class="flex items-center gap-2 text-secondary font-label-mono text-body-sm font-medium">
<span class="material-symbols-outlined text-[16px]">psychology</span>
<span>Athena Response</span>
</div>
<p class="text-on-surface leading-relaxed text-body-md">
            "Use <code class="px-1.5 py-0.5 rounded bg-surface-container-lowest text-secondary font-label-mono text-[13px]">minmax(0, 1fr)</code> on your grid columns to prevent flex blowout."
          </p>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- ========================================== -->
<!-- 5. FINAL CTA                               -->
<!-- ========================================== -->
<section class="relative max-w-7xl mx-auto px-6 lg:px-12 py-24">
<div class="relative rounded-3xl bg-surface-container-low border border-white/10 p-10 lg:p-16 shadow-2xl flex flex-col items-center text-center overflow-hidden">
<!-- Radial Blue Spotlight -->
<div class="absolute inset-0 bg-radial-[circle_at_50%_0%] from-primary-container/20 via-transparent to-transparent pointer-events-none"></div>
<div class="relative z-10 max-w-2xl flex flex-col items-center gap-6">
<div class="w-12 h-12 rounded-2xl bg-surface-container-high border border-white/10 flex items-center justify-center text-secondary shadow-[0_0_20px_rgba(123,208,255,0.3)] mb-2">
<span class="material-symbols-outlined text-[28px]">rocket_launch</span>
</div>
<h2 class="font-display-hero text-headline-xl sm:text-display-hero text-on-surface font-semibold tracking-tight">
          Your Journey Starts With One Website.
        </h2>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl text-balance">
          Choose a website you love. Let our autonomous AI engine generate your tailored challenge. Start mastering production frontend today.
        </p>
<div class="flex flex-col sm:flex-row items-center gap-4 mt-2 w-full sm:w-auto">
<a class="w-full sm:w-auto px-8 py-4 rounded-xl bg-gradient-to-r from-primary-container via-secondary-container to-tertiary text-on-primary font-headline-sm text-body-md font-semibold shadow-[0_0_28px_rgba(77,142,255,0.5)] hover:shadow-[0_0_36px_rgba(77,142,255,0.7)] hover:scale-[1.02] transition-all flex items-center justify-center gap-2" data-path="challenges" href="{{ route('challenges.index') }}">
<span>Explore Challenges</span>
<span class="material-symbols-outlined text-[20px]">arrow_forward</span>
</a>
</div>
<span class="font-body-sm text-body-sm text-outline mt-1">
          Start free. No credit card required. Level up at your own pace.
        </span>
</div>
</div>
</section>
</div>
</div>
@endsection

