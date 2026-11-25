@extends('layouts.admin')

@section('title', 'Users')
@section('page-heading', 'User Management')

@section('content')
<div class="mx-auto w-full max-w-[1720px] space-y-6 px-4 py-6 sm:px-6 lg:px-8">
    <section class="flex flex-col justify-between gap-4 rounded-xl bg-surface-container-low p-6 sm:flex-row sm:items-center">
        <div><p class="mb-2 text-xs font-semibold uppercase tracking-wider text-secondary">Community</p><h1 class="font-headline-xl text-headline-xl font-semibold">Users</h1><p class="mt-1 text-on-surface-variant">Manage member accounts, verification, and access.</p></div>
        <button class="inline-flex items-center justify-center gap-2 rounded-lg bg-gradient-to-r from-primary-container to-inverse-primary px-4 py-2.5 font-medium text-on-primary"><span class="material-symbols-outlined text-[18px]">person_add</span>Invite user</button>
    </section>
    <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        @foreach ([['24,850','Total users','group'],['8,920','Active this month','bolt'],['1,420','Joined this month','person_add'],['96.8%','Verified accounts','verified']] as [$value,$label,$icon])
            <div class="rounded-xl bg-surface-container-low p-5"><div class="flex items-center justify-between text-sm text-on-surface-variant"><span>{{ $label }}</span><span class="material-symbols-outlined text-secondary">{{ $icon }}</span></div><p class="mt-3 font-headline-xl text-headline-xl font-semibold">{{ $value }}</p></div>
        @endforeach
    </section>
    <section class="overflow-hidden rounded-xl bg-surface-container-low">
        <div class="flex flex-col gap-3 border-b border-white/5 p-5 lg:flex-row lg:items-center lg:justify-between">
            <div><h2 class="font-headline-sm text-headline-sm font-semibold">All members</h2><p class="mt-1 text-sm text-on-surface-variant">Latest account activity and learning progress</p></div>
            <div class="flex flex-wrap gap-2"><input class="rounded-lg bg-surface-container-lowest px-3 py-2 text-sm placeholder:text-outline focus:outline-none focus:ring-1 focus:ring-secondary" type="search" placeholder="Search name or email" aria-label="Search users"><select class="rounded-lg bg-surface-container-lowest px-3 py-2 text-sm text-on-surface-variant"><option>All statuses</option><option>Active</option><option>Pending</option></select><button class="rounded-lg bg-surface-container-high px-3 py-2 text-sm">Filter</button></div>
        </div>
        <div class="overflow-x-auto"><table class="w-full min-w-[760px] text-left text-sm">
            <thead class="bg-surface-container-lowest/60 text-xs uppercase tracking-wider text-on-surface-variant"><tr><th class="px-5 py-3">Member</th><th class="px-4 py-3">Email</th><th class="px-4 py-3">Level</th><th class="px-4 py-3">Points</th><th class="px-4 py-3">Joined</th><th class="px-5 py-3 text-right">Status</th></tr></thead>
            <tbody class="divide-y divide-white/5">
                @foreach ([['AC','Alex Chen','alex.chen@devmail.io','14','1,820','Mar 18, 2025','Active'],['SL','Sarah Lin','sarah.lin@techteam.co','11','940','Mar 17, 2025','Active'],['JL','Jordan Lee','j.lee@frontend.org','8','520','Mar 16, 2025','Active'],['MP','Maya Patel','maya.p@cloudlabs.net','4','180','Mar 15, 2025','Pending'],['LO','Liam O’Connor','liam@dublincode.eu','16','3,450','Mar 14, 2025','Active']] as [$initials,$name,$email,$level,$points,$joined,$status])
                    <tr class="hover:bg-surface-container-high/40"><td class="whitespace-nowrap px-5 py-4"><div class="flex items-center gap-3"><span class="flex h-9 w-9 items-center justify-center rounded-full bg-primary-container/30 font-semibold text-primary">{{ $initials }}</span><span class="font-medium">{{ $name }}</span></div></td><td class="px-4 py-4 text-on-surface-variant">{{ $email }}</td><td class="px-4 py-4">L{{ $level }}</td><td class="px-4 py-4 font-label-mono text-secondary">{{ $points }} pts</td><td class="px-4 py-4 text-on-surface-variant">{{ $joined }}</td><td class="px-5 py-4 text-right"><span @class(['rounded-full px-2.5 py-1 text-[10px] font-semibold uppercase tracking-wide', 'bg-secondary/10 text-secondary' => $status === 'Active', 'bg-amber-400/10 text-amber-300' => $status === 'Pending'])>{{ $status }}</span></td></tr>
                @endforeach
            </tbody>
        </table></div>
        <div class="flex items-center justify-between border-t border-white/5 px-5 py-4 text-sm text-on-surface-variant"><span>Showing 5 of 24,850 members</span><div class="flex gap-2"><button class="rounded bg-surface-container-high px-3 py-1.5">Previous</button><button class="rounded bg-surface-container-high px-3 py-1.5 text-on-surface">Next</button></div></div>
    </section>
</div>
@endsection
