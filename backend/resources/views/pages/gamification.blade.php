@extends('layouts.app')

@section('title', 'Gamification')

@section('content')
<div class="flex flex-col w-full">
<!-- Interactive Ambient Glow Backdrop Layer -->
<div class="relative w-full overflow-hidden">
<div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[850px] h-[450px] bg-gradient-to-b from-secondary-container/15 via-primary-container/10 to-transparent blur-[120px] pointer-events-none -z-10"></div>
<div class="absolute top-[600px] -right-32 w-[500px] h-[500px] bg-secondary/10 blur-[130px] pointer-events-none -z-10"></div>
<div class="absolute top-[1600px] -left-32 w-[600px] h-[600px] bg-primary-container/10 blur-[140px] pointer-events-none -z-10"></div>
<!-- MAIN WRAPPER -->
<div class="max-w-7xl mx-auto px-6 lg:px-12 py-space-xl flex flex-col gap-space-xl">
<!-- 2. PAGE HERO & BALANCED OVERVIEW -->
<section class="flex flex-col gap-space-lg">
<!-- Eyebrow & Headline Header -->
<div class="flex flex-col items-start gap-space-sm max-w-3xl">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary-container/10 shadow-[0_0_12px_rgba(0,166,224,0.25)]">
<span class="w-1.5 h-1.5 rounded-full bg-secondary shadow-[0_0_8px_#7bd0ff] animate-ping"></span>
<span class="font-caption-caps text-caption-caps uppercase text-secondary tracking-widest">✦ Your Progression &amp; Economy</span>
</div>
<h1 class="font-display-hero text-display-hero text-on-surface font-semibold tracking-tight">
            Your Journey. <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary via-primary to-secondary-container">Your Rewards.</span>
</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
            Complete high-velocity challenges, review peer architecture, earn dual-layer engineering capital, and level up your status across the global developer runtime.
          </p>
</div>
<!-- 3-Card Balanced Hero Dashboard -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-md items-stretch">
<!-- Card A: User Profile Card (4 cols) -->
<div class="lg:col-span-4 rounded-xl bg-surface-container/70 backdrop-blur-xl p-space-lg flex flex-col justify-between shadow-xl relative overflow-hidden group">
<div class="absolute inset-0 bg-gradient-to-b from-secondary/5 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
<div class="relative z-10 flex flex-col gap-space-md">
<div class="flex items-center gap-space-md">
<div class="relative">
<div class="w-16 h-16 rounded-xl overflow-hidden bg-surface-container-high shadow-[0_0_20px_rgba(123,208,255,0.35)]">
<img class="w-full h-full object-cover" data-alt="Cyberpunk high tech avatar portrait of a software engineer named Amro, with dark navy hair, neon cyan glasses reflections, futuristic terminal UI glowing on face, cinematic lighting, sleek octane render, minimal developer aesthetic" src="{{ asset('images/profile.png') }}"/>
</div>
<div class="absolute -bottom-1 -right-1 w-5 h-5 rounded-full bg-surface-container-lowest flex items-center justify-center">
<div class="w-3.5 h-3.5 rounded-full bg-secondary shadow-[0_0_8px_#7bd0ff]"></div>
</div>
</div>
<div class="flex flex-col min-w-0">
<div class="flex items-center gap-2">
<h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold truncate">Amro</h2>
<span class="material-symbols-outlined text-secondary text-[16px]" style="font-variation-settings: 'FILL' 1;">verified</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant truncate">Active Developer</span>
<div class="mt-1 inline-flex items-center gap-1.5 px-2 py-0.5 rounded-md bg-secondary/10 w-fit">
<span class="material-symbols-outlined text-secondary text-[14px]">shield</span>
<span class="font-label-mono text-body-sm text-secondary font-medium">Lvl 12 — UI Master</span>
</div>
</div>
</div>
<!-- Key stats row -->
<div class="grid grid-cols-3 gap-2 p-2.5 rounded-lg bg-surface-container-lowest/80 shadow-inner">
<div class="flex flex-col items-center justify-center p-1.5 rounded-md bg-surface-container/50">
<span class="font-caption-caps text-caption-caps uppercase text-outline">Energy</span>
<span class="font-label-mono text-body-md text-primary font-semibold flex items-center gap-0.5 mt-0.5">
<span class="text-secondary text-[13px]">⚡</span> 8.4k
                  </span>
<span class="font-body-sm text-[10px] text-on-surface-variant">XP Total</span>
</div>
<div class="flex flex-col items-center justify-center p-1.5 rounded-md bg-surface-container/50">
<span class="font-caption-caps text-caption-caps uppercase text-outline">Balance</span>
<span class="font-label-mono text-body-md text-secondary font-semibold flex items-center gap-0.5 mt-0.5">
<span class="text-secondary text-[13px]">💎</span> 2,450
                  </span>
<span class="font-body-sm text-[10px] text-on-surface-variant">Points</span>
</div>
<div class="flex flex-col items-center justify-center p-1.5 rounded-md bg-surface-container/50">
<span class="font-caption-caps text-caption-caps uppercase text-outline">Streak</span>
<span class="font-label-mono text-body-md text-on-surface font-semibold flex items-center gap-0.5 mt-0.5">
<span class="text-secondary text-[13px]">🔥</span> 7 Days
                  </span>
<span class="font-body-sm text-[10px] text-secondary font-medium">+15% XP</span>
</div>
</div>
</div>
<!-- Profile Footer Metadata -->
<div class="relative z-10 pt-space-sm flex items-center justify-between font-label-mono text-body-sm text-outline">
<span class="flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> Tier III Senior Cohort
              </span>
<span class="text-secondary hover:underline cursor-pointer">View Dossier →</span>
</div>
</div>
<!-- Card B: Level Progress Card (5 cols) -->
<div class="lg:col-span-5 rounded-xl bg-surface-container/70 backdrop-blur-xl p-space-lg flex flex-col justify-between shadow-xl relative overflow-hidden group">
<div class="absolute -right-16 -top-16 w-44 h-44 rounded-full bg-secondary/10 blur-2xl pointer-events-none"></div>
<div class="relative z-10 flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<span class="font-caption-caps text-caption-caps uppercase text-secondary tracking-wider flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px]">trending_up</span> Progression Velocity
                </span>
