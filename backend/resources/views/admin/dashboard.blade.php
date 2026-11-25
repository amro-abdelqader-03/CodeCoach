@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-heading', 'Dashboard Overview')

@section('content')
<div class="flex flex-col w-full">
<div class="px-space-md sm:px-space-lg lg:px-space-xl py-space-lg space-y-space-lg max-w-[1720px] mx-auto w-full">
<!-- Section 1: Page Header & Welcome Banner -->
<div class="relative overflow-hidden rounded-xl bg-surface-container-low p-space-lg shadow-xl shadow-surface-container-lowest/40">
<div class="absolute -right-20 -top-20 w-96 h-96 rounded-full bg-gradient-to-br from-primary-container/15 via-secondary/10 to-transparent blur-3xl pointer-events-none"></div>
<div class="absolute left-1/3 -bottom-16 w-64 h-64 rounded-full bg-primary/5 blur-2xl pointer-events-none"></div>
<div class="relative flex flex-col lg:flex-row lg:items-center justify-between gap-space-md">
<div class="space-y-1.5 min-w-0">
<div class="flex items-center gap-space-sm flex-wrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-surface-container-high text-secondary font-caption-caps text-caption-caps uppercase tracking-wider">
<span class="relative flex h-2 w-2">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary opacity-75"></span>
<span class="relative inline-flex rounded-full h-2 w-2 bg-secondary"></span>
</span>
              Live Telemetry • Last updated 2 mins ago
            </span>
<span class="font-label-code-inline text-label-code-inline text-outline px-2 py-0.5 rounded bg-surface-container-lowest/60">SYS_ID: #4092-ALPHA</span>
</div>
<h1 class="font-headline-xl text-headline-xl text-on-surface tracking-tight font-semibold">
            Dashboard Overview
          </h1>
<p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">
            Welcome back, <span class="text-on-surface font-medium">Marcus</span>. Here's what's happening across Smart Coach today.
          </p>
</div>
<div class="flex items-center gap-space-sm flex-wrap self-start lg:self-center">
<button class="group inline-flex items-center gap-2 px-3.5 py-2 rounded-lg bg-surface-container-high text-on-surface font-body-sm text-body-sm font-medium hover:bg-surface-bright hover:text-secondary transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-[18px] text-outline group-hover:text-secondary transition-colors">download</span>
<span>Export CSV</span>
</button>
<button class="group inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gradient-to-b from-primary-container to-inverse-primary text-on-primary font-body-sm text-body-sm font-medium shadow-[0_0_16px_rgba(77,142,255,0.35)] hover:shadow-[0_0_24px_rgba(77,142,255,0.55)] transition-all" type="button">
<span class="material-symbols-outlined text-[18px]">auto_graph</span>
<span>Generate Report</span>
<span class="font-label-code-inline text-label-code-inline text-primary-fixed">↗</span>
</button>
</div>
</div>
</div>
<!-- Section 2: Key Telemetry Cards (4 Metrics) -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-space-md">
<!-- Card 1: Total Users -->
<div class="relative overflow-hidden rounded-xl bg-surface-container-low p-space-md hover:bg-surface-container transition-all group shadow-md shadow-surface-container-lowest/30">
<div class="flex items-start justify-between">
<div class="space-y-1">
<span class="font-caption-caps text-caption-caps text-on-surface-variant uppercase tracking-wider">Total Users</span>
<div class="font-headline-xl text-headline-xl text-on-surface font-semibold tracking-tight">24,850</div>
</div>
<div class="w-10 h-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center group-hover:scale-105 transition-transform">
<span class="material-symbols-outlined text-[22px]">group</span>
</div>
</div>
<div class="mt-4 pt-3 flex items-center justify-between text-body-sm font-body-sm bg-surface-container-lowest/30 -mx-space-md -mb-space-md px-space-md py-2.5">
<span class="inline-flex items-center gap-1 text-secondary font-medium">
<span class="material-symbols-outlined text-[16px]">trending_up</span>
            +12.4% vs last month
          </span>
<span class="font-label-code-inline text-label-code-inline text-outline">1,420 new</span>
</div>
</div>
<!-- Card 2: Active Users -->
<div class="relative overflow-hidden rounded-xl bg-surface-container-low p-space-md hover:bg-surface-container transition-all group shadow-md shadow-surface-container-lowest/30">
<div class="flex items-start justify-between">
<div class="space-y-1">
<span class="font-caption-caps text-caption-caps text-on-surface-variant uppercase tracking-wider">Active Users</span>
<div class="font-headline-xl text-headline-xl text-on-surface font-semibold tracking-tight">8,920</div>
</div>
<div class="w-10 h-10 rounded-lg bg-secondary/10 text-secondary flex items-center justify-center group-hover:scale-105 transition-transform">
<span class="material-symbols-outlined text-[22px]">bolt</span>
</div>
</div>
<div class="mt-4 pt-3 flex items-center justify-between text-body-sm font-body-sm bg-surface-container-lowest/30 -mx-space-md -mb-space-md px-space-md py-2.5">
<span class="inline-flex items-center gap-1 text-secondary font-medium">
<span class="material-symbols-outlined text-[16px]">trending_up</span>
            +8.1% vs last week
          </span>
