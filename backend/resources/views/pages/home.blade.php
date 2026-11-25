@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="flex flex-col w-full relative overflow-hidden text-on-surface">
<!-- Dynamic Interactive Cursor Radial Follower -->
<div class="pointer-events-none fixed -translate-x-1/2 -translate-y-1/2 w-[650px] h-[650px] rounded-full bg-gradient-to-tr from-primary/10 via-secondary/15 to-transparent blur-[120px] z-0 transition-transform duration-75 ease-out opacity-80" id="ambient-cursor-glow" style="left: 36px; top: 2817px;"></div>
<!-- Atmospheric Dot Matrix Background Texture -->
<div class="pointer-events-none absolute inset-0 bg-[radial-gradient(#424754_1px,transparent_1px)] [background-size:24px_24px] opacity-25 z-0"></div>
<!-- Ambient Static Depth Spheres -->
<div class="pointer-events-none absolute -top-40 right-10 w-[550px] h-[550px] rounded-full bg-secondary-container/10 blur-[140px] z-0"></div>
<div class="pointer-events-none absolute top-[35%] -left-32 w-[600px] h-[600px] rounded-full bg-primary-container/10 blur-[160px] z-0"></div>
<div class="pointer-events-none absolute top-[70%] right-[-100px] w-[500px] h-[500px] rounded-full bg-tertiary-container/10 blur-[150px] z-0"></div>
<!-- ==================== 1. HERO SECTION ==================== -->
<section class="relative z-10 px-6 lg:px-12 py-16 lg:py-24 max-w-7xl mx-auto w-full" style="padding-top: 8rem; padding-bottom: 8rem;">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
<!-- Hero Left: Narrative & Call to Action -->
<div class="lg:col-span-6 flex flex-col space-y-6"><!-- Interactive Pill Badge -->
<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-surface-container-high/80 border border-secondary/30 backdrop-blur-md w-fit shadow-[0_0_15px_-3px_rgba(123,208,255,0.25)] mb-4">
  <span class="relative flex h-2 w-2">
    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary opacity-75"></span>
    <span class="relative inline-flex rounded-full h-2 w-2 bg-secondary"></span>
  </span>
  <span class="font-label-mono text-caption-caps text-secondary font-semibold uppercase tracking-widest">✦ AI-Powered Frontend Learning</span>
</div>
<!-- Minimalist Punchy Headline -->
<h1 class="font-display-hero text-display-hero lg:text-display-hero tracking-tight text-on-surface leading-[1.12] font-bold mb-6">
  Build Websites.<br>
  <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary via-secondary to-primary-container">Master Frontend.</span>
</h1>
<!-- Short Focused Description -->
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl leading-relaxed mb-8">
  Turn any website into a coding challenge, get AI feedback, and level up your skills.
</p>
<!-- Action Buttons -->
<div class="flex flex-wrap items-center gap-4 pt-2">
  <a class="group relative inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-gradient-to-r from-primary-container to-secondary-container text-on-primary font-headline-sm text-headline-sm font-medium shadow-[0_0_25px_-4px_rgba(77,142,255,0.5)] hover:shadow-[0_0_35px_rgba(123,208,255,0.7)] transition-all duration-300 hover:scale-[1.02]" href="#challenges">
    <span class="">Get Started</span>
    <span class="material-symbols-outlined text-[20px] transition-transform duration-200 group-hover:translate-x-1">arrow_forward</span>
  </a>
  <a class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-surface-container/70 border border-outline-variant/40 hover:border-secondary/50 text-on-surface font-body-md text-body-md backdrop-blur-md transition-all duration-200 hover:bg-surface-container-high" href="#how-it-works">
    <span class="material-symbols-outlined text-secondary text-[20px]">explore</span>
    <span class="">Explore Challenges</span>
  </a>