<span class="font-label-mono text-body-sm text-secondary bg-surface-container-high px-2 py-0.5 rounded">84.2% Synced</span>
</div>
<div class="flex items-baseline justify-between mt-1">
<div>
<h3 class="font-headline-lg text-headline-lg text-on-surface font-semibold">Level 12 <span class="text-outline font-normal">→ 13</span></h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">UI Master → Code Architect</p>
</div>
<div class="text-right">
<span class="font-label-mono text-headline-sm text-primary font-bold">8,420</span>
<span class="font-label-mono text-body-sm text-outline"> / 10,000 XP</span>
</div>
</div>
<!-- High-Fidelity Glow Dual-Tone Progress Track -->
<div class="w-full mt-2">
<div class="w-full h-3 rounded-full bg-surface-container-lowest p-0.5 shadow-inner relative">
<div class="h-full rounded-full bg-gradient-to-r from-secondary-container via-secondary to-primary shadow-[0_0_12px_rgba(123,208,255,0.7)]" style="width: 84%;"></div>
</div>
<div class="flex justify-between items-center mt-1.5 font-label-mono text-[11px] text-outline">
<span>8,000 XP Baseline</span>
<span class="text-secondary font-medium">1,580 XP Remaining</span>
<span>10,000 XP Cap</span>
</div>
</div>
</div>
<div class="relative z-10 mt- space-sm p-3 rounded-lg bg-surface-container-low/90 flex items-center gap-3">
<div class="w-9 h-9 rounded-lg bg-primary-container/20 flex-shrink-0 flex items-center justify-center text-primary shadow-[0_0_12px_rgba(77,142,255,0.3)]">
<span class="material-symbols-outlined text-[20px]">lock_open</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                Level 13 unlocks <strong class="text-secondary font-semibold">+300 Points bonus</strong>, the prestigious <span class="text-on-surface font-medium">'Code Architect'</span> moniker, and exclusive terminal shaders.
              </p>
</div>
</div>
<!-- Card C: Points Balance Card (3 cols) -->
<div class="lg:col-span-3 rounded-xl bg-gradient-to-b from-surface-container/90 to-surface-container-low/90 backdrop-blur-xl p-space-lg flex flex-col justify-between shadow-xl relative overflow-hidden">
<div class="absolute top-0 right-0 w-32 h-32 bg-secondary/15 rounded-full blur-3xl pointer-events-none"></div>
<div class="flex flex-col gap-space-sm relative z-10">
<div class="flex items-center justify-between">
<span class="font-caption-caps text-caption-caps uppercase text-outline tracking-wider flex items-center gap-1">
<span class="material-symbols-outlined text-secondary text-[16px]">diamond</span> Available Vault
                </span>
<span class="font-label-mono text-caption-caps px-1.5 py-0.5 rounded bg-surface-container-highest text-secondary-fixed-dim">Dual Currency</span>
</div>
<div class="my-2">
<div class="flex items-baseline gap-2">
<span class="font-display-hero text-display-hero text-on-surface font-bold tracking-tight shadow-[0_0_24px_rgba(123,208,255,0.2)]">2,450</span>
<span class="text-secondary font-label-mono text-headline-sm font-semibold">PTS</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                  Redeemable balance generated via runtime validation, peer assessments, and milestone leaps.
                </p>
