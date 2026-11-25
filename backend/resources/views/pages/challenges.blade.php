@extends('layouts.app')

@section('title', 'Challenges')

@section('content')
<div class="flex flex-col w-full">
<!-- Ambient Spatial Glows -->
<div class="relative w-full overflow-hidden">
<div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[720px] h-[360px] bg-primary-container/10 blur-[130px] rounded-full pointer-events-none"></div>
<div class="absolute top-96 -left-48 w-[420px] h-[420px] bg-secondary/5 blur-[120px] rounded-full pointer-events-none"></div>
<div class="absolute top-[800px] -right-48 w-[500px] h-[500px] bg-primary/5 blur-[140px] rounded-full pointer-events-none"></div>
<!-- Main Container -->
<div class="max-w-7xl mx-auto px-6 py-12 lg:px-12 flex flex-col gap-space-xl relative z-10">
<!-- Header Section -->
<section class="flex flex-col items-center text-center gap-space-md pt-4">
<!-- Top Pill Badge -->
<div class="inline-flex items-center gap-space-xs px-3.5 py-1.5 rounded-full bg-surface-container-high/90 shadow-[0_0_16px_rgba(77,142,255,0.15)]">
<span class="relative flex h-2 w-2">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary opacity-80"></span>
<span class="relative inline-flex rounded-full h-2 w-2 bg-secondary"></span>
</span>
<span class="font-caption-caps text-caption-caps uppercase text-secondary tracking-wider font-semibold">✦ BUILD YOUR SKILLS</span>
</div>
<!-- Headline with Radial Backdrop Highlight -->
<div class="relative flex flex-col items-center">
<div class="absolute inset-0 bg-radial from-primary/15 via-transparent to-transparent blur-2xl -z-10 pointer-events-none"></div>
<h1 class="font-display-hero text-display-hero text-on-surface tracking-tight max-w-2xl font-bold">
            Explore Challenges
          </h1>
</div>
<!-- Subheading -->
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl leading-relaxed">
          Choose a website, recreate its design, and prove your frontend development skills with instant AI runtime feedback.
        </p>
<!-- Stats Metric Bar -->
<div class="inline-flex items-center gap-space-md px-4 py-2 rounded-full bg-surface-container-low text-on-surface-variant mt-2">
<div class="flex items-center gap-1.5 font-label-mono text-label-mono text-secondary">
<span class="material-symbols-outlined text-[16px]">terminal</span>
<span>6 Curated Challenges</span>
</div>
<span class="text-outline-variant">•</span>
<div class="flex items-center gap-1.5 font-label-mono text-label-mono text-tertiary">
<span class="material-symbols-outlined text-[16px]">bolt</span>
<span>1,900 XP Earnable</span>
</div>
<span class="text-outline-variant">•</span>
<div class="flex items-center gap-1.5 font-label-mono text-label-mono text-on-surface-variant">
<span class="material-symbols-outlined text-[16px]">psychology</span>
<span>AI Code Coach</span>
</div>
</div>
</section>
<!-- Category Filter & Search Bar -->
<section class="flex flex-col md:flex-row items-center justify-between gap-space-md bg-surface-container-low/70 backdrop-blur-xl p-2.5 rounded-xl shadow-sm">
<!-- Filter Tabs -->
<div class="flex items-center gap-1 overflow-x-auto w-full md:w-auto p-1 scrollbar-none" id="categoryTabs">
<button class="tab-btn px-4 py-2 rounded-lg font-body-sm text-body-sm font-medium transition-all bg-primary-container text-on-primary-container shadow-[0_0_14px_rgba(77,142,255,0.3)]" type="button">
            All Challenges <span class="ml-1 opacity-80 font-label-mono text-label-code-inline">6</span>
</button>
<button class="tab-btn px-4 py-2 rounded-lg font-body-sm text-body-sm font-medium transition-all text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high" type="button">
            Landing Pages
          </button>
<button class="tab-btn px-4 py-2 rounded-lg font-body-sm text-body-sm font-medium transition-all text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high" type="button">
            Dashboards
          </button>
<button class="tab-btn px-4 py-2 rounded-lg font-body-sm text-body-sm font-medium transition-all text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high" type="button">
            E-Commerce
          </button>
