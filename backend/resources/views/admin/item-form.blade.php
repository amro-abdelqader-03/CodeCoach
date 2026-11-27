@extends('layouts.admin')

@php($editing = isset($item))
@section('title', $editing ? 'Edit item' : 'Create item')
@section('page-heading', $editing ? 'Edit shop item' : 'Create shop item')

@section('content')
<div class="admin-page admin-page--narrow">
    <header class="admin-page-header">
        <div>
            <a class="inline-flex items-center gap-1 text-sm font-medium text-secondary hover:text-primary" href="{{ route('admin.items') }}"><span class="material-symbols-outlined text-base" aria-hidden="true">arrow_back</span>Back to shop items</a>
            <p class="admin-eyebrow mt-4">Rewards catalog</p>
            <h1 class="admin-page-heading">{{ $editing ? 'Edit shop item' : 'Create shop item' }}</h1>
            <p class="admin-page-description">Set the item type, price, and visibility in the learner store.</p>
        </div>
    </header>

    <form method="post" action="{{ $editing ? route('admin.items.update', $item) : route('admin.items.store') }}" enctype="multipart/form-data" class="admin-panel admin-form-card">
        @csrf
        @if ($editing) @method('PUT') @endif

        <div class="admin-form-grid">
            <label class="admin-form-field admin-form-field--wide">
                <span class="admin-form-label">Item name</span>
                <input class="form-control" name="name" value="{{ old('name', $item->name ?? '') }}" maxlength="255" required>
                @error('name')<span class="form-error">{{ $message }}</span>@enderror
            </label>
            <label class="admin-form-field">
                <span class="admin-form-label">Type</span>
                <select class="form-control" name="type" required>
                    @foreach (['sticker', 'avatar'] as $type)
                        <option value="{{ $type }}" @selected(old('type', $item->type ?? 'sticker') === $type)>{{ ucfirst($type) }}</option>
                    @endforeach
                </select>
                @error('type')<span class="form-error">{{ $message }}</span>@enderror
            </label>
            <label class="admin-form-field">
                <span class="admin-form-label">Cost currency</span>
                <select class="form-control" name="currency" required>
                    @foreach (['coins', 'xp'] as $currency)
                        <option value="{{ $currency }}" @selected(old('currency', $item->currency ?? 'coins') === $currency)>{{ strtoupper($currency) }}</option>
                    @endforeach
                </select>
                @error('currency')<span class="form-error">{{ $message }}</span>@enderror
            </label>
            <label class="admin-form-field">
                <span class="admin-form-label">Price</span>
                <input class="form-control" type="number" min="0" step="1" name="price" value="{{ old('price', $item->price ?? 0) }}" required>
                @error('price')<span class="form-error">{{ $message }}</span>@enderror
            </label>
            <label class="admin-form-field admin-form-field--wide">
                <span class="admin-form-label">Item image {{ $editing ? '(optional)' : '' }}</span>
                <input class="form-control" type="file" name="image" accept="image/png,image/jpeg,image/webp" {{ $editing ? '' : 'required' }}>
                <span class="form-help">PNG, JPG, or WEBP. Maximum 4 MB. {{ $editing ? 'Leave empty to keep the current image.' : '' }}</span>
                @error('image')<span class="form-error">{{ $message }}</span>@enderror
            </label>
            @if ($editing)
                <div class="admin-form-field admin-form-field--wide"><span class="admin-form-label">Current image</span><img src="{{ asset('storage/'.$item->image) }}" alt="Current image for {{ $item->name }}" class="h-28 w-28 rounded-xl border border-white/10 object-cover"></div>
            @endif
            <label class="form-check-row admin-form-field--wide rounded-xl border border-white/10 bg-surface-container/60 p-4">
                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $item->is_active ?? true))>
                <span><span class="block font-medium">Available in the shop</span><span class="mt-1 block text-xs text-on-surface-variant">Hide this item from learners while keeping it in the catalog.</span></span>
            </label>
        </div>

        <div class="admin-form-actions">
            <button class="admin-button admin-button--primary" type="submit"><span class="material-symbols-outlined text-lg" aria-hidden="true">save</span>{{ $editing ? 'Save changes' : 'Create item' }}</button>
            <a class="admin-link-button admin-link-button--secondary" href="{{ route('admin.items') }}">Cancel</a>
        </div>
    </form>
</div>
@endsection