</div>
</div>
<div class="relative z-10 pt-space-sm">
<a class="w-full py-2.5 px-4 rounded-lg bg-gradient-to-b from-primary-container to-inverse-primary text-on-primary font-headline-sm text-body-md font-medium shadow-[0_0_16px_rgba(59,130,246,0.35)] hover:shadow-[0_0_24px_rgba(59,130,246,0.65)] hover:from-primary-container/90 transition-all flex items-center justify-center gap-2 group" href="#marketplace">
<span>Explore Rewards</span>
<span class="material-symbols-outlined text-[18px] group-hover:translate-y-0.5 transition-transform">arrow_downward</span>
</a>
</div>
</div>
</div>
</section>
<!-- 3. HOW TO EARN XP & POINTS (Dual-Currency Economy System) -->
<section class="flex flex-col gap-space-md pt-space-sm">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-space-sm">
<div>
<div class="inline-flex items-center gap-1.5 text-secondary font-label-mono text-body-sm mb-1">
<span class="material-symbols-outlined text-[18px]">currency_exchange</span>
<span>ENGINEERING ARBITRAGE &amp; REPUTATION</span>
</div>
<h2 class="font-headline-xl text-headline-xl text-on-surface font-semibold tracking-tight">How You Earn</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">High yields for real architectural effort, zero incentives for low-effort noise.</p>
</div>
<!-- Currency Definition Legend -->
<div class="flex items-center gap-3 bg-surface-container-lowest/90 p-1.5 rounded-lg shadow-inner">
<div class="flex items-center gap-1.5 px-3 py-1 rounded bg-surface-container text-primary font-label-mono text-body-sm">
<span>⚡ XP</span>
<span class="text-outline">Skill Tier / Non-spendable</span>
</div>
<div class="flex items-center gap-1.5 px-3 py-1 rounded bg-surface-container text-secondary font-label-mono text-body-sm">
<span>💎 Points</span>
<span class="text-outline">Redeemable Asset</span>
</div>
</div>
</div>
<!-- Visual Table / Split Cards Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-space-sm">
<!-- Earning Stream 1 -->
<div class="rounded-xl bg-surface-container/60 backdrop-blur-md p-space-md flex flex-col justify-between shadow-lg hover:bg-surface-container/90 transition-all group">
<div class="flex flex-col gap-2">
<div class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-secondary shadow-[0_0_12px_rgba(123,208,255,0.2)]">
<span class="material-symbols-outlined text-[22px]">smart_toy</span>
</div>
<h4 class="font-headline-sm text-body-lg text-on-surface font-medium group-hover:text-secondary transition-colors">AI Evaluation</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Complete challenging automated test suites and pass architectural constraints.</p>
</div>
<div class="mt-4 pt-3 flex items-center justify-between font-label-mono text-body-sm bg-surface-container-lowest/60 p-2 rounded-lg">
<span class="text-primary font-semibold">+100 ⚡ XP</span>
<span class="text-secondary font-semibold">+100 💎 PTS</span>
</div>
</div>
<!-- Earning Stream 2 -->
<div class="rounded-xl bg-surface-container/60 backdrop-blur-md p-space-md flex flex-col justify-between shadow-lg hover:bg-surface-container/90 transition-all group">
<div class="flex flex-col gap-2">
<div class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-secondary shadow-[0_0_12px_rgba(123,208,255,0.2)]">
<span class="material-symbols-outlined text-[22px]">rate_review</span>
</div>
<div class="flex items-center justify-between">
<h4 class="font-headline-sm text-body-lg text-on-surface font-medium group-hover:text-secondary transition-colors">Peer Review</h4>
<span class="font-label-mono text-[10px] text-outline px-1.5 py-0.5 rounded bg-surface-container-highest">Cap 3/day</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Review code diffs, verify AST logic, and write constructive PR assessments.</p>
</div>
<div class="mt-4 pt-3 flex items-center justify-between font-label-mono text-body-sm bg-surface-container-lowest/60 p-2 rounded-lg">
<span class="text-primary font-semibold">+30 ⚡ XP</span>
<span class="text-secondary font-semibold">+50 💎 PTS</span>
</div>
</div>
<!-- Earning Stream 3 -->
<div class="rounded-xl bg-surface-container/60 backdrop-blur-md p-space-md flex flex-col justify-between shadow-lg hover:bg-surface-container/90 transition-all group">
<div class="flex flex-col gap-2">
<div class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-secondary shadow-[0_0_12px_rgba(123,208,255,0.2)]">
<span class="material-symbols-outlined text-[22px]">verified_user</span>
</div>
<h4 class="font-headline-sm text-body-lg text-on-surface font-medium group-hover:text-secondary transition-colors">Pass 3 Reviews</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Submit code robust enough to receive positive validation from 3 peer seniors.</p>
</div>
<div class="mt-4 pt-3 flex items-center justify-between font-label-mono text-body-sm bg-surface-container-lowest/60 p-2 rounded-lg">
<span class="text-primary font-semibold">+100 ⚡ XP</span>
<span class="text-secondary font-semibold">+150 💎 PTS</span>
</div>
</div>
<!-- Earning Stream 4 -->
<div class="rounded-xl bg-surface-container/60 backdrop-blur-md p-space-md flex flex-col justify-between shadow-lg hover:bg-surface-container/90 transition-all group">
<div class="flex flex-col gap-2">
<div class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-secondary shadow-[0_0_12px_rgba(123,208,255,0.2)]">
<span class="material-symbols-outlined text-[22px]">code_blocks</span>
</div>
<h4 class="font-headline-sm text-body-lg text-on-surface font-medium group-hover:text-secondary transition-colors">Publish Lab</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Contribute a production-grade challenge or component sandbox to catalog.</p>
</div>
<div class="mt-4 pt-3 flex items-center justify-between font-label-mono text-body-sm bg-surface-container-lowest/60 p-2 rounded-lg">
<span class="text-primary font-semibold">+150 ⚡ XP</span>
<span class="text-secondary font-semibold">+100 💎 PTS</span>
</div>
</div>
<!-- Earning Stream 5 -->
<div class="rounded-xl bg-surface-container/60 backdrop-blur-md p-space-md flex flex-col justify-between shadow-lg hover:bg-surface-container/90 transition-all group">
<div class="flex flex-col gap-2">
<div class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-primary-container shadow-[0_0_12px_rgba(77,142,255,0.25)]">
<span class="material-symbols-outlined text-[22px]">military_tech</span>
</div>
<h4 class="font-headline-sm text-body-lg text-on-surface font-medium group-hover:text-primary transition-colors">Tier Milestone</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Break through major rank thresholds and upgrade runtime privilege level.</p>
</div>
<div class="mt-4 pt-3 flex items-center justify-between font-label-mono text-body-sm bg-surface-container-lowest/60 p-2 rounded-lg">
<span class="text-outline">—</span>
<span class="text-secondary font-semibold">+300 💎 PTS</span>
</div>
</div>
</div>
<!-- Interactive Anti-Abuse Notice Pill -->
<div class="w-full p-3.5 rounded-xl bg-surface-container-lowest/90 flex flex-col sm:flex-row items-center justify-between gap-3 shadow-md">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-secondary-container/20 flex-shrink-0 flex items-center justify-center text-secondary shadow-[0_0_8px_rgba(0,166,224,0.3)]">
<span class="material-symbols-outlined text-[18px]">verified</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
<strong class="text-on-surface font-medium">Fair Play Economy Guardrails:</strong> Duplicate reviews and self-evaluations are automatically disqualified by the AST sanitizer. Rewarded peer reviews capped at 3/day to incentivize depth over speed.
            </p>
</div>
<span class="font-label-mono text-caption-caps uppercase text-secondary bg-surface-container px-3 py-1.5 rounded-full flex-shrink-0">
            Autonomous Guard v4.1 Active
          </span>