<span class="font-label-code-inline text-label-code-inline text-outline">36% retention</span>
</div>
</div>
<!-- Card 3: Total Challenges -->
<div class="relative overflow-hidden rounded-xl bg-surface-container-low p-space-md hover:bg-surface-container transition-all group shadow-md shadow-surface-container-lowest/30">
<div class="flex items-start justify-between">
<div class="space-y-1">
<span class="font-caption-caps text-caption-caps text-on-surface-variant uppercase tracking-wider">Total Challenges</span>
<div class="font-headline-xl text-headline-xl text-on-surface font-semibold tracking-tight">148</div>
</div>
<div class="w-10 h-10 rounded-lg bg-tertiary-container/20 text-tertiary flex items-center justify-center group-hover:scale-105 transition-transform">
<span class="material-symbols-outlined text-[22px]">code_blocks</span>
</div>
</div>
<div class="mt-4 pt-3 flex items-center justify-between text-body-sm font-body-sm bg-surface-container-lowest/30 -mx-space-md -mb-space-md px-space-md py-2.5">
<span class="inline-flex items-center gap-1 text-primary font-medium">
<span class="material-symbols-outlined text-[16px]">add_circle</span>
            +6 deployed
          </span>
<span class="font-label-code-inline text-label-code-inline text-outline">12 draft review</span>
</div>
</div>
<!-- Card 4: Completed Evaluations -->
<div class="relative overflow-hidden rounded-xl bg-surface-container-low p-space-md hover:bg-surface-container transition-all group shadow-md shadow-surface-container-lowest/30">
<div class="flex items-start justify-between">
<div class="space-y-1">
<span class="font-caption-caps text-caption-caps text-on-surface-variant uppercase tracking-wider">Completed Evals</span>
<div class="font-headline-xl text-headline-xl text-on-surface font-semibold tracking-tight">94,310</div>
</div>
<div class="w-10 h-10 rounded-lg bg-secondary-fixed/15 text-secondary-fixed-dim flex items-center justify-center group-hover:scale-105 transition-transform">
<span class="material-symbols-outlined text-[22px]">verified</span>
</div>
</div>
<div class="mt-4 pt-3 flex items-center justify-between text-body-sm font-body-sm bg-surface-container-lowest/30 -mx-space-md -mb-space-md px-space-md py-2.5">
<span class="inline-flex items-center gap-1 text-secondary font-medium">
<span class="material-symbols-outlined text-[16px]">speed</span>
            +18.6% velocity
          </span>