</div></div>
<!-- Hero Right: Interactive Terminal Playground -->
<div class="lg:col-span-6">
<div class="relative rounded-2xl bg-surface-container-lowest/90 border border-primary/25 backdrop-blur-xl shadow-[0_0_50px_-10px_rgba(77,142,255,0.2)] overflow-hidden">
<!-- Terminal Title Bar -->
<div class="h-10 px-4 bg-surface-container-low/95 border-b border-outline-variant/25 flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="w-3 h-3 rounded-full bg-[#ff5f56]/90 block"></span>
<span class="w-3 h-3 rounded-full bg-[#ffbd2e]/90 block"></span>
<span class="w-3 h-3 rounded-full bg-[#27c93f]/90 block"></span>
</div>
<div class="flex items-center gap-1.5 font-label-mono text-caption-caps text-on-surface-variant">
<span class="material-symbols-outlined text-[14px] text-secondary">terminal</span>
<span class="">smartcoach-cli v2.4 ~ bash</span>
</div>
<div class="w-12 flex justify-end">
<span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
</div>
</div>
<!-- Terminal Content Viewport -->
<div class="p-6 font-label-mono text-label-mono space-y-3 min-h-[380px] text-on-surface border-secondary/40" id="cli-viewport"><div class="space-y-4 py-2">
  <!-- Command 1 -->
  <div>
    <div class="flex items-center gap-2 text-on-surface-variant">
      <span class="text-primary font-bold">$</span>
      <span class="text-on-surface font-medium">smartcoach analyze https://example.com</span>
    </div>
    <div class="space-y-1.5 pl-4 pt-2 text-body-sm">
      <div class="text-secondary flex items-center gap-2">
        <span class="material-symbols-outlined text-[16px]">check_circle</span>
        <span class="">Website analyzed</span>
      </div>
      <div class="text-secondary flex items-center gap-2">
        <span class="material-symbols-outlined text-[16px]">check_circle</span>
        <span class="">Challenge generated</span>
      </div>
    </div>
  </div>

  <!-- Command 2 -->
  <div class="pt-2">
    <div class="flex items-center gap-2 text-on-surface-variant">
      <span class="text-primary font-bold">$</span>
      <span class="text-on-surface font-medium">smartcoach evaluate</span>
    </div>
    <div class="space-y-1.5 pl-4 pt-2 text-body-sm">
      <div class="text-secondary flex items-center gap-2">
        <span class="material-symbols-outlined text-[16px]">check_circle</span>
        <span class="">Visual similarity: <strong class="text-secondary-fixed">94%</strong></span>
      </div>
      <div class="text-secondary flex items-center gap-2">
        <span class="material-symbols-outlined text-[16px]">check_circle</span>
        <span class="">Evaluation completed</span>
      </div>
    </div>
  </div>

  <!-- XP Earned Badge -->
  <div class="pt-3 pl-4 flex items-center gap-3">
    <span class="px-3 py-1 rounded-lg bg-primary/20 border border-primary/30 text-primary font-bold text-body-sm shadow-[0_0_15px_rgba(77,142,255,0.25)]">+250 XP earned!</span>
  </div>

  <!-- Blinking Prompt -->
  <div class="flex items-center gap-2 pt-2 text-on-surface-variant">
    <span class="text-primary font-bold">$</span>
    <span class="inline-block w-2.5 h-4 bg-secondary animate-pulse ml-0.5"></span>
  </div>
</div></div>
<!-- Terminal Bottom Status Bar -->
<div class="px-4 py-2 bg-surface-container-lowest border-t border-outline-variant/20 flex items-center justify-between text-caption-caps text-on-surface-variant font-label-mono">
<span class="flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
              Connected: Node v20.11 / WebKit Sandbox
            </span>
<span class="">UTF-8</span>
</div>
</div>
</div>
</div>
</section>
<!-- ==================== 2. HOW SMART COACH WORKS ==================== -->
<section class="relative z-10 px-6 lg:px-12 py-20 max-w-7xl mx-auto w-full" id="how-it-works" style="padding-top: 8rem; padding-bottom: 8rem;"><div class="text-center max-w-2xl mx-auto mb-16 space-y-4">
  <div class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-surface-container-high border border-outline-variant/30 text-primary font-caption-caps uppercase tracking-widest font-semibold mb-3">
    End-to-End Methodology
  </div>
  <h2 class="font-headline-xl text-display-hero-mobile lg:text-headline-xl tracking-tight text-on-surface font-bold leading-tight">
    Your Learning Journey, Reimagined.
  </h2>
  <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl leading-relaxed">
    Master modern frontend mechanics through real production systems, deterministic AI auditing, and collaborative peer code review.
  </p>
</div>
<!-- 4 Interconnected Steps Grid with Refined Metrics Typography -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 relative">
  <!-- Step 1 -->
  <div class="flex flex-col space-y-2 p-2">
    <div class="font-label-mono text-headline-sm font-bold text-secondary tracking-wider mb-2">01</div>
    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight mb-2">Choose a Website</h3>
    <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
      Find any website you like. Copy and paste its URL into Smart Coach to begin.
    </p>
  </div>

  <!-- Step 2 -->
  <div class="flex flex-col space-y-2 p-2 md:border-l md:border-outline-variant/20 md:pl-6">
    <div class="font-label-mono text-headline-sm font-bold text-secondary tracking-wider mb-2">02</div>
    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight mb-2">Build Challenge</h3>
    <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
      AI analyzes the structure and creates a tailored challenge. Reconstruct the UI with modern frontend code.
    </p>
  </div>

  <!-- Step 3 -->
  <div class="flex flex-col space-y-2 p-2 md:border-l md:border-outline-variant/20 md:pl-6">
    <div class="font-label-mono text-headline-sm font-bold text-secondary tracking-wider mb-2">03</div>
    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight mb-2">Get Evaluated</h3>
    <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
      Submit for instant AI visual diff analysis, AST code grading, and constructive peer reviews.
    </p>
  </div>

  <!-- Step 4 -->
  <div class="flex flex-col space-y-2 p-2 md:border-l md:border-outline-variant/20 md:pl-6">
    <div class="font-label-mono text-headline-sm font-bold text-secondary tracking-wider mb-2">04</div>
    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight mb-2">Publish &amp; Level Up</h3>
    <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
      Earn mastery XP, unlock higher engineering tiers, and publish your verified showcase project.
    </p>
  </div>
</div></section>
<!-- ==================== 3. GAMIFICATION & PROGRESS ==================== -->
<section class="relative z-10 px-6 lg:px-12 py-20 max-w-7xl mx-auto w-full" id="gamification" style="padding-top: 8rem; padding-bottom: 8rem;">
<div class="text-center max-w-2xl mx-auto mb-16 space-y-3"><div class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-surface-container-high border border-outline-variant/30 text-secondary font-caption-caps uppercase tracking-widest font-semibold mb-3">
  Progression Architecture
</div>
<h2 class="font-headline-xl text-display-hero-mobile lg:text-headline-xl tracking-tight text-on-surface font-bold leading-tight">
  Every Challenge Takes You One Level Higher.
</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl leading-relaxed">
  Transform code repetition into tangible rank progression, verifiable proof of skill, and unlocks.
</p></div>
<!-- Main Gamification Bento Layout -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto pt-4">
  <div class="p-6 rounded-2xl bg-surface-container-low/40 border border-outline-variant/20 backdrop-blur-sm space-y-3 transition-colors hover:border-secondary/30">
    <div class="flex items-center gap-3">
      <span class="material-symbols-outlined text-secondary text-[24px]">bolt</span>
      <h3 class="font-headline-sm text-headline-sm font-semibold text-on-surface">Earn XP</h3>
    </div>
    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
      Gain continuous mastery XP validated by AI code analysis on every challenge.
    </p>
  </div>
  <div class="p-6 rounded-2xl bg-surface-container-low/40 border border-outline-variant/20 backdrop-blur-sm space-y-3 transition-colors hover:border-primary/30">
    <div class="flex items-center gap-3">
      <span class="material-symbols-outlined text-primary text-[24px]">trending_up</span>
      <h3 class="font-headline-sm text-headline-sm font-semibold text-on-surface">Climb Ranks</h3>
    </div>
    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
      Advance through tiers from Novice to Principal Synthesizer with on-chain skill proof.
    </p>
  </div>
  <div class="p-6 rounded-2xl bg-surface-container-low/40 border border-outline-variant/20 backdrop-blur-sm space-y-3 transition-colors hover:border-tertiary/30">
    <div class="flex items-center gap-3">
      <span class="material-symbols-outlined text-tertiary text-[24px]">redeem</span>
      <h3 class="font-headline-sm text-headline-sm font-semibold text-on-surface">Unlock Perks</h3>
    </div>
    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
      Redeem earned points for Pro challenges, AST tools, and verified certificates.
    </p>
  </div>
</div>
</section>
<!-- ==================== 4. AI COACH SECTION (PRO FEATURE) ==================== -->
<section class="relative z-10 px-6 lg:px-12 py-24 max-w-7xl mx-auto w-full" id="ai-coach" style="padding-top: 8.5rem; padding-bottom: 8.5rem;"><!-- Header -->
<div class="text-center max-w-2xl mx-auto mb-12 space-y-3">
  <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-secondary/10 border border-secondary/30 text-secondary mb-2">
    <span class="material-symbols-outlined text-[15px]">mic</span>
    <span class="font-label-mono text-caption-caps font-bold tracking-widest uppercase">VOICE MENTOR</span>
  </div>
  <h2 class="font-headline-xl text-display-hero-mobile lg:text-headline-xl tracking-tight text-on-surface font-bold leading-tight">
    Talk to Athena While You Code.
  </h2>
  <p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl leading-relaxed mx-auto">
    Hands-free, real-time voice guidance as you build. Just ask aloud.
  </p>
</div>

<!-- Minimalist Voice Interaction Card -->
<div class="max-w-2xl mx-auto relative">
  <!-- Gentle Glow Behind Card -->
  <div class="absolute -inset-1 rounded-3xl bg-gradient-to-r from-primary/15 via-secondary/20 to-primary-container/15 blur-xl opacity-50 pointer-events-none"></div>

  <div class="relative rounded-3xl bg-surface-container-low/80 border border-secondary/25 backdrop-blur-xl p-8 md:p-10 shadow-2xl flex flex-col items-center text-center space-y-8">
    <!-- Top Status Indicator Pill -->
    <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-surface-container-lowest/80 border border-outline-variant/30 font-label-mono text-caption-caps text-on-surface-variant">
      <span class="relative flex h-2 w-2">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#4ade80] opacity-75"></span>
        <span class="relative inline-flex rounded-full h-2 w-2 bg-[#4ade80]"></span>
      </span>
      <span class="text-on-surface font-medium">Athena Live Voice</span>
      <span class="text-outline-variant">•</span>
      <span class="text-secondary">Always Listening</span>
    </div>

    <!-- Glowing Audio Orb Visualizer -->
    <div class="relative flex items-center justify-center my-2">
      <div class="absolute w-28 h-28 rounded-full bg-secondary/15 blur-xl animate-pulse"></div>
      <div class="relative w-20 h-20 rounded-full bg-gradient-to-tr from-primary/30 to-secondary/30 border border-secondary/40 flex items-center justify-center shadow-[0_0_25px_rgba(123,208,255,0.35)]">
        <div class="w-12 h-12 rounded-full bg-surface-container-lowest flex items-center justify-center border border-secondary/50 text-secondary">
          <span class="material-symbols-outlined text-[24px] animate-pulse">graphic_eq</span>
        </div>
      </div>
    </div>

    <!-- Single Natural Dialogue Stream -->
    <div class="w-full space-y-3.5 text-left max-w-lg">
      <!-- User Prompt -->
      <div class="p-3.5 rounded-2xl bg-surface-container/50 border border-outline-variant/20 flex items-start gap-3">
        <div class="w-7 h-7 rounded-lg bg-surface-container-high border border-outline-variant/30 flex items-center justify-center text-on-surface-variant font-label-mono text-[11px] font-bold shrink-0 mt-0.5">
          YOU
        </div>
        <p class="font-body-md text-on-surface leading-snug font-medium pt-1">
          “Athena, why is my grid overflowing?”
        </p>
      </div>

      <!-- Athena Response -->
      <div class="p-4 rounded-2xl bg-surface-container/90 border border-secondary/30 flex items-start gap-3 shadow-md">
        <div class="w-7 h-7 rounded-lg bg-secondary/20 border border-secondary/40 flex items-center justify-center text-secondary shrink-0 mt-0.5 shadow-[0_0_12px_rgba(123,208,255,0.3)]">
          <span class="material-symbols-outlined text-[16px]">record_voice_over</span>
        </div>
        <div class="space-y-1 flex-1">
          <span class="font-body-sm font-semibold text-secondary text-[12px] block">Coach Athena</span>
          <p class="font-body-md text-on-surface leading-relaxed">
            “Your columns need <code class="font-label-mono text-secondary px-1.5 py-0.5 bg-surface-container-lowest rounded text-[13px]">minmax(0, 1fr)</code> on line 42 to prevent the minimum content blowout.”
          </p>
        </div>
      </div>
    </div>

    <!-- Bottom Action Controls -->
    <div class="w-full flex items-center justify-center gap-3 pt-2">
      <a href="#challenges" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-gradient-to-r from-primary to-secondary text-on-primary font-body-md font-semibold shadow-[0_0_20px_rgba(77,142,255,0.4)] hover:shadow-[0_0_25px_rgba(123,208,255,0.6)] hover:scale-[1.01] transition-all">
        <span class="material-symbols-outlined text-[20px]">mic</span>
        <span class="">Try Voice Mode</span>
      </a>
      <button type="button" class="w-11 h-11 rounded-xl bg-surface-container border border-outline-variant/30 flex items-center justify-center text-on-surface-variant hover:text-on-surface hover:border-secondary/40 transition-colors" title="Toggle Microphone">
        <span class="material-symbols-outlined text-[20px]">mic_off</span>
      </button>
    </div>
  </div>
</div></section>
<!-- ==================== 5. PRICING SECTION ==================== -->
<section class="relative z-10 px-6 lg:px-12 py-20 max-w-7xl mx-auto w-full" id="pricing" style="padding-top: 8rem; padding-bottom: 8rem;">
<div class="text-center max-w-2xl mx-auto mb-16 space-y-3"><div class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-surface-container-high border border-outline-variant/30 text-primary font-caption-caps uppercase tracking-widest font-semibold mb-3">
  Transparent Tiers
</div>
<h2 class="font-headline-xl text-display-hero-mobile lg:text-headline-xl tracking-tight text-on-surface font-bold leading-tight mb-4">
  Choose Your Learning Experience.
</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl leading-relaxed">
  Start for free and unlock autonomous coaching when you are ready to accelerate your frontend velocity.
</p></div>
<!-- 2 Plan Cards (Free vs Pro) -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto items-stretch">
<!-- FREE PLAN -->
<div class="rounded-2xl bg-surface-container-low/70 border border-outline-variant/30 p-8 backdrop-blur-md flex flex-col justify-between hover:border-outline-variant/60 transition-all duration-300">
<div class="space-y-6">
<div class="space-y-2">
<span class="font-label-mono text-caption-caps text-on-surface-variant uppercase tracking-wider">Explorer</span>
<h3 class="font-headline-lg text-headline-lg font-bold text-on-surface">Free Plan</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Essential baseline for frontend fundamentals and peer interaction.</p>
</div>
<div class="pt-2">
<div class="flex items-baseline gap-1">
<span class="font-headline-xl text-display-hero font-bold text-on-surface">$0</span>
<span class="font-body-md text-body-md text-on-surface-variant">/ month</span>
</div>
<span class="font-caption-caps text-caption-caps text-on-surface-variant block mt-1">Free forever. No credit card required.</span>
</div>
<!-- Features List -->
<ul class="space-y-3 pt-4 border-t border-outline-variant/20 font-body-sm text-body-sm text-on-surface-variant">
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-secondary text-[18px]">check</span>
<span class="">1 AI-generated challenge per day</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-secondary text-[18px]">check</span>
<span class="">1 AI visual evaluation per day</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-secondary text-[18px]">check</span>
<span class="">Access to public community challenges</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-secondary text-[18px]">check</span>
<span class="">Participate in peer evaluations</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-secondary text-[18px]">check</span>
<span class="">Earn XP and level up profile</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-secondary text-[18px]">check</span>
<span class="">Earn points and unlock rewards</span>
</li>
<li class="flex items-center gap-2.5 text-on-surface-variant/70">
<span class="material-symbols-outlined text-outline text-[18px]">check</span>
<span class="">Basic progress analytics</span>
</li>
</ul>
</div>
<div class="pt-8">
<a class="w-full inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-surface-container-high hover:bg-surface-bright border border-outline-variant/40 text-on-surface font-body-md font-semibold transition-all" href="{{ route('challenges.index') }}">
            Get Started Free
          </a>
</div>
</div>
<!-- PRO PLAN (HIGHLIGHTED) -->
<div class="relative rounded-2xl bg-surface-container-low/90 border-2 border-secondary p-8 backdrop-blur-xl flex flex-col justify-between shadow-[0_0_40px_-5px_rgba(123,208,255,0.25)] hover:shadow-[0_0_50px_rgba(123,208,255,0.35)] transition-all duration-300">
<!-- Top Badge -->
<div class="absolute -top-3.5 right-8 px-3.5 py-1 rounded-full bg-gradient-to-r from-primary to-secondary text-on-primary font-caption-caps font-bold tracking-wider uppercase shadow-md">
          MOST POPULAR
        </div>
<div class="space-y-6">
<div class="space-y-2">
<span class="font-label-mono text-caption-caps text-secondary uppercase tracking-wider font-semibold">High Velocity</span>
<h3 class="font-headline-lg text-headline-lg font-bold text-on-surface flex items-center gap-2">
              Pro Plan
              <span class="material-symbols-outlined text-secondary text-[22px]">verified</span>
</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Full autonomous coaching, rapid AI loops, and private roadmaps.</p>
</div>
<div class="pt-2">
<div class="flex items-baseline gap-2">
<span class="font-headline-xl text-display-hero font-bold text-secondary">10 JOD</span>
<span class="font-body-md text-body-md text-on-surface-variant">/ month</span>
</div>
<span class="font-caption-caps text-caption-caps text-secondary/80 block mt-1">Billed monthly in Jordanian Dinar (approx. $14.10 USD)</span>
</div>
<!-- Features List -->
<ul class="space-y-3 pt-4 border-t border-outline-variant/30 font-body-sm text-body-sm text-on-surface">
<li class="flex items-center gap-2.5 font-medium text-secondary">
<span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
<span class="">Everything included in Free Plan</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
<span class="">5 AI-generated challenges / day</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
<span class="">5 AI evaluations / day</span>
</li>
<li class="flex items-center gap-2.5 font-semibold text-primary">
<span class="material-symbols-outlined text-primary text-[18px]">bolt</span>
<span class="">Full 24/7 Access to AI Coach Athena</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
<span class="">Personalized tailored learning roadmaps</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
<span class="">Advanced AST code recommendations</span>
</li>
<li class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
<span class="">Priority sandbox queues &amp; verified badges</span>
</li>
</ul>
</div>
<div class="pt-8">
<a class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-gradient-to-r from-primary-container via-secondary to-primary-container text-on-primary font-headline-sm text-headline-sm font-semibold shadow-[0_0_25px_rgba(77,142,255,0.6)] hover:shadow-[0_0_35px_rgba(123,208,255,0.8)] transition-all" href="{{ route('challenges.index') }}">
<span class="">Upgrade to Pro</span>
<span class="material-symbols-outlined text-[20px]">arrow_forward</span>
</a>
</div>
</div>
</div>
</section>
<!-- ==================== 6. FINAL CALL TO ACTION ==================== -->
<section class="relative z-10 px-6 lg:px-12 py-24 max-w-7xl mx-auto w-full" style="padding-top: 8.5rem; padding-bottom: 9rem;">
<div class="relative rounded-3xl bg-gradient-to-b from-surface-container-high/90 via-surface-container/80 to-surface-container-lowest border border-secondary/30 p-10 lg:p-16 overflow-hidden text-center shadow-[0_0_60px_-10px_rgba(77,142,255,0.2)]">
<!-- Ambient Radial Flare behind Text -->
<div class="pointer-events-none absolute -top-24 left-1/2 -translate-x-1/2 w-[600px] h-[350px] bg-secondary/20 rounded-full blur-[100px]"></div>
<div class="relative z-10 max-w-2xl mx-auto space-y-6"><span class="font-label-mono text-caption-caps uppercase tracking-widest text-secondary font-bold inline-block mb-3">
  ✦ Zero Friction Transition
</span>
<h2 class="font-display-hero text-headline-xl lg:text-display-hero tracking-tight text-on-surface leading-tight font-bold">
  Your Next Level Starts With One Challenge.
</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed max-w-xl mx-auto">
  Pick any website, generate your first challenge, and start forging tangible frontend mastery today.
</p>
<div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
  <a class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 rounded-xl bg-primary text-on-primary font-headline-sm text-headline-sm font-semibold shadow-[0_0_30px_rgba(77,142,255,0.5)] hover:shadow-[0_0_45px_rgba(123,208,255,0.8)] hover:bg-primary-fixed transition-all" href="#how-it-works">
    <span class="">Start Your First Challenge</span>
    <span class="material-symbols-outlined text-[20px]">rocket_launch</span>
  </a>
</div>
<div class="flex items-center justify-center gap-6 pt-3 text-caption-caps text-on-surface-variant font-label-mono">
  <span class="flex items-center gap-1.5">
    <span class="material-symbols-outlined text-secondary text-[14px]">check</span>
    No experience required
  </span>
  <span class="flex items-center gap-1.5">
    <span class="material-symbols-outlined text-secondary text-[14px]">check</span>
    Start 100% Free
  </span>
  <span class="flex items-center gap-1.5">
    <span class="material-symbols-outlined text-secondary text-[14px]">check</span>
    Instant Sandbox
  </span>
</div></div>
</div>
</section>
<!-- ==================== MICRO-INTERACTION LOGIC ==================== -->
<script>
    (function () {
      // 1. Smooth Cursor Spotlight Tracker
      const cursorGlow = document.getElementById('ambient-cursor-glow');
      if (cursorGlow) {
        let mouseX = window.innerWidth / 2;
        let mouseY = 300;
        let currentX = mouseX;
        let currentY = mouseY;

        window.addEventListener('mousemove', (e) => {
          mouseX = e.clientX;
          mouseY = e.clientY;
        }, { passive: true });

        function animateCursor() {
          currentX += (mouseX - currentX) * 0.12;
          currentY += (mouseY - currentY) * 0.12;
          cursorGlow.style.left = currentX + 'px';
          cursorGlow.style.top = currentY + 'px';
          requestAnimationFrame(animateCursor);
        }
        requestAnimationFrame(animateCursor);
      }

      // 2. Terminal Auto-scroll and Interactive Click Stimulation
      const cliViewport = document.getElementById('cli-viewport');
      if (cliViewport) {
        cliViewport.addEventListener('mouseenter', () => {
          cliViewport.classList.add('border-secondary/40');
        });
      }
    })();
  </script>
</div>
@endsection