</div>
</section>
<!-- 4. LEVEL PROGRESSION LADDER -->
<section class="flex flex-col gap-space-md">
<div class="flex flex-col gap-1">
<span class="font-caption-caps text-caption-caps uppercase text-secondary tracking-widest">Architectural Hierarchy</span>
<h2 class="font-headline-xl text-headline-xl text-on-surface font-semibold tracking-tight">Engineering Tier Ladder</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Each tier unlocks systemic privileges, syntax visualizers, and exponential community voting weights.</p>
</div>
<!-- Horizontal Interactive Timeline Stepper -->
<div class="grid grid-cols-1 md:grid-cols-5 gap-space-sm relative">
<!-- Ladder Tier 1: Levels 1-5 -->
<div class="rounded-xl bg-surface-container-low/70 p-space-md flex flex-col justify-between shadow-lg relative overflow-hidden group">
<div class="flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<span class="font-label-mono text-caption-caps px-2 py-0.5 rounded-full bg-secondary-container/10 text-secondary font-medium">Completed</span>
<span class="material-symbols-outlined text-secondary text-[20px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold mt-1">Frontend Explorer</h4>
<span class="font-label-mono text-body-sm text-outline">Levels 1 – 5</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Foundation semantics, basic CSS flex layouts, and reactive DOM handlers.</p>
</div>
<div class="mt-4 pt-3 bg-surface-container-lowest/50 p-2.5 rounded-lg flex items-center justify-between font-label-mono text-body-sm">
<span class="text-outline">Step Cost</span>
<span class="text-on-surface font-medium">500 XP/lvl</span>
</div>
</div>
<!-- Ladder Tier 2: Levels 6-10 -->
<div class="rounded-xl bg-surface-container-low/70 p-space-md flex flex-col justify-between shadow-lg relative overflow-hidden group">
<div class="flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<span class="font-label-mono text-caption-caps px-2 py-0.5 rounded-full bg-secondary-container/10 text-secondary font-medium">Completed</span>
<span class="material-symbols-outlined text-secondary text-[20px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold mt-1">UI Builder</h4>
<span class="font-label-mono text-body-sm text-outline">Levels 6 – 10</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Custom hooks, state machine modeling, and component lifecycles.</p>
</div>
<div class="mt-4 pt-3 bg-surface-container-lowest/50 p-2.5 rounded-lg flex items-center justify-between font-label-mono text-body-sm">
<span class="text-outline">Step Cost</span>
<span class="text-on-surface font-medium">1,000 XP/lvl</span>
</div>
</div>
<!-- Ladder Tier 3: Levels 11-15 (CURRENT) -->
<div class="rounded-xl bg-surface-container/90 p-space-md flex flex-col justify-between shadow-xl relative overflow-hidden group shadow-[0_0_24px_rgba(56,189,248,0.18)]">
<div class="absolute top-0 right-0 w-24 h-24 bg-secondary/15 rounded-full blur-xl pointer-events-none"></div>
<div class="flex flex-col gap-space-xs relative z-10">
<div class="flex items-center justify-between">
<span class="font-label-mono text-caption-caps px-2 py-0.5 rounded-full bg-secondary text-on-secondary font-bold animate-pulse">Current Tier</span>
<span class="material-symbols-outlined text-secondary text-[22px]">bolt</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface font-bold mt-1">UI Master</h4>
<span class="font-label-mono text-body-sm text-secondary font-medium">Levels 11 – 15 (Lvl 12)</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Design tokens, tree-shaking algorithms, accessibility AST audits, and SSR perf.</p>
</div>
<div class="mt-4 pt-3 bg-surface-container-lowest/80 p-2.5 rounded-lg flex items-center justify-between font-label-mono text-body-sm relative z-10">
<span class="text-secondary font-medium">Step Cost</span>
<span class="text-secondary font-bold">1,500 XP/lvl</span>
</div>
</div>
<!-- Ladder Tier 4: Levels 16-20 (LOCKED) -->
<div class="rounded-xl bg-surface-container-low/40 p-space-md flex flex-col justify-between shadow opacity-80 relative overflow-hidden">
<div class="flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<span class="font-label-mono text-caption-caps px-2 py-0.5 rounded-full bg-surface-container text-outline">Locked</span>
<span class="material-symbols-outlined text-outline text-[20px]">lock</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-outline font-medium mt-1">Code Architect</h4>
<span class="font-label-mono text-body-sm text-outline">Levels 16 – 20</span>
<p class="font-body-sm text-body-sm text-outline/80 mt-1">Micro-frontends, WebAssembly compilation, custom compiler passes, low latency.</p>
</div>
<div class="mt-4 pt-3 bg-surface-container-lowest/30 p-2.5 rounded-lg flex items-center justify-between font-label-mono text-body-sm">
<span class="text-outline">Step Cost</span>
<span class="text-outline">2,000 XP/lvl</span>
</div>
</div>
<!-- Ladder Tier 5: Levels 21+ (LEGENDARY) -->
<div class="rounded-xl bg-surface-container-low/40 p-space-md flex flex-col justify-between shadow opacity-80 relative overflow-hidden">
<div class="flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<span class="font-label-mono text-caption-caps px-2 py-0.5 rounded-full bg-surface-container text-outline">Locked</span>
<span class="material-symbols-outlined text-outline text-[20px]">stars</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-outline font-medium mt-1">Legendary Fellow</h4>
<span class="font-label-mono text-body-sm text-outline">Levels 21+</span>
<p class="font-body-sm text-body-sm text-outline/80 mt-1">Autonomous core tooling, advisory council vote, and immutable hall of fame entry.</p>
</div>
<div class="mt-4 pt-3 bg-surface-container-lowest/30 p-2.5 rounded-lg flex items-center justify-between font-label-mono text-body-sm">
<span class="text-outline">Step Cost</span>
<span class="text-outline">Dynamic Scale</span>
</div>
</div>
</div>
<!-- Tier Rewards Showcase -->
<div class="p-space-md rounded-xl bg-surface-container/70 backdrop-blur-md flex flex-col md:flex-row items-center justify-between gap-space-md shadow-lg">
<div class="flex items-center gap-space-md">
<div class="w-12 h-12 rounded-xl bg-primary-container/20 flex-shrink-0 flex items-center justify-center text-primary shadow-[0_0_16px_rgba(77,142,255,0.3)]">
<span class="material-symbols-outlined text-[28px]">workspace_premium</span>
</div>
<div>
<h4 class="font-headline-sm text-body-lg text-on-surface font-semibold">Tier 4 Architectural Cache Guarantee</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Reaching Level 16 unlocks an instant +300 Points grant, the 'Code Architect' title badge, and the private 'Void Ray' IDE theme.</p>
</div>
</div>
<div class="flex items-center gap-3">
<span class="font-label-mono text-body-sm text-secondary bg-surface-container px-3 py-1.5 rounded-lg">Target: 16,000 Total XP</span>
</div>
</div>
</section>
<!-- 5. REWARDS MARKETPLACE (Spend Your Points) -->
<section class="flex flex-col gap-space-md pt-space-sm scroll-mt-24" id="marketplace">
<!-- Marketplace Section Header & Filter Tabs -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-md">
<div class="flex flex-col gap-1">
<div class="inline-flex items-center gap-2 text-secondary font-label-mono text-body-sm">
<span class="material-symbols-outlined text-[18px]">storefront</span>
<span>SYNTAX &amp; ACCESS VAULT</span>
</div>
<h2 class="font-headline-xl text-headline-xl text-on-surface font-semibold tracking-tight">Rewards Marketplace</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Spend accumulated points on bespoke IDE styling, streak security, and platform perks.</p>
</div>
<!-- Live Balance Chip & Live Alert Trigger -->
<div class="flex items-center gap-3 flex-wrap">
<div class="px-4 py-2 rounded-xl bg-surface-container/90 backdrop-blur-md shadow-lg flex items-center gap-2.5">
<span class="material-symbols-outlined text-secondary text-[20px]">account_balance_wallet</span>
<span class="font-body-sm text-on-surface-variant">Live Wallet:</span>
<span class="font-label-mono text-body-lg font-bold text-secondary">2,450 💎</span>
</div>
</div>
</div>
<!-- Marketplace Filter Navigation -->
<div class="flex items-center gap-2 overflow-x-auto pb-1" id="categoryFilterContainer">
<button class="px-4 py-2 rounded-lg bg-surface-container-high text-secondary font-body-md text-body-sm font-medium shadow-[0_0_12px_rgba(56,189,248,0.2)] transition-all">All Rewards</button>
<button class="px-4 py-2 rounded-lg bg-surface-container-low/70 text-on-surface-variant hover:text-on-surface font-body-md text-body-sm transition-all">Themes &amp; Syntax</button>
<button class="px-4 py-2 rounded-lg bg-surface-container-low/70 text-on-surface-variant hover:text-on-surface font-body-md text-body-sm transition-all">Avatars &amp; Badges</button>
<button class="px-4 py-2 rounded-lg bg-surface-container-low/70 text-on-surface-variant hover:text-on-surface font-body-md text-body-sm transition-all">Streak Items</button>
<button class="px-4 py-2 rounded-lg bg-surface-container-low/70 text-on-surface-variant hover:text-on-surface font-body-md text-body-sm transition-all">Pro Perks</button>
</div>
<!-- Feedback Alert Placeholder (Controlled via JS) -->
<div class="hidden p-3 rounded-lg bg-secondary-container/20 text-secondary text-body-sm font-label-mono flex items-center justify-between" id="rewardFeedbackBanner">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">task_alt</span>
<span id="feedbackText">Transaction complete. Item bound to Amro's profile.</span>
</span>
<button class="text-secondary hover:text-on-surface" onclick="document.getElementById('rewardFeedbackBanner').classList.add('hidden')">✕</button>
</div>
<!-- Marketplace 7-Item Responsive Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-space-md">
<!-- Item 1: Cyber Neon IDE Theme -->
<div class="rounded-xl bg-surface-container/70 backdrop-blur-md p-space-md flex flex-col justify-between shadow-xl group hover:shadow-[0_0_24px_rgba(59,130,246,0.2)] transition-all">
<div class="flex flex-col gap-3">
<div class="w-full h-36 rounded-lg bg-surface-container-lowest overflow-hidden relative shadow-inner">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Screenshot preview of dark cyber neon code editor syntax theme with vibrant cyan keyword highlights, electric blue operators, purple function calls, clean monospaced code layout on midnight background" src="{{ asset('images/SaaS_Landing_Page.jpg') }}"/>
<span class="absolute top-2 left-2 px-2 py-0.5 rounded bg-surface-container-lowest/80 backdrop-blur-md text-secondary font-label-mono text-[11px]">Epic Theme</span>
</div>
<div>
<h4 class="font-headline-sm text-body-lg text-on-surface font-semibold group-hover:text-secondary transition-colors">Cyber Neon Theme</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">High-contrast ultra-vivid syntax highlight matrix for prolonged code sessions.</p>
</div>
</div>
<div class="mt-4 pt-3 flex items-center justify-between">
<div class="flex items-center gap-1 font-label-mono text-body-md text-on-surface font-bold">
<span>1,500</span> <span class="text-secondary">💎</span>
</div>
<button class="px-3.5 py-1.5 rounded-lg bg-surface-container-high hover:bg-surface-bright text-on-surface font-headline-sm text-body-sm font-medium transition-colors" onclick="simulateEquip(this, 'Cyber Neon Theme')">
                Equip
              </button>