<span class="font-label-code-inline text-label-code-inline text-outline">82% AI • 18% Peer</span>
</div>
</div>
</div>
<!-- Section 3: High-Fidelity Analytics Charts Grid -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-space-md">
<!-- Chart 1: User Growth (Line Chart) -->
<div class="rounded-xl bg-surface-container-low p-space-lg shadow-lg shadow-surface-container-lowest/40 flex flex-col justify-between">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm mb-4">
<div>
<div class="flex items-center gap-2">
<h2 class="font-headline-sm text-headline-sm text-on-surface font-medium">User Growth</h2>
<span class="w-2 h-2 rounded-full bg-primary"></span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Monthly registered and active developer accounts</p>
</div>
<div class="flex items-center bg-surface-container-lowest p-1 rounded-lg">
<button class="px-2.5 py-1 rounded text-body-sm font-body-sm text-on-surface-variant hover:text-on-surface transition-colors" type="button">7D</button>
<button class="px-2.5 py-1 rounded text-body-sm font-body-sm text-on-surface-variant hover:text-on-surface transition-colors" type="button">30D</button>
<button class="px-2.5 py-1 rounded text-body-sm font-body-sm bg-surface-container-high text-secondary font-medium shadow-sm" type="button">90D</button>
<button class="px-2.5 py-1 rounded text-body-sm font-body-sm text-on-surface-variant hover:text-on-surface transition-colors" type="button">1Y</button>
</div>
</div>
<!-- Interactive Legend -->
<div class="flex items-center gap-space-md mb-2 text-body-sm font-body-sm">
<div class="flex items-center gap-2">
<span class="w-3 h-0.5 bg-primary rounded"></span>
<span class="text-on-surface-variant">Registered (Total)</span>
</div>
<div class="flex items-center gap-2">
<span class="w-3 h-0.5 bg-secondary border-b border-dashed border-secondary"></span>
<span class="text-on-surface-variant">Active (DAU Avg)</span>
</div>
</div>
<!-- SVG Line Chart Graphic -->
<div class="relative w-full h-64 mt-2">
<svg class="w-full h-full overflow-visible" preserveaspectratio="none" viewbox="0 0 540 220">
<defs>
<lineargradient id="growthAreaGrad" x1="0" x2="0" y1="0" y2="1">
<stop offset="0%" stop-color="#4d8eff" stop-opacity="0.32"></stop>
<stop offset="70%" stop-color="#4d8eff" stop-opacity="0.04"></stop>
<stop offset="100%" stop-color="#4d8eff" stop-opacity="0.0"></stop>
</lineargradient>
<lineargradient id="activeAreaGrad" x1="0" x2="0" y1="0" y2="1">
<stop offset="0%" stop-color="#7bd0ff" stop-opacity="0.2"></stop>
<stop offset="100%" stop-color="#7bd0ff" stop-opacity="0.0"></stop>
</lineargradient>
<filter height="160%" id="glowPoint" width="160%" x="-30%" y="-30%">
<fegaussianblur result="blur" stddeviation="3"></fegaussianblur>
<fecomposite in="SourceGraphic" in2="blur" operator="over"></fecomposite>
</filter>
</defs>
<!-- Horizontal Guide Lines -->
<line stroke="#424754" stroke-dasharray="3 3" stroke-opacity="0.25" x1="40" x2="520" y1="20" y2="20"></line>
<line stroke="#424754" stroke-dasharray="3 3" stroke-opacity="0.25" x1="40" x2="520" y1="70" y2="70"></line>
<line stroke="#424754" stroke-dasharray="3 3" stroke-opacity="0.25" x1="40" x2="520" y1="120" y2="120"></line>
<line stroke="#424754" stroke-dasharray="3 3" stroke-opacity="0.25" x1="40" x2="520" y1="170" y2="170"></line>
<!-- Y Axis values -->
<text fill="#8c909f" font-family="JetBrains Mono" font-size="10" text-anchor="end" x="32" y="24">25k</text>
<text fill="#8c909f" font-family="JetBrains Mono" font-size="10" text-anchor="end" x="32" y="74">20k</text>
<text fill="#8c909f" font-family="JetBrains Mono" font-size="10" text-anchor="end" x="32" y="124">15k</text>
<text fill="#8c909f" font-family="JetBrains Mono" font-size="10" text-anchor="end" x="32" y="174">10k</text>
<!-- Line 1 Area Fill (Registered) -->
<path d="M 60 178 L 140 152 L 220 128 L 300 96 L 380 68 L 480 34 L 480 190 L 60 190 Z" fill="url(#growthAreaGrad)"></path>
<!-- Line 2 Area Fill (Active) -->
<path d="M 60 185 L 140 172 L 220 155 L 300 134 L 380 114 L 480 92 L 480 190 L 60 190 Z" fill="url(#activeAreaGrad)"></path>
<!-- Line 2 Path (Active - cyan dashed) -->
<path d="M 60 185 L 140 172 L 220 155 L 300 134 L 380 114 L 480 92" fill="none" stroke="#7bd0ff" stroke-dasharray="4 4" stroke-linecap="round" stroke-width="2"></path>
<!-- Line 1 Path (Registered - blue solid) -->
<path d="M 60 178 L 140 152 L 220 128 L 300 96 L 380 68 L 480 34" fill="none" stroke="#4d8eff" stroke-linecap="round" stroke-width="2.5"></path>
<!-- Milestone circles -->
<circle cx="60" cy="178" fill="#adc6ff" r="3.5"></circle>
<circle cx="140" cy="152" fill="#adc6ff" r="3.5"></circle>
<circle cx="220" cy="128" fill="#adc6ff" r="3.5"></circle>
<circle cx="300" cy="96" fill="#adc6ff" r="3.5"></circle>
<circle cx="380" cy="68" fill="#adc6ff" r="3.5"></circle>
<!-- Jun Peak Point with Glow Ring -->
<circle cx="480" cy="34" fill="#adc6ff" fill-opacity="0.3" filter="url(#glowPoint)" r="7"></circle>
<circle cx="480" cy="34" fill="#4d8eff" r="4.5" stroke="#dee2f3" stroke-width="1.5"></circle>
<!-- X Axis labels -->
<text fill="#8c909f" font-family="Inter" font-size="11" text-anchor="middle" x="60" y="208">Jan</text>
<text fill="#8c909f" font-family="Inter" font-size="11" text-anchor="middle" x="140" y="208">Feb</text>
<text fill="#8c909f" font-family="Inter" font-size="11" text-anchor="middle" x="220" y="208">Mar</text>
<text fill="#8c909f" font-family="Inter" font-size="11" text-anchor="middle" x="300" y="208">Apr</text>
<text fill="#8c909f" font-family="Inter" font-size="11" text-anchor="middle" x="380" y="208">May</text>
<text fill="#adc6ff" font-family="Inter" font-size="11" font-weight="600" text-anchor="middle" x="480" y="208">Jun</text>
</svg>
<!-- Floating Tooltip near June Milestone -->
<div class="absolute top-2 right-6 bg-surface-container-highest/95 backdrop-blur px-3 py-1.5 rounded-lg shadow-lg pointer-events-none">
<div class="flex items-center gap-1.5">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
<span class="font-label-mono text-label-mono text-on-surface font-semibold">Jun 2025: 24,850 Users</span>
</div>
<div class="font-label-code-inline text-label-code-inline text-secondary font-medium pl-3">+3,250 net new this cycle</div>
</div>
</div>
</div>
<!-- Chart 2: Platform Activity (Bar Chart) -->
<div class="rounded-xl bg-surface-container-low p-space-lg shadow-lg shadow-surface-container-lowest/40 flex flex-col justify-between">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm mb-4">
<div>
<div class="flex items-center gap-2">
<h2 class="font-headline-sm text-headline-sm text-on-surface font-medium">Platform Activity</h2>
<span class="w-2 h-2 rounded-full bg-secondary"></span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Challenge submissions vs completed evaluations</p>
</div>
<div class="flex items-center gap-2">
<span class="font-caption-caps text-caption-caps px-2 py-1 rounded bg-secondary-fixed/15 text-secondary font-semibold">Peak: 4,820 runs/wk</span>
</div>
</div>
<!-- Legend -->
<div class="flex items-center gap-space-md mb-2 text-body-sm font-body-sm">
<div class="flex items-center gap-2">
<span class="w-3 h-3 rounded bg-primary-container"></span>
<span class="text-on-surface-variant">AI Evaluations</span>
</div>
<div class="flex items-center gap-2">
<span class="w-3 h-3 rounded bg-secondary"></span>
<span class="text-on-surface-variant">Submissions</span>
</div>
</div>
<!-- SVG Dual Bar Chart Graphic -->
<div class="relative w-full h-64 mt-2">
<svg class="w-full h-full overflow-visible" preserveaspectratio="none" viewbox="0 0 540 220">
<!-- Grid Lines -->
<line stroke="#424754" stroke-dasharray="3 3" stroke-opacity="0.25" x1="40" x2="520" y1="20" y2="20"></line>
<line stroke="#424754" stroke-dasharray="3 3" stroke-opacity="0.25" x1="40" x2="520" y1="70" y2="70"></line>
<line stroke="#424754" stroke-dasharray="3 3" stroke-opacity="0.25" x1="40" x2="520" y1="120" y2="120"></line>
<line stroke="#424754" stroke-dasharray="3 3" stroke-opacity="0.25" x1="40" x2="520" y1="170" y2="170"></line>
<!-- Y Axis values -->
<text fill="#8c909f" font-family="JetBrains Mono" font-size="10" text-anchor="end" x="32" y="24">5k</text>
<text fill="#8c909f" font-family="JetBrains Mono" font-size="10" text-anchor="end" x="32" y="74">3.5k</text>
<text fill="#8c909f" font-family="JetBrains Mono" font-size="10" text-anchor="end" x="32" y="124">2k</text>
<text fill="#8c909f" font-family="JetBrains Mono" font-size="10" text-anchor="end" x="32" y="174">1k</text>
<!-- Week 1: 1800 vs 2200 -->
<rect fill="#4d8eff" fill-opacity="0.85" height="68" rx="3" width="14" x="70" y="112"></rect>
<rect fill="#7bd0ff" fill-opacity="0.9" height="84" rx="3" width="14" x="88" y="96"></rect>
<!-- Week 2: 2300 vs 2800 -->
<rect fill="#4d8eff" fill-opacity="0.85" height="88" rx="3" width="14" x="145" y="92"></rect>
<rect fill="#7bd0ff" fill-opacity="0.9" height="102" rx="3" width="14" x="163" y="78"></rect>
<!-- Week 3: 2900 vs 3100 -->
<rect fill="#4d8eff" fill-opacity="0.85" height="106" rx="3" width="14" x="220" y="74"></rect>
<rect fill="#7bd0ff" fill-opacity="0.9" height="114" rx="3" width="14" x="238" y="66"></rect>
<!-- Week 4: 3400 vs 3600 -->
<rect fill="#4d8eff" fill-opacity="0.85" height="122" rx="3" width="14" x="295" y="58"></rect>
<rect fill="#7bd0ff" fill-opacity="0.9" height="130" rx="3" width="14" x="313" y="50"></rect>
<!-- Week 5: 3900 vs 4150 -->
<rect fill="#4d8eff" fill-opacity="0.85" height="136" rx="3" width="14" x="370" y="44"></rect>
<rect fill="#7bd0ff" fill-opacity="0.9" height="144" rx="3" width="14" x="388" y="36"></rect>
<!-- Week 6: 4400 vs 4820 (Peak) -->
<rect fill="#4d8eff" height="148" rx="3" width="14" x="445" y="32"></rect>
<rect fill="#7bd0ff" height="158" rx="3" width="14" x="463" y="22"></rect>
<!-- Baseline Line -->
<line stroke="#424754" stroke-opacity="0.5" x1="40" x2="520" y1="180" y2="180"></line>
<!-- X Axis labels -->
<text fill="#8c909f" font-family="Inter" font-size="11" text-anchor="middle" x="86" y="202">W1</text>
<text fill="#8c909f" font-family="Inter" font-size="11" text-anchor="middle" x="161" y="202">W2</text>
<text fill="#8c909f" font-family="Inter" font-size="11" text-anchor="middle" x="236" y="202">W3</text>
<text fill="#8c909f" font-family="Inter" font-size="11" text-anchor="middle" x="311" y="202">W4</text>
<text fill="#8c909f" font-family="Inter" font-size="11" text-anchor="middle" x="386" y="202">W5</text>
<text fill="#7bd0ff" font-family="Inter" font-size="11" font-weight="600" text-anchor="middle" x="461" y="202">W6</text>
</svg>
</div>
</div>
</div>
<!-- Section 4A: Recent Platform Activity Table -->
<div class="rounded-xl bg-surface-container-low overflow-hidden shadow-lg shadow-surface-container-lowest/30">
<div class="p-space-lg flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm bg-surface-container-lowest/20">
<div>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-medium">Recent Platform Activity</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Real-time telemetry event stream across challenges and reviews</p>
</div>
<div class="flex items-center gap-space-sm">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded bg-surface-container-high font-label-mono text-label-mono text-secondary">
<span class="material-symbols-outlined text-[14px]">sensors</span>
            STREAM ACTIVE
          </span>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left font-body-sm text-body-sm">
