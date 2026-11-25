@extends('layouts.admin')

@section('title', 'Challenges')
@section('page-heading', 'Challenge Library')

@section('content')
<div class="mx-auto w-full max-w-[1720px] space-y-6 px-4 py-6 sm:px-6 lg:px-8">
    <section class="flex flex-col justify-between gap-4 rounded-xl bg-surface-container-low p-6 sm:flex-row sm:items-center">
        <div><p class="mb-2 text-xs font-semibold uppercase tracking-wider text-secondary">Learning catalog</p><h1 class="font-headline-xl text-headline-xl font-semibold">Challenges</h1><p class="mt-1 text-on-surface-variant">Review, publish, and organize the practice library.</p></div>
        <a href="{{ route('challenges.create') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-gradient-to-r from-primary-container to-inverse-primary px-4 py-2.5 font-medium text-on-primary"><span class="material-symbols-outlined text-[18px]">add</span>Create challenge</a>
    </section>
    <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        @foreach ([['148','Total challenges','code_blocks'],['126','Published','check_circle'],['12','In review','rate_review'],['10','Drafts','edit_note']] as [$value,$label,$icon])
            <div class="rounded-xl bg-surface-container-low p-5"><div class="flex items-center justify-between text-sm text-on-surface-variant"><span>{{ $label }}</span><span class="material-symbols-outlined text-secondary">{{ $icon }}</span></div><p class="mt-3 font-headline-xl text-headline-xl font-semibold">{{ $value }}</p></div>
        @endforeach
    </section>
    <section class="overflow-hidden rounded-xl bg-surface-container-low">
        <div class="flex flex-col gap-3 border-b border-white/5 p-5 lg:flex-row lg:items-center lg:justify-between"><div><h2 class="font-headline-sm text-headline-sm font-semibold">Challenge library</h2><p class="mt-1 text-sm text-on-surface-variant">Content status, difficulty, and engagement</p></div><div class="flex flex-wrap gap-2"><input class="rounded-lg bg-surface-container-lowest px-3 py-2 text-sm placeholder:text-outline focus:outline-none focus:ring-1 focus:ring-secondary" type="search" placeholder="Search challenges" aria-label="Search challenges"><select class="rounded-lg bg-surface-container-lowest px-3 py-2 text-sm text-on-surface-variant"><option>All categories</option><option>Landing pages</option><option>Dashboards</option></select></div></div>
        <div class="overflow-x-auto"><table class="w-full min-w-[760px] text-left text-sm"><thead class="bg-surface-container-lowest/60 text-xs uppercase tracking-wider text-on-surface-variant"><tr><th class="px-5 py-3">Challenge</th><th class="px-4 py-3">Category</th><th class="px-4 py-3">Difficulty</th><th class="px-4 py-3">Submissions</th><th class="px-4 py-3">Updated</th><th class="px-5 py-3 text-right">Status</th></tr></thead><tbody class="divide-y divide-white/5">
            @foreach ([['Linear SaaS Landing Page','Landing page','Medium','2,481','Today','Published'],['E-Commerce Product Page','E-commerce','Medium','1,920','Yesterday','Published'],['Analytics Dashboard','Dashboard','Hard','1,102','Mar 18','In review'],['Developer Portfolio','Portfolio','Easy','3,870','Mar 17','Published'],['Travel Booking Website','Web app','Hard','284','Mar 15','Draft']] as [$name,$category,$difficulty,$submissions,$updated,$status])
                <tr class="hover:bg-surface-container-high/40"><td class="px-5 py-4 font-medium">{{ $name }}</td><td class="px-4 py-4 text-on-surface-variant">{{ $category }}</td><td class="px-4 py-4">{{ $difficulty }}</td><td class="px-4 py-4 font-label-mono text-secondary">{{ $submissions }}</td><td class="px-4 py-4 text-on-surface-variant">{{ $updated }}</td><td class="px-5 py-4 text-right"><span class="rounded-full bg-primary-container/15 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-wide text-primary">{{ $status }}</span></td></tr>
            @endforeach
        </tbody></table></div>
        <div class="flex items-center justify-between border-t border-white/5 px-5 py-4 text-sm text-on-surface-variant"><span>Showing 5 of 148 challenges</span><div class="flex gap-2"><button class="rounded bg-surface-container-high px-3 py-1.5">Previous</button><button class="rounded bg-surface-container-high px-3 py-1.5 text-on-surface">Next</button></div></div>
    </section>
</div>
@endsection