</div>
</div>
<!-- Item 2: Matrix Dark Theme -->
<div class="rounded-xl bg-surface-container/70 backdrop-blur-md p-space-md flex flex-col justify-between shadow-xl group hover:shadow-[0_0_24px_rgba(59,130,246,0.2)] transition-all">
<div class="flex flex-col gap-3">
<div class="w-full h-36 rounded-lg bg-surface-container-lowest overflow-hidden relative shadow-inner">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Preview of minimalist monochrome terminal dark theme with subtle deep emerald and cyan monochrome font accents, clean typographic hierarchy, developer IDE interface" src="{{ asset('images/Modern_Login_Auth_Modal.jpg') }}"/>
<span class="absolute top-2 left-2 px-2 py-0.5 rounded bg-surface-container-lowest/80 backdrop-blur-md text-primary font-label-mono text-[11px]">Rare Theme</span>
</div>
<div>
<h4 class="font-headline-sm text-body-lg text-on-surface font-semibold group-hover:text-secondary transition-colors">Matrix Dark Theme</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Soot-black canvas paired with calibrated phosphor tones for reduced retinal fatigue.</p>
</div>
</div>
<div class="mt-4 pt-3 flex items-center justify-between">
<div class="flex items-center gap-1 font-label-mono text-body-md text-on-surface font-bold">
<span>1,000</span> <span class="text-secondary">💎</span>
</div>
<button class="px-3.5 py-1.5 rounded-lg bg-secondary/15 text-secondary font-headline-sm text-body-sm font-medium flex items-center gap-1 cursor-default">
<span class="material-symbols-outlined text-[16px]">check</span> Equipped
              </button>