<thead>
<tr class="bg-surface-container-lowest/60 text-on-surface-variant font-caption-caps text-caption-caps uppercase tracking-wider">
<th class="py-3 px-space-lg" scope="col">User</th>
<th class="py-3 px-space-md" scope="col">Activity Type</th>
<th class="py-3 px-space-md" scope="col">Description</th>
<th class="py-3 px-space-md" scope="col">Timestamp</th>
<th class="py-3 px-space-lg text-right" scope="col">Status</th>
</tr>
</thead>
<tbody class="divide-y-0">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-high/40 transition-colors">
<td class="py-3.5 px-space-lg whitespace-nowrap">
<div class="flex items-center gap-2.5">
<div class="w-7 h-7 rounded-full bg-primary/20 text-primary flex items-center justify-center font-label-mono text-[11px] font-bold">AC</div>
<div>
<div class="text-on-surface font-medium leading-none">Alex Chen</div>
<div class="text-outline font-label-code-inline text-[11px] mt-0.5">@alexchen_dev</div>
</div>
</div>
</td>
<td class="py-3.5 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1 text-on-surface font-medium">
<span class="material-symbols-outlined text-[16px] text-primary">terminal</span>
                  Challenge Completed
                </span>
</td>
<td class="py-3.5 px-space-md text-on-surface-variant max-w-md truncate">
                Submitted Linear Minimalist SaaS Landing Page <span class="text-secondary font-label-mono font-semibold">(Score: 88/100)</span>
