@extends('layouts.admin')

@section('title', 'Shop items')
@section('page-heading', 'Shop items')

@section('content')
<div class="admin-page">
    <header class="admin-page-header">
        <div>
            <p class="admin-eyebrow">Rewards catalog</p>
            <h1 class="admin-page-heading">Shop items</h1>
            <p class="admin-page-description">Manage the stickers and avatars learners can unlock.</p>
        </div>
        <a class="admin-link-button admin-link-button--primary" href="{{ route('admin.items.create') }}">
            <span class="material-symbols-outlined text-lg" aria-hidden="true">add</span>
            Create item
        </a>
    </header>

    <section class="admin-panel" aria-labelledby="items-table-heading">
        <div class="admin-panel-header">
            <div>
                <h2 id="items-table-heading" class="admin-panel-title">Store catalog</h2>
                <p class="admin-panel-copy">{{ $items->total() }} reward items</p>
            </div>
        </div>
        <div class="admin-table-scroll">
            <table class="admin-table min-w-[780px]">
                <thead><tr><th>Item</th><th>Type</th><th>Cost</th><th>Availability</th><th>Actions</th></tr></thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td><div class="flex min-w-44 items-center gap-3"><img src="{{ asset('storage/'.$item->image) }}" alt="" class="h-11 w-11 shrink-0 rounded-lg object-cover"><span><span class="block font-medium">{{ $item->name }}</span><span class="mt-1 block text-xs text-on-surface-variant">Added {{ $item->created_at->format('M j, Y') }}</span></span></div></td>
                            <td><span class="admin-badge">{{ ucfirst($item->type) }}</span></td>
                            <td class="font-label-mono">{{ number_format($item->price) }} {{ strtoupper($item->currency) }}</td>
                            <td><span class="admin-badge {{ $item->is_active ? 'admin-badge--accent' : '' }}">{{ $item->is_active ? 'Available' : 'Hidden' }}</span></td>
                            <td>
                                <div class="admin-actions">
                                    <a class="admin-link-button admin-link-button--secondary admin-link-button--small" href="{{ route('admin.items.show', $item) }}">View</a>
                                    <a class="admin-link-button admin-link-button--secondary admin-link-button--small" href="{{ route('admin.items.edit', $item) }}">Edit</a>
                                    <form class="admin-inline-form" method="post" action="{{ route('admin.items.destroy', $item) }}" onsubmit="return confirm('Delete this shop item?')">
                                        @csrf @method('DELETE')
                                        <button class="admin-button admin-button--danger admin-button--small" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="admin-empty">No shop items yet. Add the first reward to the catalog.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($items->hasPages())<div class="border-t border-white/10 px-5 py-4">{{ $items->links() }}</div>@endif
    </section>
</div>
@endsection