</div>
</div>
<!-- Item 3: Pixel Artisan Frame -->
<div class="rounded-xl bg-surface-container/70 backdrop-blur-md p-space-md flex flex-col justify-between shadow-xl group hover:shadow-[0_0_24px_rgba(59,130,246,0.2)] transition-all">
<div class="flex flex-col gap-3">
<div class="w-full h-36 rounded-lg bg-surface-container-lowest overflow-hidden relative shadow-inner flex items-center justify-center">
<div class="w-20 h-20 rounded-xl bg-surface-container-high flex items-center justify-center shadow-[0_0_20px_rgba(123,208,255,0.4)] relative">
<span class="material-symbols-outlined text-secondary text-[36px]">developer_mode</span>
<div class="absolute inset-0 rounded-xl border border-secondary/60 animate-pulse pointer-events-none"></div>
</div>
<span class="absolute top-2 left-2 px-2 py-0.5 rounded bg-surface-container-lowest/80 backdrop-blur-md text-secondary font-label-mono text-[11px]">Avatar Frame</span>
</div>
<div>
<h4 class="font-headline-sm text-body-lg text-on-surface font-semibold group-hover:text-secondary transition-colors">Pixel Artisan Frame</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Sub-pixel luminescent avatar halo displayed on leaderboards and PR diffs.</p>
</div>
</div>
<div class="mt-4 pt-3 flex items-center justify-between">
<div class="flex items-center gap-1 font-label-mono text-body-md text-on-surface font-bold">
<span>1,500</span> <span class="text-secondary">💎</span>
</div>
<button class="px-3.5 py-1.5 rounded-lg bg-gradient-to-b from-primary-container to-inverse-primary text-on-primary font-headline-sm text-body-sm font-medium shadow-[0_0_12px_rgba(59,130,246,0.3)] hover:shadow-[0_0_16px_rgba(59,130,246,0.5)] transition-all" onclick="simulateRedeem(this, 'Pixel Artisan Frame', 1500)">
                Redeem
              </button>
</div>
</div>
<!-- Item 4: Streak Freeze -->
<div class="rounded-xl bg-surface-container/70 backdrop-blur-md p-space-md flex flex-col justify-between shadow-xl group hover:shadow-[0_0_24px_rgba(59,130,246,0.2)] transition-all">
<div class="flex flex-col gap-3">
<div class="w-full h-36 rounded-lg bg-surface-container-lowest overflow-hidden relative shadow-inner flex items-center justify-center">
<div class="w-20 h-20 rounded-xl bg-surface-container-high flex items-center justify-center text-secondary shadow-[0_0_16px_rgba(123,208,255,0.3)]">
<span class="material-symbols-outlined text-[40px]">ac_unit</span>
</div>
<span class="absolute top-2 left-2 px-2 py-0.5 rounded bg-surface-container-lowest/80 backdrop-blur-md text-secondary font-label-mono text-[11px]">Streak Item</span>
</div>
<div>
<h4 class="font-headline-sm text-body-lg text-on-surface font-semibold group-hover:text-secondary transition-colors">Streak Freeze</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Preserve your +15% XP velocity multiplier through 24h of inactivity or deployment travel.</p>
</div>
</div>
<div class="mt-4 pt-3 flex items-center justify-between">
<div class="flex items-center gap-1 font-label-mono text-body-md text-on-surface font-bold">
<span>600</span> <span class="text-secondary">💎</span>
</div>
<button class="px-3.5 py-1.5 rounded-lg bg-gradient-to-b from-primary-container to-inverse-primary text-on-primary font-headline-sm text-body-sm font-medium shadow-[0_0_12px_rgba(59,130,246,0.3)] hover:shadow-[0_0_16px_rgba(59,130,246,0.5)] transition-all" onclick="simulateRedeem(this, 'Streak Freeze', 600)">
                Redeem
              </button>
</div>
</div>
<!-- Item 5: 2x Points Booster (24h) -->
<div class="rounded-xl bg-surface-container/70 backdrop-blur-md p-space-md flex flex-col justify-between shadow-xl group hover:shadow-[0_0_24px_rgba(59,130,246,0.2)] transition-all">
<div class="flex flex-col gap-3">
<div class="w-full h-36 rounded-lg bg-surface-container-lowest overflow-hidden relative shadow-inner flex items-center justify-center">
<div class="w-20 h-20 rounded-xl bg-surface-container-high flex items-center justify-center text-primary shadow-[0_0_16px_rgba(77,142,255,0.3)]">
<span class="material-symbols-outlined text-[40px]">speed</span>
</div>
<span class="absolute top-2 left-2 px-2 py-0.5 rounded bg-surface-container-lowest/80 backdrop-blur-md text-primary font-label-mono text-[11px]">Consumable</span>
</div>
<div>
<h4 class="font-headline-sm text-body-lg text-on-surface font-semibold group-hover:text-primary transition-colors">2x Points Booster (24h)</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Double all marketplace currency yields from AI evaluations and peer PR assessments.</p>
</div>
</div>
<div class="mt-4 pt-3 flex items-center justify-between">
<div class="flex items-center gap-1 font-label-mono text-body-md text-on-surface font-bold">
<span>1,500</span> <span class="text-secondary">💎</span>
</div>
<button class="px-3.5 py-1.5 rounded-lg bg-gradient-to-b from-primary-container to-inverse-primary text-on-primary font-headline-sm text-body-sm font-medium shadow-[0_0_12px_rgba(59,130,246,0.3)] hover:shadow-[0_0_16px_rgba(59,130,246,0.5)] transition-all" onclick="simulateRedeem(this, '2x Points Booster', 1500)">
                Redeem
              </button>