</td>
<td class="py-3.5 px-space-md whitespace-nowrap font-label-code-inline text-outline text-label-code-inline">
                2 mins ago
              </td>
<td class="py-3.5 px-space-lg whitespace-nowrap text-right">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-fixed/15 text-secondary font-caption-caps text-caption-caps font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                  SUCCESS
                </span>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-high/40 transition-colors">
<td class="py-3.5 px-space-lg whitespace-nowrap">
<div class="flex items-center gap-2.5">
<div class="w-7 h-7 rounded-full bg-secondary/20 text-secondary flex items-center justify-center font-label-mono text-[11px] font-bold">SL</div>
<div>
<div class="text-on-surface font-medium leading-none">Sarah Lin</div>
<div class="text-outline font-label-code-inline text-[11px] mt-0.5">@slin_codes</div>
</div>
</div>
</td>
<td class="py-3.5 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1 text-on-surface font-medium">
<span class="material-symbols-outlined text-[16px] text-secondary">rate_review</span>
                  Peer Evaluation
                </span>
</td>
<td class="py-3.5 px-space-md text-on-surface-variant max-w-md truncate">
                Completed code review for <span class="text-on-surface">"FinTech Analytics Dashboard"</span>
</td>
<td class="py-3.5 px-space-md whitespace-nowrap font-label-code-inline text-outline text-label-code-inline">
                14 mins ago
              </td>
