@extends('layouts.admin')

@php($editing = isset($challenge))
@section('title', $editing ? 'Edit challenge' : 'Create challenge')
@section('page-heading', $editing ? 'Edit challenge' : 'Create challenge')

@section('content')
<div class="admin-page admin-page--narrow">
    <header class="admin-page-header">
        <div>
            <a class="inline-flex items-center gap-1 text-sm font-medium text-secondary hover:text-primary" href="{{ route('admin.challenges') }}"><span class="material-symbols-outlined text-base" aria-hidden="true">arrow_back</span>Back to challenges</a>
            <p class="admin-eyebrow mt-4">Learning library</p>
            <h1 class="admin-page-heading">{{ $editing ? 'Edit challenge' : 'Create challenge' }}</h1>
            <p class="admin-page-description">{{ $editing ? 'Update the challenge brief, owner, and tasks.' : 'Add a clear frontend project and three guided tasks.' }}</p>
        </div>
    </header>

    <form id="admin-generation-form" method="post" action="{{ route('challenges.generate') }}" class="admin-panel admin-form-card" data-endpoint="{{ route('challenges.generate') }}">
        @csrf
        <div class="mb-4 flex items-start gap-3">
            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-primary-container/15 text-secondary"><span class="material-symbols-outlined" aria-hidden="true">auto_awesome</span></span>
            <div><p class="admin-eyebrow">Local Ollama generator</p><h2 class="mt-1 text-lg font-semibold">Start from a website</h2><p class="mt-1 text-sm text-on-surface-variant">Generate from a public URL. Screenshots need an Ollama vision model configured on the server.</p></div>
        </div>
        <div class="admin-form-grid">
            <label class="admin-form-field">
                <span class="admin-form-label">Public website URL</span>
                <input class="form-control" id="admin-generation-url" type="url" inputmode="url" placeholder="https://example.com">
            </label>
            <label class="admin-form-field">
                <span class="admin-form-label">Screenshots</span>
                <input class="form-control" id="admin-generation-screenshots" type="file" accept="image/png,image/jpeg,image/webp" multiple>
                <span class="form-help">Up to three PNG, JPG, or WEBP images, 2 MB each.</span>
            </label>
            <div class="admin-form-field admin-form-field--wide flex flex-wrap items-center gap-3">
                <button class="admin-button admin-button--secondary" id="admin-generate-button" type="submit"><span class="material-symbols-outlined text-lg" aria-hidden="true">auto_awesome</span>Generate draft</button>
                <p id="admin-generation-message" class="hidden text-sm" role="status" aria-live="polite"></p>
            </div>
        </div>
    </form>

    <form method="post" action="{{ $editing ? route('admin.challenges.update', $challenge) : route('admin.challenges.store') }}" enctype="multipart/form-data" class="admin-panel admin-form-card">
        @csrf
        @if ($editing) @method('PUT') @endif

        <section class="admin-form-section">
            <h2 class="admin-form-section-heading">Challenge brief</h2>
            <p class="admin-form-section-copy">Describe what learners should build and how they can tell when it is complete.</p>
            <div class="admin-form-grid">
                <label class="admin-form-field admin-form-field--wide">
                    <span class="admin-form-label">Title</span>
                    <input class="form-control" id="admin-challenge-title" name="title" value="{{ old('title', $challenge->title ?? '') }}" maxlength="255" required>
                    @error('title')<span class="form-error">{{ $message }}</span>@enderror
                </label>
                <label class="admin-form-field admin-form-field--wide">
                    <span class="admin-form-label">Description</span>
                    <textarea class="form-control" id="admin-challenge-description" name="description" rows="5" required>{{ old('description', $challenge->description ?? '') }}</textarea>
                    @error('description')<span class="form-error">{{ $message }}</span>@enderror
                </label>
                <label class="admin-form-field">
                    <span class="admin-form-label">Difficulty</span>
                    <select class="form-control" id="admin-challenge-difficulty" name="difficulty" required>
                        @foreach (['easy', 'medium', 'hard'] as $level)
                            <option value="{{ $level }}" @selected(old('difficulty', $challenge->difficulty ?? 'medium') === $level)>{{ ucfirst($level) }}</option>
                        @endforeach
                    </select>
                    @error('difficulty')<span class="form-error">{{ $message }}</span>@enderror
                </label>
                <label class="admin-form-field">
                    <span class="admin-form-label">Owner</span>
                    <select class="form-control" name="user_id">
                        <option value="">Unassigned</option>
                        @foreach ($users as $owner)
                            <option value="{{ $owner->id }}" @selected((string) old('user_id', $challenge->user_id ?? '') === (string) $owner->id)>{{ $owner->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')<span class="form-error">{{ $message }}</span>@enderror
                </label>
                <label class="admin-form-field admin-form-field--wide">
                    <span class="admin-form-label">Cover image</span>
                    <input class="form-control" id="admin-challenge-image" type="file" name="image" accept="image/png,image/jpeg,image/webp">
                    <span class="form-help">PNG, JPG, or WEBP. Maximum 4 MB. Leave empty to keep the current image.</span>
                    @error('image')<span class="form-error">{{ $message }}</span>@enderror
                </label>
                <div id="admin-generated-cover-preview" class="admin-form-field admin-form-field--wide hidden"><span class="admin-form-label">AI generated cover preview</span><img class="max-h-56 w-full rounded-xl border border-white/10 object-cover" alt="Generated challenge cover preview"></div>
                @if ($editing && $challenge->image)
                    <div class="admin-form-field admin-form-field--wide"><span class="admin-form-label">Current image</span><img src="{{ asset('storage/'.$challenge->image) }}" alt="Current cover image for {{ $challenge->title }}" class="max-h-48 w-fit rounded-xl border border-white/10 object-cover"></div>
                @endif
            </div>
        </section>

        <section class="admin-form-section">
            <h2 class="admin-form-section-heading">Learning tasks</h2>
            <p class="admin-form-section-copy">Add three steps in the order learners should complete them.</p>
            <div class="grid gap-3">
                @for ($index = 0; $index < 3; $index++)
                    @php($task = $editing ? ($challenge->tasks[$index] ?? null) : null)
                    <fieldset class="generator-task grid gap-3">
                        <legend class="px-1 text-sm font-semibold text-secondary">Task {{ $index + 1 }}</legend>
                        <label class="admin-form-field">
                            <span class="admin-form-label">Description</span>
                            <textarea class="form-control" id="admin-task-{{ $index }}-description" name="tasks[{{ $index }}][description]" rows="2" required>{{ old("tasks.{$index}.description", $task?->description ?? '') }}</textarea>
                            @error("tasks.{$index}.description")<span class="form-error">{{ $message }}</span>@enderror
                        </label>
                        <div class="admin-form-grid">
                            <label class="admin-form-field">
                                <span class="admin-form-label">Skills</span>
                                <input class="form-control" id="admin-task-{{ $index }}-skills" name="tasks[{{ $index }}][skills]" value="{{ old("tasks.{$index}.skills", implode(', ', $task?->skills ?? [])) }}" placeholder="HTML, CSS, layout">
                                <span class="form-help">Separate skill tags with commas.</span>
                            </label>
                            <label class="admin-form-field">
                                <span class="admin-form-label">Status</span>
                                <select class="form-control" name="tasks[{{ $index }}][status]" required>
                                    @foreach (['incomplete', 'complete', 'publish'] as $status)
                                        <option value="{{ $status }}" @selected(old("tasks.{$index}.status", $task?->status ?? 'incomplete') === $status)>{{ ucfirst($status) }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                    </fieldset>
                @endfor
            </div>
        </section>

        <div class="admin-form-actions">
            <button class="admin-button admin-button--primary" type="submit"><span class="material-symbols-outlined text-lg" aria-hidden="true">save</span>{{ $editing ? 'Save changes' : 'Create challenge' }}</button>
            <a class="admin-link-button admin-link-button--secondary" href="{{ route('admin.challenges') }}">Cancel</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
(() => {
    const form = document.getElementById('admin-generation-form');
    if (!form) return;

    const urlInput = document.getElementById('admin-generation-url');
    const screenshotInput = document.getElementById('admin-generation-screenshots');
    const generateButton = document.getElementById('admin-generate-button');
    const message = document.getElementById('admin-generation-message');
    const allowedTypes = ['image/png', 'image/jpeg', 'image/webp'];
    function previewGeneratedCover(dataUri) {
        if (!dataUri) return;
        const preview = document.getElementById('admin-generated-cover-preview');
        preview.querySelector('img').src = dataUri;
        preview.classList.remove('hidden');
    }

    function showMessage(text, isError = false) {
        message.textContent = text;
        message.classList.remove('hidden', 'text-error', 'text-secondary');
        message.classList.add(isError ? 'text-error' : 'text-secondary');
    }

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        const websiteUrl = urlInput.value.trim();
        const screenshots = Array.from(screenshotInput.files || []);

        if (!websiteUrl && screenshots.length === 0) {
            showMessage('Add a public website URL, upload screenshots, or use both.', true);
            urlInput.focus();
            return;
        }
        if (screenshots.length > 3 || screenshots.some((file) => !allowedTypes.includes(file.type) || file.size > 2 * 1024 * 1024)) {
            showMessage('Choose up to three PNG, JPG, or WEBP screenshots, 2 MB each.', true);
            return;
        }

        const payload = new FormData();
        payload.append('website_url', websiteUrl);
        screenshots.forEach((file) => payload.append('screenshots[]', file, file.name));
        generateButton.disabled = true;
        generateButton.innerHTML = '<span class="material-symbols-outlined animate-spin text-lg" aria-hidden="true">progress_activity</span>Generating draft…';
        message.classList.add('hidden');

        try {
            const response = await fetch(form.dataset.endpoint, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value,
                },
                body: payload,
            });

            let data;
            try {
                data = await response.json();
            } catch {
                throw new Error('The response could not be read. Try again with smaller screenshots.');
            }

            if (!response.ok) {
                const firstError = Object.values(data.errors || {}).flat()[0];
                throw new Error(firstError || data.message || 'Challenge generation failed. Please try again.');
            }

            const challenge = data.challenge;
            previewGeneratedCover(challenge.cover_image);
            document.getElementById('admin-challenge-title').value = challenge.title || '';
            document.getElementById('admin-challenge-description').value = challenge.description || '';
            document.getElementById('admin-challenge-difficulty').value = challenge.difficulty || 'medium';
            for (let index = 0; index < 3; index++) {
                const task = challenge.tasks?.[index] || {};
                const skills = Array.isArray(task.skills) ? task.skills.join(', ') : (task.skills || '');
                document.getElementById(`admin-task-${index}-description`).value = task.description || '';
                document.getElementById(`admin-task-${index}-skills`).value = skills;
            }

            showMessage(data.notice || 'Draft added to the challenge form. Review and edit it before saving.');
            document.getElementById('admin-challenge-title').focus({ preventScroll: true });
        } catch (error) {
            showMessage(error.message || 'Challenge generation failed. Please try again.', true);
        } finally {
            generateButton.disabled = false;
            generateButton.innerHTML = '<span class="material-symbols-outlined text-lg" aria-hidden="true">auto_awesome</span>Generate draft';
        }
    });
})();
</script>
@endpush
