@extends('layouts.app')

@section('title', 'Challenge Details')

@section('content')
<div class="flex flex-col w-full">
<div class="relative w-full overflow-hidden bg-surface py-8 lg:py-12">
<!-- Atmospheric Ambient Glows -->
<div class="pointer-events-none absolute -top-40 left-1/2 -translate-x-1/2 w-[720px] h-[340px] bg-primary-container/10 blur-[130px] rounded-full"></div>
<div class="pointer-events-none absolute top-96 right-10 w-[420px] h-[260px] bg-secondary/5 blur-[120px] rounded-full"></div>
<div class="relative max-w-6xl mx-auto px-6 lg:px-8 flex flex-col gap-10">
<!-- Breadcrumbs & Quick Back -->
<div class="flex items-center justify-between gap-4">
<a class="group inline-flex items-center gap-2 font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" data-path="challenges" href="{{ route('challenges.index') }}">
<span class="material-symbols-outlined text-[16px] transition-transform group-hover:-translate-x-1">arrow_back</span>
<span>Back to Challenges</span>
</a>
<div class="flex items-center gap-2">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-mono text-[11px]">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
            CHALLENGE #084
          </span>
</div>
</div>
<!-- Challenge Header & Key Metadata -->
<div class="flex flex-col gap-4">
<div class="flex flex-wrap items-center gap-2.5">
<!-- Difficulty Token -->
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-500/10 text-amber-300 font-label-mono text-[12px] shadow-[0_0_12px_rgba(245,158,11,0.15)]">
<span class="w-2 h-2 rounded-full bg-amber-400"></span>
            Medium
          </span>
<!-- XP Reward Token -->
<span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-primary-container/15 text-primary font-label-mono text-[12px] shadow-[0_0_12px_rgba(77,142,255,0.2)]">
<span class="material-symbols-outlined text-[14px]">bolt</span>
            +300 XP
          </span>
<!-- Est. Time -->
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[15px] text-outline">schedule</span>
            2 - 3 Hours
          </span>
<!-- Stack Tags -->
<div class="flex items-center gap-1.5 ml-auto">
<span class="px-2.5 py-1 rounded-md bg-surface-container-low text-on-surface-variant font-label-code-inline text-label-code-inline">React</span>
<span class="px-2.5 py-1 rounded-md bg-surface-container-low text-on-surface-variant font-label-code-inline text-label-code-inline">Tailwind CSS</span>
<span class="px-2.5 py-1 rounded-md bg-surface-container-low text-on-surface-variant font-label-code-inline text-label-code-inline">Responsive</span>
</div>
</div>
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-4">
<div class="flex flex-col gap-2">
<h1 class="font-headline-xl text-headline-xl text-on-surface font-semibold tracking-tight">
              Linear Minimalist SaaS Landing Page
            </h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-3xl leading-relaxed">
              Construct a production-ready dark software landing page featuring glowing gradients, floating application mockups, high-contrast typography, and responsive metric cards.
            </p>