</div>
</div>
<!-- Item 6: Legendary Glitch Avatar (Disabled) -->
<div class="rounded-xl bg-surface-container/40 backdrop-blur-md p-space-md flex flex-col justify-between shadow opacity-90">
<div class="flex flex-col gap-3">
<div class="w-full h-36 rounded-lg bg-surface-container-lowest overflow-hidden relative shadow-inner">
<img class="w-full h-full object-cover filter grayscale contrast-125" data-alt="Futuristic cybernetic glitch art portrait with digital chromatic aberration effect, holographic developer mask with deep blue and glowing cyan highlights, high tech concept art" src="{{ asset('images/profile.png') }}"/>
<span class="absolute top-2 left-2 px-2 py-0.5 rounded bg-surface-container-lowest/80 backdrop-blur-md text-outline font-label-mono text-[11px]">Legendary</span>
</div>
<div>
<h4 class="font-headline-sm text-body-lg text-on-surface font-semibold">Legendary Glitch Avatar</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Animated holographic matrix avatar for verified high-velocity contributors.</p>
</div>
</div>
<div class="mt-4 pt-3 flex items-center justify-between">
<div class="flex items-center gap-1 font-label-mono text-body-md text-outline">
<span>2,500</span> <span>💎</span>
</div>
<button class="px-3.5 py-1.5 rounded-lg bg-surface-container text-outline font-headline-sm text-body-sm font-medium cursor-not-allowed" disabled="">
                Need 50 more 💎
              </button>
</div>
</div>
<!-- Item 7: 1 Month Smart Coach Pro (Disabled) -->
<div class="rounded-xl bg-surface-container/40 backdrop-blur-md p-space-md flex flex-col justify-between shadow opacity-90 lg:col-span-2 xl:col-span-2">
<div class="flex flex-col md:flex-row md:items-center gap-space-md">
<div class="w-full md:w-44 h-36 rounded-lg bg-surface-container-lowest flex items-center justify-center text-primary flex-shrink-0 shadow-inner">
<span class="material-symbols-outlined text-[48px]">terminal</span>
</div>
<div class="flex flex-col gap-1">
<span class="text-primary font-label-mono text-caption-caps uppercase tracking-wider">Premium Access License</span>
<h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold">1 Month Smart Coach Pro Subscription</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Redeem 100% free month of unrestricted GPU compilation runtime, zero AI prompt throttling, and unlimited private challenge repositories.</p>
<div class="mt-2 flex items-center gap-2">
<span class="font-label-mono text-body-md text-on-surface font-bold">8,000 💎 PTS</span>
<span class="text-outline text-body-sm font-label-mono">• Current vault deficit: 5,550 PTS</span>
</div>
</div>
</div>
<div class="mt-4 pt-3 flex items-center justify-end">
<button class="px-4 py-2 rounded-lg bg-surface-container text-outline font-headline-sm text-body-sm font-medium cursor-not-allowed" disabled="">
                Need 5,550 more Points
              </button>
</div>
</div>
</div>
</section>
<!-- 6. ACHIEVEMENTS & BADGES SHOWCASE -->
<section class="flex flex-col gap-space-md pt-space-sm">
<div class="flex flex-col gap-1">
<span class="font-caption-caps text-caption-caps uppercase text-secondary tracking-widest">Hardcoded Proof of Work</span>
<h2 class="font-headline-xl text-headline-xl text-on-surface font-semibold tracking-tight">Achievements &amp; Badges</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Permanent attestations inscribed into your immutable Smart Coach developer profile.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-space-sm">
<!-- Badge 1: Pixel Perfect (Unlocked) -->
<div class="rounded-xl bg-surface-container/70 backdrop-blur-md p-space-md flex flex-col justify-between shadow-lg relative overflow-hidden group">
<div class="flex flex-col gap-2">
<div class="flex items-center justify-between">
<div class="w-12 h-12 rounded-xl bg-secondary-container/20 flex items-center justify-center text-secondary shadow-[0_0_16px_rgba(0,166,224,0.3)]">
<span class="material-symbols-outlined text-[24px]">aspect_ratio</span>
</div>
<span class="font-caption-caps text-caption-caps text-secondary font-semibold uppercase bg-secondary/10 px-2 py-0.5 rounded">Unlocked ✦</span>
</div>
<h4 class="font-headline-sm text-body-lg text-on-surface font-semibold mt-1">Pixel Perfect</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Achieve 95%+ CSS layout fidelity score across 5 consecutive AI evaluations.</p>
</div>
<div class="mt-4 pt-2 font-label-mono text-[11px] text-secondary">
              Completed Dec 14, 2024
            </div>
</div>
<!-- Badge 2: Helpful Reviewer (Unlocked) -->
<div class="rounded-xl bg-surface-container/70 backdrop-blur-md p-space-md flex flex-col justify-between shadow-lg relative overflow-hidden group">
<div class="flex flex-col gap-2">
<div class="flex items-center justify-between">
<div class="w-12 h-12 rounded-xl bg-secondary-container/20 flex items-center justify-center text-secondary shadow-[0_0_16px_rgba(0,166,224,0.3)]">
<span class="material-symbols-outlined text-[24px]">handshake</span>
</div>
<span class="font-caption-caps text-caption-caps text-secondary font-semibold uppercase bg-secondary/10 px-2 py-0.5 rounded">Unlocked ✦</span>
</div>
<h4 class="font-headline-sm text-body-lg text-on-surface font-semibold mt-1">Helpful Reviewer</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Perform 10 peer reviews rated 4+ stars by challenge authors.</p>
</div>
<div class="mt-4 pt-2 font-label-mono text-[11px] text-secondary">
              Completed Jan 08, 2025
            </div>
</div>
<!-- Badge 3: Streak Master (Unlocked) -->
<div class="rounded-xl bg-surface-container/70 backdrop-blur-md p-space-md flex flex-col justify-between shadow-lg relative overflow-hidden group">
<div class="flex flex-col gap-2">
<div class="flex items-center justify-between">
<div class="w-12 h-12 rounded-xl bg-secondary-container/20 flex items-center justify-center text-secondary shadow-[0_0_16px_rgba(0,166,224,0.3)]">
<span class="material-symbols-outlined text-[24px]">local_fire_department</span>
</div>
<span class="font-caption-caps text-caption-caps text-secondary font-semibold uppercase bg-secondary/10 px-2 py-0.5 rounded">Unlocked ✦</span>
</div>
<h4 class="font-headline-sm text-body-lg text-on-surface font-semibold mt-1">Streak Master</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Maintain a daily commit and solve streak for 7 consecutive 24h cycles.</p>
</div>
<div class="mt-4 pt-2 font-label-mono text-[11px] text-secondary">
              Active Streak (7 Days)
            </div>