<button class="tab-btn px-4 py-2 rounded-lg font-body-sm text-body-sm font-medium transition-all text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high" type="button">
            Portfolios
          </button>
</div>
<!-- Stack Selector & Search Input -->
<div class="flex items-center gap-2 w-full md:w-auto">
<div class="relative flex-1 md:w-56">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[18px]">search</span>
<input class="w-full bg-surface-container-lowest text-on-surface font-body-sm text-body-sm pl-9 pr-3 py-2 rounded-lg placeholder-outline focus:outline-none focus:bg-surface-container-high transition-colors" placeholder="Search stack, topics..." type="text"/>
</div>
<div class="hidden sm:flex items-center gap-1.5 px-3 py-2 rounded-lg bg-surface-container text-on-surface-variant font-label-mono text-label-code-inline">
<span class="material-symbols-outlined text-[16px] text-primary">filter_alt</span>
<span>React / Tailwind</span>
</div>
</div>
</section>
<!-- Challenges Grid: 3 per row on Desktop -->
<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
<!-- CARD 1 -->
<article class="group relative flex flex-col justify-between bg-surface-container-low/80 backdrop-blur-xl rounded-2xl overflow-hidden shadow-lg transition-all duration-300 hover:shadow-[0_0_32px_rgba(77,142,255,0.2)] hover:-translate-y-1">
<div class="p-4 flex flex-col gap-4">
<!-- Screenshot Container -->
<div class="aspect-video w-full rounded-xl overflow-hidden relative bg-surface-container-lowest">
<img alt="Clean modern SaaS landing page website UI screenshot" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500" src="{{ asset('images/SaaS_Landing_Page.jpg') }}"/>
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest/80 via-transparent to-transparent opacity-60"></div>
<!-- Floating Pill on preview -->
<div class="absolute top-3 left-3">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-surface-container-lowest/85 backdrop-blur-md text-[#34d399] font-caption-caps text-caption-caps uppercase tracking-wider font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-[#34d399]"></span>
                  Easy
                </span>
</div>
<div class="absolute top-3 right-3">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-surface-container-lowest/85 backdrop-blur-md text-tertiary font-label-mono text-label-code-inline font-medium">
                  +150 XP
                </span>
</div>
</div>
<!-- Card Meta & Content -->
<div class="flex flex-col gap-2">
<div class="flex items-center justify-between">
<span class="font-label-mono text-label-code-inline text-secondary font-medium">LANDING PAGE</span>
<span class="font-label-mono text-label-code-inline text-outline">~45 mins</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">
                01. Modern SaaS Landing Page
              </h3>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 leading-relaxed">
                Recreate a modern SaaS landing page with a hero section, feature cards, and pricing layout.
              </p>
</div>
</div>
<!-- Bottom Meta & Action Area -->
<div class="px-5 py-4 bg-surface-container/40 flex items-center justify-between mt-auto">
<span class="font-label-mono text-label-code-inline text-outline-variant">
              HTML/CSS • Flexbox • 150 XP
            </span>
<a class="inline-flex items-center gap-1 font-body-sm text-body-sm font-medium text-secondary group-hover:text-primary transition-colors" href="{{ route('challenges.show', ['challenge' => 'linear-saas']) }}">
<span>View Challenge</span>
<span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
</a>
</div>
</article>
<!-- CARD 2 -->
<article class="group relative flex flex-col justify-between bg-surface-container-low/80 backdrop-blur-xl rounded-2xl overflow-hidden shadow-lg transition-all duration-300 hover:shadow-[0_0_32px_rgba(77,142,255,0.2)] hover:-translate-y-1">
<div class="p-4 flex flex-col gap-4">
<!-- Screenshot Container -->
<div class="aspect-video w-full rounded-xl overflow-hidden relative bg-surface-container-lowest">
<img alt="E-commerce product detail page website UI mockup" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500" src="{{ asset('images/E_Commerce_Product_Page.jpg') }}"/>
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest/80 via-transparent to-transparent opacity-60"></div>
<!-- Floating Pill on preview -->
<div class="absolute top-3 left-3">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-surface-container-lowest/85 backdrop-blur-md text-[#fbbf24] font-caption-caps text-caption-caps uppercase tracking-wider font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-[#fbbf24]"></span>
                  Medium
                </span>
</div>
<div class="absolute top-3 right-3">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-surface-container-lowest/85 backdrop-blur-md text-tertiary font-label-mono text-label-code-inline font-medium">
                  +300 XP
                </span>
</div>
</div>
<!-- Card Meta & Content -->
<div class="flex flex-col gap-2">
<div class="flex items-center justify-between">
<span class="font-label-mono text-label-code-inline text-secondary font-medium">E-COMMERCE</span>
<span class="font-label-mono text-label-code-inline text-outline">~90 mins</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">
                02. E-Commerce Product Page
              </h3>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 leading-relaxed">
                Build a responsive product page featuring product images, product details, and purchase options.
              </p>
</div>
</div>
<!-- Bottom Meta & Action Area -->
<div class="px-5 py-4 bg-surface-container/40 flex items-center justify-between mt-auto">
<span class="font-label-mono text-label-code-inline text-outline-variant">
              State • Responsive Grid • 300 XP
            </span>
<a class="inline-flex items-center gap-1 font-body-sm text-body-sm font-medium text-secondary group-hover:text-primary transition-colors" href="{{ route('challenges.show', ['challenge' => 'linear-saas']) }}">
<span>View Challenge</span>
<span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
</a>
</div>
</article>
<!-- CARD 3 -->
<article class="group relative flex flex-col justify-between bg-surface-container-low/80 backdrop-blur-xl rounded-2xl overflow-hidden shadow-lg transition-all duration-300 hover:shadow-[0_0_32px_rgba(77,142,255,0.2)] hover:-translate-y-1">
<div class="p-4 flex flex-col gap-4">
<!-- Screenshot Container -->
<div class="aspect-video w-full rounded-xl overflow-hidden relative bg-surface-container-lowest">
<img alt="Sleek analytics dashboard web UI screen preview" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500" src="{{ asset('images/Admin_Dashboard.jpg') }}"/>
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest/80 via-transparent to-transparent opacity-60"></div>
<!-- Floating Pill on preview -->
<div class="absolute top-3 left-3">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-surface-container-lowest/85 backdrop-blur-md text-[#f87171] font-caption-caps text-caption-caps uppercase tracking-wider font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-[#f87171]"></span>
                  Hard
                </span>
</div>
<div class="absolute top-3 right-3">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-surface-container-lowest/85 backdrop-blur-md text-tertiary font-label-mono text-label-code-inline font-medium">
                  +500 XP
                </span>
</div>
</div>
<!-- Card Meta & Content -->
<div class="flex flex-col gap-2">
<div class="flex items-center justify-between">
<span class="font-label-mono text-label-code-inline text-secondary font-medium">DASHBOARD</span>
<span class="font-label-mono text-label-code-inline text-outline">~120 mins</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">
                03. Analytics Dashboard
              </h3>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 leading-relaxed">
                Recreate a professional analytics dashboard with charts, statistics, and sidebar navigation.
              </p>
</div>
</div>
<!-- Bottom Meta & Action Area -->
<div class="px-5 py-4 bg-surface-container/40 flex items-center justify-between mt-auto">
<span class="font-label-mono text-label-code-inline text-outline-variant">
              Data Viz • Complex Layout • 500 XP
            </span>
<a class="inline-flex items-center gap-1 font-body-sm text-body-sm font-medium text-secondary group-hover:text-primary transition-colors" href="{{ route('challenges.show', ['challenge' => 'linear-saas']) }}">
<span>View Challenge</span>
<span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
</a>
</div>
</article>
<!-- CARD 4 -->
<article class="group relative flex flex-col justify-between bg-surface-container-low/80 backdrop-blur-xl rounded-2xl overflow-hidden shadow-lg transition-all duration-300 hover:shadow-[0_0_32px_rgba(77,142,255,0.2)] hover:-translate-y-1">
<div class="p-4 flex flex-col gap-4">
<!-- Screenshot Container -->
<div class="aspect-video w-full rounded-xl overflow-hidden relative bg-surface-container-lowest">
<img alt="Modern creative developer portfolio website UI screenshot" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500" src="{{ asset('images/Responsive_Portfolio.jpg') }}"/>
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest/80 via-transparent to-transparent opacity-60"></div>
<!-- Floating Pill on preview -->
<div class="absolute top-3 left-3">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-surface-container-lowest/85 backdrop-blur-md text-[#34d399] font-caption-caps text-caption-caps uppercase tracking-wider font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-[#34d399]"></span>
                  Easy
                </span>
</div>
<div class="absolute top-3 right-3">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-surface-container-lowest/85 backdrop-blur-md text-tertiary font-label-mono text-label-code-inline font-medium">
                  +150 XP
                </span>
</div>
</div>
<!-- Card Meta & Content -->
<div class="flex flex-col gap-2">
<div class="flex items-center justify-between">
<span class="font-label-mono text-label-code-inline text-secondary font-medium">PORTFOLIO</span>
<span class="font-label-mono text-label-code-inline text-outline">~60 mins</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">
                04. Portfolio Website
              </h3>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 leading-relaxed">
                Build a modern developer portfolio with project showcases, about section, and contact information.
              </p>
</div>
</div>
<!-- Bottom Meta & Action Area -->
<div class="px-5 py-4 bg-surface-container/40 flex items-center justify-between mt-auto">
<span class="font-label-mono text-label-code-inline text-outline-variant">
              Typography • Animations • 150 XP
            </span>
<a class="inline-flex items-center gap-1 font-body-sm text-body-sm font-medium text-secondary group-hover:text-primary transition-colors" href="{{ route('challenges.show', ['challenge' => 'linear-saas']) }}">
<span>View Challenge</span>
<span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
</a>
</div>
</article>
<!-- CARD 5 -->
<article class="group relative flex flex-col justify-between bg-surface-container-low/80 backdrop-blur-xl rounded-2xl overflow-hidden shadow-lg transition-all duration-300 hover:shadow-[0_0_32px_rgba(77,142,255,0.2)] hover:-translate-y-1">
<div class="p-4 flex flex-col gap-4">
<!-- Screenshot Container -->
<div class="aspect-video w-full rounded-xl overflow-hidden relative bg-surface-container-lowest">
<img alt="Stylish modern culinary restaurant website UI screenshot" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500" src="{{ asset('images/Restaurant_Website.jpg') }}"/>
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest/80 via-transparent to-transparent opacity-60"></div>
<!-- Floating Pill on preview -->
<div class="absolute top-3 left-3">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-surface-container-lowest/85 backdrop-blur-md text-[#fbbf24] font-caption-caps text-caption-caps uppercase tracking-wider font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-[#fbbf24]"></span>
                  Medium
                </span>
</div>
<div class="absolute top-3 right-3">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-surface-container-lowest/85 backdrop-blur-md text-tertiary font-label-mono text-label-code-inline font-medium">
                  +300 XP
                </span>
</div>
</div>
<!-- Card Meta & Content -->
<div class="flex flex-col gap-2">
<div class="flex items-center justify-between">
<span class="font-label-mono text-label-code-inline text-secondary font-medium">LANDING PAGE</span>
<span class="font-label-mono text-label-code-inline text-outline">~75 mins</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">
                05. Restaurant Website
              </h3>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 leading-relaxed">
                Recreate a stylish restaurant website with a menu, hero section, and reservation interface.
              </p>
</div>
</div>
<!-- Bottom Meta & Action Area -->
<div class="px-5 py-4 bg-surface-container/40 flex items-center justify-between mt-auto">
<span class="font-label-mono text-label-code-inline text-outline-variant">
              Forms • Imagery • 300 XP
            </span>
<a class="inline-flex items-center gap-1 font-body-sm text-body-sm font-medium text-secondary group-hover:text-primary transition-colors" href="{{ route('challenges.show', ['challenge' => 'linear-saas']) }}">
<span>View Challenge</span>
<span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
</a>
</div>
</article>
<!-- CARD 6 -->
<article class="group relative flex flex-col justify-between bg-surface-container-low/80 backdrop-blur-xl rounded-2xl overflow-hidden shadow-lg transition-all duration-300 hover:shadow-[0_0_32px_rgba(77,142,255,0.2)] hover:-translate-y-1">
<div class="p-4 flex flex-col gap-4">
<!-- Screenshot Container -->
<div class="aspect-video w-full rounded-xl overflow-hidden relative bg-surface-container-lowest">
<img alt="Modern travel booking and adventure explorer website UI screenshot" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500" src="{{ asset('images/Modern_Login_Auth_Modal.jpg') }}"/>
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest/80 via-transparent to-transparent opacity-60"></div>
<!-- Floating Pill on preview -->
<div class="absolute top-3 left-3">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-surface-container-lowest/85 backdrop-blur-md text-[#f87171] font-caption-caps text-caption-caps uppercase tracking-wider font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-[#f87171]"></span>
                  Hard
                </span>
</div>
<div class="absolute top-3 right-3">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-surface-container-lowest/85 backdrop-blur-md text-tertiary font-label-mono text-label-code-inline font-medium">
                  +500 XP
                </span>
</div>
</div>
<!-- Card Meta & Content -->
<div class="flex flex-col gap-2">
<div class="flex items-center justify-between">
<span class="font-label-mono text-label-code-inline text-secondary font-medium">WEB APP</span>
<span class="font-label-mono text-label-code-inline text-outline">~110 mins</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">
                06. Travel Booking Website
              </h3>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 leading-relaxed">
                Build a travel website featuring destination cards, search filters, and booking details.
              </p>
</div>
</div>
<!-- Bottom Meta & Action Area -->
<div class="px-5 py-4 bg-surface-container/40 flex items-center justify-between mt-auto">
<span class="font-label-mono text-label-code-inline text-outline-variant">
              Filtering • Multi-Step • 500 XP
            </span>
<a class="inline-flex items-center gap-1 font-body-sm text-body-sm font-medium text-secondary group-hover:text-primary transition-colors" href="{{ route('challenges.show', ['challenge' => 'linear-saas']) }}">
<span>View Challenge</span>
<span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
</a>
</div>
</article>
</section>
<!-- Bottom Coach Spotlight Teaser -->
<section class="mt-8 p-6 md:p-8 rounded-2xl bg-surface-container-low/60 backdrop-blur-xl relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-6 shadow-md">
<div class="absolute top-0 right-0 w-80 h-80 bg-primary-container/10 blur-[90px] rounded-full pointer-events-none"></div>
<div class="flex items-start gap-4">
<div class="w-12 h-12 rounded-xl bg-surface-container-high flex items-center justify-center shadow-[0_0_18px_rgba(77,142,255,0.3)] shrink-0">
<span class="material-symbols-outlined text-primary text-[24px]">smart_toy</span>
</div>
<div class="flex flex-col gap-1 max-w-xl">
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm text-on-surface font-semibold">Real-Time AI Verification</span>
<span class="px-2 py-0.5 rounded-full bg-primary/10 text-primary font-label-mono text-label-code-inline">V2.4 Active</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">
              Every challenge runs inside our headless browser suite. Receive line-by-line DOM audits, responsive breakpoint tests, and accessibility feedback the second you save code.
            </p>
</div>
</div>
<div class="flex items-center gap-3 shrink-0 w-full md:w-auto">
<button class="w-full md:w-auto px-5 py-2.5 rounded-lg bg-surface-container-high hover:bg-surface-container font-body-md text-body-md text-on-surface transition-colors flex items-center justify-center gap-2" type="button">
<span class="material-symbols-outlined text-[18px]">play_circle</span>
<span>Watch 2-Min Demo</span>
</button>
<a class="w-full md:w-auto px-5 py-2.5 rounded-lg bg-gradient-to-b from-primary-container to-secondary-container text-on-primary-container font-body-md text-body-md font-medium shadow-[0_0_20px_-2px_rgba(59,130,246,0.35)] hover:shadow-[0_0_24px_rgba(59,130,246,0.5)] transition-all flex items-center justify-center gap-1" href="{{ route('challenges.show', ['challenge' => 'linear-saas']) }}">
<span>Quick Start</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</section>
</div>
</div>
<script>
    // Tab switching interactivity
    const tabButtons = document.querySelectorAll('.tab-btn');
    tabButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        tabButtons.forEach(b => {
          b.className = 'tab-btn px-4 py-2 rounded-lg font-body-sm text-body-sm font-medium transition-all text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high';
        });
        btn.className = 'tab-btn px-4 py-2 rounded-lg font-body-sm text-body-sm font-medium transition-all bg-primary-container text-on-primary-container shadow-[0_0_14px_rgba(77,142,255,0.3)]';
      });
    });
  </script>
</div>
@endsection