</div>
<div class="flex items-center gap-3 shrink-0">
<a class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-surface-container-high hover:bg-surface-container-highest text-on-surface font-body-md text-body-md transition-all" href="https://synthesis.dev" rel="noopener noreferrer" target="_blank">
<span>View Live Target</span>
<span class="material-symbols-outlined text-[16px]">open_in_new</span>
</a>
<button class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-surface-container-high hover:bg-surface-container-highest text-on-surface-variant hover:text-on-surface font-body-md text-body-md transition-all" type="button">
<span class="material-symbols-outlined text-[18px]">bookmark_border</span>
<span>Save</span>
</button>
</div>
</div>
</div>
<!-- Main Visual Showcase (Browser Window Preview) -->
<div class="relative w-full rounded-2xl bg-surface-container-lowest shadow-[0_24px_60px_-15px_rgba(0,0,0,0.85),0_0_30px_rgba(77,142,255,0.08)] overflow-hidden">
<!-- Mock Browser Chrome Header -->
<div class="flex items-center justify-between px-4 py-3 bg-surface-container-low">
<!-- Window Controls Dots -->
<div class="flex items-center gap-2">
<span class="w-3 h-3 rounded-full bg-[#ef4444]/80"></span>
<span class="w-3 h-3 rounded-full bg-[#f59e0b]/80"></span>
<span class="w-3 h-3 rounded-full bg-[#10b981]/80"></span>
</div>
<!-- Mock Address Bar -->
<div class="flex items-center gap-2 px-3 py-1 rounded-md bg-surface-container text-outline font-label-mono text-[11px] w-full max-w-md mx-4 justify-center">
<span class="material-symbols-outlined text-[13px] text-secondary">lock</span>
<span class="text-on-surface-variant truncate">https://preview.smartcoach.dev/targets/synthesis-landing</span>
</div>
<!-- Preview Zoom / Fullscreen -->
<div class="flex items-center gap-1 text-outline">
<a class="p-1 rounded hover:text-on-surface hover:bg-surface-container transition-colors" href="https://lh3.googleusercontent.com/aida/ALJJyrA54ZKMsFQX7DvDGEKG7U0ejCFKchZWE18kB5LFaND5b-UTwRA6USZ_0-r2jwwjAWRLzI5OzgPCkZMq2mQWZHwcdw38ms6lTNlYoD9b0ma5swQZnzdMn9YH3cJgCQi7GOSfX2Y5C3CYthygTtAwOCxX1Eg9Cm9S3M-p2aPv3UPwN2YD44sOEcTAjm1eRCl0sDJrB53e4VCHrnMQREABdeyhmBelVhEKicwZ5VaC74prbw" target="_blank" title="Open Full Screen Screenshot">
<span class="material-symbols-outlined text-[16px]">fullscreen</span>
</a>
</div>
</div>
<!-- Target Screenshot Container -->
<div class="relative w-full bg-surface-container-lowest group">
<img alt="Reference layout screenshot showcasing a sleek dark mode SaaS hero section, floating dashboard mockup, key metric cards, and 2x2 grid of feature pillars" class="w-full h-auto object-cover object-top select-none transition-transform duration-500 ease-out group-hover:scale-[1.006]" src="{{ asset('images/SaaS_Landing_Page.jpg') }}"/>
<div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-surface-container-lowest to-transparent pointer-events-none"></div>
<div class="absolute bottom-4 right-4 flex items-center gap-2 px-3 py-1.5 rounded-lg bg-surface-container-lowest/80 backdrop-blur-md shadow-lg">
<span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
<span class="font-label-mono text-label-code-inline text-on-surface-variant">Reference Spec v1.4</span>
</div>
</div>
</div>
<!-- Task Information & Specifications Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
<!-- Left: Requirements & Guidance (7 Cols) -->
<div class="lg:col-span-7 flex flex-col gap-6">
<div class="rounded-xl bg-surface-container-low p-6 flex flex-col gap-4 shadow-sm">
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-primary text-[20px]">assignment</span>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Challenge Scope &amp; Objective</h2>
</div>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
              Replicate this modern high-converting SaaS landing page. The composition features a bold typographic header, dual action CTA buttons with cyan-indigo gradients, a floating app preview mockup with subtle tilt perspective, a four-column statistics bar, and a core capabilities card grid.
            </p>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
              Ensure proper structural hierarchy, smooth micro-interactions, and flawless fluidity from wide desktops down to narrow mobile viewports.
            </p>
</div>
<!-- Key Deliverables Checklist -->
<div class="rounded-xl bg-surface-container-low p-6 flex flex-col gap-4 shadow-sm">
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-secondary text-[20px]">task_alt</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Key Acceptance Criteria</h3>
</div>
<ul class="flex flex-col gap-3 font-body-md text-body-md text-on-surface-variant">
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-[18px] mt-0.5 shrink-0">check_circle</span>
<span><strong class="text-on-surface font-medium">Hero &amp; Floating Canvas:</strong> Implement the gradient glow background, primary CTA button with specular inner bevel, and the multi-layered dashboard preview mock.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-[18px] mt-0.5 shrink-0">check_circle</span>
<span><strong class="text-on-surface font-medium">Stats Row Layout:</strong> 4-column balanced metrics row (<code class="font-label-code-inline text-secondary text-label-code-inline">150%</code>, <code class="font-label-code-inline text-secondary text-label-code-inline">99.99%</code>, <code class="font-label-code-inline text-secondary text-label-code-inline">50k+</code>, <code class="font-label-code-inline text-secondary text-label-code-inline">24/7</code>) gracefully wrapping on mobile devices.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-[18px] mt-0.5 shrink-0">check_circle</span>
<span><strong class="text-on-surface font-medium">Feature Cards Grid:</strong> 2x2 modular matrix with icon pills, subtle card background differentiation, and refined typography hierarchy.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-[18px] mt-0.5 shrink-0">check_circle</span>
<span><strong class="text-on-surface font-medium">Luminescent Styling:</strong> Clean dark surfaces without heavy generic borders, using background-level luminance contrast and soft glows.</span>
</li>
</ul>
</div>
<!-- Provided Assets Notice -->
<div class="flex items-center justify-between p-4 rounded-xl bg-surface-container-high/60">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-outline text-[22px]">folder_zip</span>
<div class="flex flex-col">
<span class="font-body-md text-body-md text-on-surface font-medium">Starter Code Kit &amp; Assets</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Figma frames, SVG icons, and dummy JSON responses</span>
</div>
</div>
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container hover:bg-surface-bright text-on-surface text-body-sm font-medium transition-colors" type="button">
<span class="material-symbols-outlined text-[16px]">download</span>
<span>Download (.zip)</span>
</button>
</div>
</div>
<!-- Right: Submission Panel (5 Cols) -->
<div class="lg:col-span-5 flex flex-col gap-4">
<div class="sticky top-24 rounded-2xl bg-surface-container-low p-6 flex flex-col gap-6 shadow-xl shadow-black/40">
<div class="flex flex-col gap-1.5">
<div class="flex items-center justify-between">
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Submit Your Solution</h3>
<span class="inline-flex items-center gap-1 text-[11px] font-label-mono text-secondary px-2 py-0.5 rounded-full bg-secondary/10">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                  AI Review Ready
                </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                Submit code or your deployed URL to initiate automatic visual diff rendering and code AST analysis.
              </p>