<td class="py-3.5 px-space-lg whitespace-nowrap text-right">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-primary-container/20 text-primary font-caption-caps text-caption-caps font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                  VERIFIED
                </span>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-high/40 transition-colors">
<td class="py-3.5 px-space-lg whitespace-nowrap">
<div class="flex items-center gap-2.5">
<div class="w-7 h-7 rounded-full bg-tertiary-container/30 text-tertiary flex items-center justify-center font-label-mono text-[11px] font-bold">DM</div>
<div>
<div class="text-on-surface font-medium leading-none">David Miller</div>
<div class="text-outline font-label-code-inline text-[11px] mt-0.5">@dmiller_ai</div>
</div>
</div>
</td>
<td class="py-3.5 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1 text-on-surface font-medium">
<span class="material-symbols-outlined text-[16px] text-tertiary">calendar_clock</span>
                  Human Eval Scheduled
                </span>
</td>
<td class="py-3.5 px-space-md text-on-surface-variant max-w-md truncate">
                Booked slot for <span class="text-on-surface font-label-mono">Thu, Mar 20 at 02:30 PM</span> with senior mentor
              </td>
<td class="py-3.5 px-space-md whitespace-nowrap font-label-code-inline text-outline text-label-code-inline">
                42 mins ago
              </td>
<td class="py-3.5 px-space-lg whitespace-nowrap text-right">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-container/20 text-secondary-fixed-dim font-caption-caps text-caption-caps font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary-container"></span>
                  CONFIRMED
                </span>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-surface-container-high/40 transition-colors">
<td class="py-3.5 px-space-lg whitespace-nowrap">
<div class="flex items-center gap-2.5">
<div class="w-7 h-7 rounded-full bg-primary-fixed/20 text-primary-fixed flex items-center justify-center font-label-mono text-[11px] font-bold">ER</div>
<div>
<div class="text-on-surface font-medium leading-none">Elena Rostova</div>
<div class="text-outline font-label-code-inline text-[11px] mt-0.5">@elena_r</div>
</div>
</div>
</td>
<td class="py-3.5 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1 text-on-surface font-medium">
<span class="material-symbols-outlined text-[16px] text-primary">military_tech</span>
                  New Level Reached
                </span>
</td>
<td class="py-3.5 px-space-md text-on-surface-variant max-w-md truncate">
                Promoted to <span class="text-secondary font-medium">Level 15 (Staff UI Specialist)</span>
</td>
<td class="py-3.5 px-space-md whitespace-nowrap font-label-code-inline text-outline text-label-code-inline">
                1 hour ago
              </td>
<td class="py-3.5 px-space-lg whitespace-nowrap text-right">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-tertiary-container/30 text-tertiary font-caption-caps text-caption-caps font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
                  MILESTONE
                </span>
</td>
</tr>
<!-- Row 5 -->
<tr class="hover:bg-surface-container-high/40 transition-colors">
<td class="py-3.5 px-space-lg whitespace-nowrap">
<div class="flex items-center gap-2.5">
<div class="w-7 h-7 rounded-full bg-surface-bright text-on-surface-variant flex items-center justify-center font-label-mono text-[11px] font-bold">MZ</div>
<div>
<div class="text-on-surface font-medium leading-none">Marcus Zhao</div>
<div class="text-outline font-label-code-inline text-[11px] mt-0.5">@mzhao</div>
</div>
</div>
</td>
<td class="py-3.5 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1 text-on-surface font-medium">
<span class="material-symbols-outlined text-[16px] text-secondary-fixed">troubleshoot</span>
                  AI Audit Discrepancy
                </span>