</div>
<!-- Badge 4: Community Hero (In Progress) -->
<div class="rounded-xl bg-surface-container-low/70 backdrop-blur-md p-space-md flex flex-col justify-between shadow-lg relative overflow-hidden">
<div class="flex flex-col gap-2">
<div class="flex items-center justify-between">
<div class="w-12 h-12 rounded-xl bg-surface-container-high flex items-center justify-center text-primary shadow-[0_0_12px_rgba(77,142,255,0.2)]">
<span class="material-symbols-outlined text-[24px]">groups</span>
</div>
<span class="font-caption-caps text-caption-caps text-primary font-semibold uppercase bg-primary-container/20 px-2 py-0.5 rounded">In Flight</span>
</div>
<h4 class="font-headline-sm text-body-lg text-on-surface font-semibold mt-1">Community Hero</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Complete 50 rigorous peer architectural reviews.</p>
</div>
<div class="mt-4 pt-2 flex flex-col gap-1.5">
<div class="flex justify-between font-label-mono text-[11px] text-outline">
<span>Progress</span>
<span class="text-primary font-medium">34 / 50</span>
</div>
<div class="w-full h-1.5 rounded-full bg-surface-container-lowest">
<div class="h-full rounded-full bg-primary" style="width: 68%;"></div>
</div>
</div>
</div>
<!-- Badge 5: Frontend Legend (In Progress) -->
<div class="rounded-xl bg-surface-container-low/70 backdrop-blur-md p-space-md flex flex-col justify-between shadow-lg relative overflow-hidden">
<div class="flex flex-col gap-2">
<div class="flex items-center justify-between">
<div class="w-12 h-12 rounded-xl bg-surface-container-high flex items-center justify-center text-primary shadow-[0_0_12px_rgba(77,142,255,0.2)]">
<span class="material-symbols-outlined text-[24px]">workspace_premium</span>
</div>
<span class="font-caption-caps text-caption-caps text-primary font-semibold uppercase bg-primary-container/20 px-2 py-0.5 rounded">In Flight</span>
</div>
<h4 class="font-headline-sm text-body-lg text-on-surface font-semibold mt-1">Frontend Legend</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Climb the ladder and achieve Developer Level 20 status.</p>
</div>
<div class="mt-4 pt-2 flex flex-col gap-1.5">
<div class="flex justify-between font-label-mono text-[11px] text-outline">
<span>Progress</span>
<span class="text-primary font-medium">12 / 20</span>
</div>
<div class="w-full h-1.5 rounded-full bg-surface-container-lowest">
<div class="h-full rounded-full bg-gradient-to-r from-secondary to-primary" style="width: 60%;"></div>
</div>
</div>
</div>
</div>
</section>
<!-- 7. REAL-TIME ACTIVITY METRIC STRIP -->
<section class="rounded-xl bg-surface-container-low/60 p-space-md backdrop-blur-xl shadow-lg flex flex-col md:flex-row items-center justify-between gap-space-md">
<div class="flex items-center gap-space-md">
<div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-secondary shadow-[0_0_12px_rgba(123,208,255,0.2)]">
<span class="material-symbols-outlined text-[22px]">analytics</span>
</div>
<div>
<h4 class="font-headline-sm text-body-lg text-on-surface font-semibold">Autonomous Reward Engine v2.4</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Live blocks validated every 30 seconds. All XP and Point accruals are signed via runtime attestation tokens.</p>
</div>
</div>
<div class="flex items-center gap-2">
<span class="inline-block w-2.5 h-2.5 rounded-full bg-secondary shadow-[0_0_8px_#7bd0ff] animate-pulse"></span>
<span class="font-label-mono text-body-sm text-secondary font-medium">Global Network Synced</span>
</div>
</section>
</div>
</div>
<!-- Inline Client Interaction Script -->
<script>
    // Ensure Shell Navbar 'Progress' is actively highlighted per design specs
    document.addEventListener("DOMContentLoaded", () => {
      const navLinks = document.querySelectorAll('header nav a');
      navLinks.forEach(link => {
        if (link.getAttribute('data-path') === 'progress' || link.innerText.trim() === 'Progress') {
          link.classList.remove('text-on-surface-variant');
          link.classList.add('bg-surface-container-high', 'text-secondary', 'font-medium', 'shadow-[0_0_12px_rgba(56,189,248,0.2)]');
        }
      });
    });

    // Marketplace Feedback Interactions
    function simulateRedeem(btn, itemName, cost) {
      const banner = document.getElementById('rewardFeedbackBanner');
      const text = document.getElementById('feedbackText');
      if (banner && text) {
        text.innerText = `Successfully redeemed "${itemName}" for ${cost} 💎 Points. Added to inventory.`;
        banner.classList.remove('hidden');
        btn.innerText = 'Redeemed ✓';
        btn.classList.remove('bg-gradient-to-b', 'from-primary-container', 'to-inverse-primary');
        btn.classList.add('bg-secondary/15', 'text-secondary', 'cursor-default');
        btn.disabled = true;
      }
    }

    function simulateEquip(btn, itemName) {
      const banner = document.getElementById('rewardFeedbackBanner');
      const text = document.getElementById('feedbackText');
      if (banner && text) {
        text.innerText = `Active theme switched to "${itemName}". Interface reloaded.`;
        banner.classList.remove('hidden');
        btn.innerText = 'Equipped ✓';
        btn.classList.remove('bg-surface-container-high', 'hover:bg-surface-bright', 'text-on-surface');
        btn.classList.add('bg-secondary/15', 'text-secondary', 'cursor-default');
      }
    }
  </script>
</div>
@endsection