</div>
<!-- Option A: File Upload Zone -->
<div class="flex flex-col gap-2">
<label class="font-caption-caps text-caption-caps uppercase tracking-wider text-outline">Option A — Code Archive</label>
<div class="relative group flex flex-col items-center justify-center p-6 rounded-xl bg-surface-container-lowest hover:bg-surface-container-high/40 transition-all cursor-pointer text-center" id="drop-zone">
<input accept=".zip,.tar,.html,.css,.js" class="absolute inset-0 opacity-0 cursor-pointer w-full h-full" id="file-input" type="file"/>
<div class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-primary group-hover:scale-110 group-hover:text-secondary transition-all mb-2 shadow-inner">
<span class="material-symbols-outlined text-[22px]">cloud_upload</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface font-medium group-hover:text-primary transition-colors" id="file-label">
                  Drop your ZIP or bundle here
                </span>
<span class="font-label-code-inline text-[11px] text-outline mt-1">
                  Supports .zip, .tar, .html, .css, .js (up to 25MB)
                </span>
</div>
</div>
<!-- Divider -->
<div class="relative flex items-center justify-center">
<div class="absolute inset-0 flex items-center">
<div class="w-full bg-surface-container-highest/60 h-[1px]"></div>
</div>
<span class="relative px-3 bg-surface-container-low font-label-mono text-[11px] uppercase tracking-wider text-outline">
                OR
              </span>
</div>
<!-- Option B: Deployment / Repo URL -->
<div class="flex flex-col gap-2">
<label class="font-caption-caps text-caption-caps uppercase tracking-wider text-outline" for="submission-url">
                Option B — Live URL / GitHub Repository
              </label>
<div class="relative flex items-center">
<span class="absolute left-3 material-symbols-outlined text-outline text-[18px]">link</span>
<input class="w-full pl-9 pr-3 py-2.5 rounded-lg bg-surface-container-lowest text-on-surface font-body-sm text-body-sm placeholder:text-outline/60 focus:outline-none focus:ring-1 focus:ring-primary shadow-inner transition-all" id="submission-url" placeholder="https://your-solution.vercel.app or GitHub repo" type="url"/>
</div>
</div>
<!-- Validation Note / Hints -->
<div class="flex items-center gap-2 p-3 rounded-lg bg-surface-container-lowest text-[11px] text-on-surface-variant font-body-sm">
<span class="material-symbols-outlined text-[16px] text-primary shrink-0">auto_awesome</span>
<span>Our AI coach will test your build against Chromium 124, 3 viewport sizes, and evaluate CSS layout fidelity.</span>
</div>
<!-- Action Button -->
<button class="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-lg bg-gradient-to-b from-primary-container to-secondary-container text-on-primary-container font-headline-sm text-body-lg font-semibold shadow-[0_0_24px_rgba(77,142,255,0.35)] hover:shadow-[0_0_32px_rgba(77,142,255,0.55)] transition-all active:scale-[0.99]" id="submit-cta" type="button">
<span>Submit Challenge</span>
<span class="text-sm">✦</span>
</button>
<!-- Status Indicator -->
<div class="hidden text-center text-body-sm font-label-mono text-secondary" id="submit-feedback">
              Evaluating test suite in sandbox...
            </div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
  (function () {
    const fileInput = document.getElementById('file-input');
    const fileLabel = document.getElementById('file-label');
    const urlInput = document.getElementById('submission-url');
    const submitBtn = document.getElementById('submit-cta');
    const feedback = document.getElementById('submit-feedback');

    if (fileInput && fileLabel) {
      fileInput.addEventListener('change', function (e) {
        if (this.files && this.files.length > 0) {
          fileLabel.textContent = this.files[0].name;
          fileLabel.classList.add('text-secondary');
        }
      });
    }

    if (submitBtn) {
      submitBtn.addEventListener('click', function () {
        const hasFile = fileInput && fileInput.files && fileInput.files.length > 0;
        const hasUrl = urlInput && urlInput.value.trim().length > 0;

        if (!hasFile && !hasUrl) {
          alert('Please attach your code bundle or provide a live preview URL to submit.');
          return;
        }

        submitBtn.disabled = true;
        submitBtn.classList.add('opacity-70', 'cursor-not-allowed');
        submitBtn.innerHTML = '<span>Processing Submission...</span>';

        if (feedback) {
          feedback.classList.remove('hidden');
        }

        setTimeout(() => {
          submitBtn.innerHTML = '<span class="material-symbols-outlined text-[18px]">done</span><span>Submitted for AI Evaluation!</span>';
          submitBtn.classList.remove('from-primary-container', 'to-secondary-container');
          submitBtn.classList.add('bg-emerald-500', 'text-black');
          if (feedback) {
            feedback.textContent = 'AST & Visual Diff queued. Redirecting to review...';
          }
        }, 1500);
      });
    }
  })();
</script>
@endsection