</td>
<td class="py-3.5 px-space-md text-on-surface-variant max-w-md truncate">
                Flagged Chromium 124 flexbox diff on mobile viewport <span class="font-label-code-inline text-outline">(#PR-8821)</span>
</td>
<td class="py-3.5 px-space-md whitespace-nowrap font-label-code-inline text-outline text-label-code-inline">
                3 hours ago
              </td>
<td class="py-3.5 px-space-lg whitespace-nowrap text-right">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container-highest text-secondary font-caption-caps text-caption-caps font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary animate-pulse"></span>
                  UNDER REVIEW
                </span>
</td>
</tr>
</tbody>
</table>
</div>
<div class="p-space-md bg-surface-container-lowest/40 flex items-center justify-between">
<span class="font-body-sm text-body-sm text-outline">Showing 5 of 1,280 recorded activity cycles</span>
<a class="inline-flex items-center gap-1 font-body-sm text-body-sm text-secondary hover:text-primary transition-colors font-medium" href="{{ route('admin.evaluations') }}">
<span>View All Activity Logs</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</div>
<!-- Section 4B: Recent Users Card & Table -->
<div class="rounded-xl bg-surface-container-low overflow-hidden shadow-lg shadow-surface-container-lowest/30">
<div class="p-space-lg flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm bg-surface-container-lowest/20">
<div>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-medium">Recent Users</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Newly enrolled engineers and credential holders</p>
</div>
<div>
<a class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container-high text-on-surface font-body-sm text-body-sm font-medium hover:bg-surface-bright hover:text-secondary transition-all" href="{{ route('admin.users') }}">
<span>View All (24,850)</span>
<span class="font-label-code-inline text-label-code-inline text-secondary">→</span>
</a>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left font-body-sm text-body-sm">
<thead>
<tr class="bg-surface-container-lowest/60 text-on-surface-variant font-caption-caps text-caption-caps uppercase tracking-wider">
<th class="py-3 px-space-lg" scope="col">User</th>
<th class="py-3 px-space-md" scope="col">Email</th>
<th class="py-3 px-space-md" scope="col">Level & Tier</th>
<th class="py-3 px-space-md" scope="col">Store Points</th>
<th class="py-3 px-space-md" scope="col">Registered</th>
<th class="py-3 px-space-lg text-right" scope="col">Status</th>
</tr>
</thead>
<tbody class="divide-y-0">
<!-- User 1 -->
<tr class="hover:bg-surface-container-high/40 transition-colors">
<td class="py-3.5 px-space-lg whitespace-nowrap">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-gradient-to-tr from-primary-container to-secondary flex items-center justify-center text-on-primary-container font-headline-sm text-[12px] font-bold">
                    AC
                  </div>
<div>
<div class="text-on-surface font-medium">Alex Chen</div>
<div class="text-outline font-label-code-inline text-[11px]">@alexchen_dev</div>
</div>
</div>
</td>
<td class="py-3.5 px-space-md font-label-code-inline text-on-surface-variant text-[13px] whitespace-nowrap">
                alex.chen@devmail.io
              </td>
<td class="py-3.5 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded bg-surface-container-high font-label-mono text-label-mono text-on-surface">
<span class="text-secondary font-semibold">L14</span> • Tier 1 Master
                </span>
</td>
<td class="py-3.5 px-space-md whitespace-nowrap font-label-mono text-label-mono font-medium text-secondary">
                1,820 Pts
              </td>
<td class="py-3.5 px-space-md whitespace-nowrap font-body-sm text-outline">
                Mar 18, 2025
              </td>
<td class="py-3.5 px-space-lg whitespace-nowrap text-right">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-secondary-fixed/15 text-secondary font-caption-caps text-caption-caps font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                  ACTIVE
                </span>
</td>
</tr>
<!-- User 2 -->
<tr class="hover:bg-surface-container-high/40 transition-colors">
<td class="py-3.5 px-space-lg whitespace-nowrap">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-gradient-to-tr from-secondary to-tertiary-fixed-dim flex items-center justify-center text-on-secondary-fixed font-headline-sm text-[12px] font-bold">
                    SL
                  </div>
<div>
<div class="text-on-surface font-medium">Sarah Lin</div>
<div class="text-outline font-label-code-inline text-[11px]">@slin_codes</div>
</div>
</div>
</td>
<td class="py-3.5 px-space-md font-label-code-inline text-on-surface-variant text-[13px] whitespace-nowrap">
                sarah.lin@techteam.co
              </td>
<td class="py-3.5 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded bg-surface-container-high font-label-mono text-label-mono text-on-surface">
<span class="text-secondary font-semibold">L11</span> • Senior Builder
                </span>
</td>
<td class="py-3.5 px-space-md whitespace-nowrap font-label-mono text-label-mono font-medium text-secondary">
                940 Pts
              </td>
<td class="py-3.5 px-space-md whitespace-nowrap font-body-sm text-outline">
                Mar 17, 2025
              </td>
<td class="py-3.5 px-space-lg whitespace-nowrap text-right">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-secondary-fixed/15 text-secondary font-caption-caps text-caption-caps font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                  ACTIVE
                </span>
</td>
</tr>
<!-- User 3 -->
<tr class="hover:bg-surface-container-high/40 transition-colors">
<td class="py-3.5 px-space-lg whitespace-nowrap">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-gradient-to-tr from-primary to-inverse-primary flex items-center justify-center text-on-primary font-headline-sm text-[12px] font-bold">
                    JL
                  </div>
<div>
<div class="text-on-surface font-medium">Jordan Lee</div>
<div class="text-outline font-label-code-inline text-[11px]">@jordan_ui</div>
</div>
</div>
</td>
<td class="py-3.5 px-space-md font-label-code-inline text-on-surface-variant text-[13px] whitespace-nowrap">
                j.lee@frontend.org
              </td>
<td class="py-3.5 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded bg-surface-container-high font-label-mono text-label-mono text-on-surface">
<span class="text-secondary font-semibold">L8</span> • UI Craftsman
                </span>
</td>
<td class="py-3.5 px-space-md whitespace-nowrap font-label-mono text-label-mono font-medium text-secondary">
                520 Pts
              </td>
<td class="py-3.5 px-space-md whitespace-nowrap font-body-sm text-outline">
                Mar 16, 2025
              </td>
<td class="py-3.5 px-space-lg whitespace-nowrap text-right">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-secondary-fixed/15 text-secondary font-caption-caps text-caption-caps font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                  ACTIVE
                </span>
</td>
</tr>
<!-- User 4 -->
<tr class="hover:bg-surface-container-high/40 transition-colors">
<td class="py-3.5 px-space-lg whitespace-nowrap">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-gradient-to-tr from-surface-bright to-surface-variant flex items-center justify-center text-on-surface font-headline-sm text-[12px] font-bold">
                    MP
                  </div>
<div>
<div class="text-on-surface font-medium">Maya Patel</div>
<div class="text-outline font-label-code-inline text-[11px]">@patel_maya</div>
</div>
</div>
</td>
<td class="py-3.5 px-space-md font-label-code-inline text-on-surface-variant text-[13px] whitespace-nowrap">
                maya.p@cloudlabs.net
              </td>
<td class="py-3.5 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded bg-surface-container-high font-label-mono text-label-mono text-on-surface">
<span class="text-outline font-semibold">L4</span> • Apprentice
                </span>
</td>
<td class="py-3.5 px-space-md whitespace-nowrap font-label-mono text-label-mono font-medium text-outline">
                180 Pts
              </td>
<td class="py-3.5 px-space-md whitespace-nowrap font-body-sm text-outline">
                Mar 15, 2025
              </td>
<td class="py-3.5 px-space-lg whitespace-nowrap text-right">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-surface-container-highest text-secondary-fixed font-caption-caps text-caption-caps font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary-fixed"></span>
                  PENDING VERIFICATION
                </span>
</td>
</tr>
<!-- User 5 -->
<tr class="hover:bg-surface-container-high/40 transition-colors">
<td class="py-3.5 px-space-lg whitespace-nowrap">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-gradient-to-tr from-primary-container to-secondary-container flex items-center justify-center text-on-primary font-headline-sm text-[12px] font-bold">
                    LO
                  </div>
<div>
<div class="text-on-surface font-medium">Liam O'Connor</div>
<div class="text-outline font-label-code-inline text-[11px]">@loconnor</div>
</div>
</div>
</td>
<td class="py-3.5 px-space-md font-label-code-inline text-on-surface-variant text-[13px] whitespace-nowrap">
                liam@dublincode.eu
              </td>
<td class="py-3.5 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded bg-surface-container-high font-label-mono text-label-mono text-on-surface">
<span class="text-secondary font-semibold">L16</span> • Staff Architect
                </span>
</td>
<td class="py-3.5 px-space-md whitespace-nowrap font-label-mono text-label-mono font-medium text-secondary">
                3,450 Pts
              </td>
<td class="py-3.5 px-space-md whitespace-nowrap font-body-sm text-outline">
                Mar 14, 2025
              </td>
<td class="py-3.5 px-space-lg whitespace-nowrap text-right">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-secondary-fixed/15 text-secondary font-caption-caps text-caption-caps font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                  ACTIVE
                </span>
</td>
</tr>
</tbody>
</table>
</div>
<div class="p-space-md bg-surface-container-lowest/40 flex items-center justify-between text-body-sm font-body-sm">
<div class="flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
<span class="text-outline font-label-code-inline text-label-code-inline">Tier sync daemon: running [PID 38192]</span>
</div>
<div class="flex items-center gap-1">
<button class="p-1 rounded text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors" disabled="" type="button">
<span class="material-symbols-outlined text-[18px]">chevron_left</span>
</button>
<span class="px-2 py-0.5 rounded bg-surface-container-high text-on-surface font-label-code-inline text-label-code-inline">1 / 497</span>
<button class="p-1 rounded text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors" type="button">
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div>
</div>
</div>
</div>
</div>
@endsection

