@extends('layouts.app')

@section('title', 'Create a Challenge')

@section('content')
<section class="mx-auto w-full max-w-5xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
    <div class="mx-auto max-w-3xl text-center">
        <span class="inline-flex items-center gap-2 rounded-full border border-secondary/20 bg-secondary/10 px-3 py-1.5 text-xs font-semibold uppercase tracking-[.14em] text-secondary">
            <span class="material-symbols-outlined text-base" aria-hidden="true">auto_awesome</span>
            AI challenge generator
        </span>
        <h1 class="mt-5 font-headline-xl text-4xl font-semibold tracking-tight sm:text-5xl">Turn a website into a <span class="text-secondary">challenge</span></h1>
        <p class="mx-auto mt-4 max-w-2xl text-base leading-7 text-on-surface-variant">
            Add a public website URL and local Ollama will draft a focused frontend rebuild challenge for you to review. Screenshots need a vision model configured on the server.
        </p>
    </div>

    <div class="generator-card mx-auto mt-9 max-w-4xl p-4 sm:p-7 lg:p-8">
        <form id="generation-form" class="space-y-6" data-endpoint="{{ route('challenges.generate') }}">
            @csrf
            <div>
                <div class="mb-3 flex flex-wrap items-end justify-between gap-2">
                    <div>
                        <h2 class="text-base font-semibold">Reference screenshots</h2>
                        <p class="mt-1 text-sm text-on-surface-variant">Upload up to three PNG, JPG, or WEBP images, up to 2 MB each.</p>
                    </div>
                    <span id="file-count" class="text-xs text-outline">0 of 3 added</span>
                </div>

                <div id="drop-zone" class="generator-dropzone cursor-pointer" role="button" tabindex="0" aria-controls="file-input" aria-label="Choose or drop website screenshots">
                    <div>
                        <span class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-primary-container/15 text-primary">
                            <span class="material-symbols-outlined text-2xl" aria-hidden="true">cloud_upload</span>
                        </span>
                        <p class="mt-3 font-medium">Drop screenshots here or <span class="text-secondary underline underline-offset-4">browse files</span></p>
                        <p class="mt-1 text-xs text-on-surface-variant">Desktop, tablet, and mobile screenshots work well.</p>
                    </div>
                </div>
                <input id="file-input" class="sr-only" accept="image/png,image/jpeg,image/webp" multiple type="file">
                <div id="preview-grid" class="mt-4 grid gap-3 sm:grid-cols-2 lg:grid-cols-3" aria-label="Selected screenshots"></div>
            </div>

            <div class="flex items-center gap-4 text-xs font-semibold uppercase tracking-[.16em] text-outline" aria-hidden="true">
                <span class="h-px flex-1 bg-outline-variant/40"></span><span>and / or</span><span class="h-px flex-1 bg-outline-variant/40"></span>
            </div>

            <div class="grid gap-2">
                <label class="text-sm font-semibold" for="url-input">Public website URL</label>
                <input id="url-input" name="website_url" class="form-control" type="url" inputmode="url" placeholder="https://example.com" autocomplete="url">
                <p class="form-help">The page must be publicly accessible. Pages behind a sign-in or paywall need screenshots instead.</p>
            </div>

            <div id="generation-message" class="hidden rounded-xl border px-4 py-3 text-sm" role="status" aria-live="polite"></div>

            <button id="generate-btn" class="admin-button admin-button--primary min-h-12 w-full text-sm" type="submit">
                <span class="material-symbols-outlined text-lg" aria-hidden="true">auto_awesome</span>
                <span>Generate challenge</span>
            </button>
        </form>
    </div>

    <section id="generator-result" class="generator-result mx-auto mt-9 hidden max-w-4xl" aria-labelledby="result-heading">
        <div class="mb-4">
            <p class="admin-eyebrow">Draft challenge</p>
            <h2 id="result-heading" class="mt-1 text-2xl font-semibold tracking-tight">Review and edit before saving</h2>
            <p class="mt-2 text-sm text-on-surface-variant">Ollama has prepared three tasks. Adjust the wording and skill tags to suit your learners.</p>
        </div>

        <form method="post" action="{{ route('challenges.store') }}" enctype="multipart/form-data" class="generator-card p-4 sm:p-7" id="challenge-result-form">
            @csrf
            <div class="mb-5 grid gap-3">
                <label class="grid gap-2 text-sm font-semibold" for="result-cover">Challenge cover image <span class="font-normal text-on-surface-variant">(optional)</span>
                    <input class="form-control" id="result-cover" name="image" type="file" accept="image/png,image/jpeg,image/webp">
                </label>
                <div id="result-cover-preview" class="hidden"><img class="max-h-64 w-full rounded-xl object-cover" alt="Generated challenge cover preview"></div>
            </div>
            <div class="admin-form-grid">
                <label class="admin-form-field admin-form-field--wide">
                    <span class="admin-form-label">Challenge title</span>
                    <input class="form-control" name="title" id="result-title" maxlength="255" required>
                </label>
                <label class="admin-form-field">
                    <span class="admin-form-label">Difficulty</span>
                    <select class="form-control" name="difficulty" id="result-difficulty" required>
                        <option value="easy">Easy</option><option value="medium">Medium</option><option value="hard">Hard</option>
                    </select>
                </label>
                <label class="admin-form-field admin-form-field--wide">
                    <span class="admin-form-label">Challenge brief</span>
                    <textarea class="form-control" name="description" id="result-description" maxlength="12000" required></textarea>
                </label>
            </div>

            <div class="admin-form-section">
                <h3 class="admin-form-section-heading">Build tasks</h3>
                <p class="admin-form-section-copy">Keep the tasks small and ordered so learners can build the page in clear steps.</p>
                <div class="grid gap-3">
                    @for ($index = 0; $index < 3; $index++)
                        <fieldset class="generator-task grid gap-3">
                            <legend class="px-1 text-sm font-semibold text-secondary">Task {{ $index + 1 }}</legend>
                            <label class="admin-form-field">
                                <span class="admin-form-label">Task description</span>
                                <textarea class="form-control" name="tasks[{{ $index }}][description]" id="result-task-{{ $index }}" maxlength="1200" rows="3" required></textarea>
                            </label>
                            <label class="admin-form-field">
                                <span class="admin-form-label">Skills</span>
                                <input class="form-control" name="tasks[{{ $index }}][skills]" id="result-skills-{{ $index }}" maxlength="500" placeholder="HTML, CSS, responsive design">
                                <span class="form-help">Separate skills with commas.</span>
                            </label>
                        </fieldset>
                    @endfor
                </div>
            </div>

            <div class="admin-form-actions">
                <button class="admin-button admin-button--primary" type="submit">
                    <span class="material-symbols-outlined text-lg" aria-hidden="true">save</span>
                    Save challenge
                </button>
                <button class="admin-button admin-button--secondary" id="generate-again" type="button">Generate another draft</button>
            </div>
        </form>
    </section>
</section>
@endsection

@push('scripts')
<script>
(() => {
    const form = document.getElementById('generation-form');
    if (!form) return;

    const fileInput = document.getElementById('file-input');
    const dropZone = document.getElementById('drop-zone');
    const previewGrid = document.getElementById('preview-grid');
    const fileCount = document.getElementById('file-count');
    const urlInput = document.getElementById('url-input');
    const generateButton = document.getElementById('generate-btn');
    const message = document.getElementById('generation-message');
    const result = document.getElementById('generator-result');
    const allowedTypes = ['image/png', 'image/jpeg', 'image/webp'];
    function previewGeneratedCover(dataUri) {
        if (!dataUri) return;
        const preview = document.getElementById('result-cover-preview');
        preview.querySelector('img').src = dataUri;
        preview.classList.remove('hidden');
    }
    const maxFileSize = 2 * 1024 * 1024;
    let screenshots = [];
    const previewUrls = [];

    function showMessage(text, isError = false) {
        message.textContent = text;
        message.classList.remove('hidden', 'border-error/25', 'bg-error-container/20', 'text-error', 'border-secondary/20', 'bg-secondary/10', 'text-secondary');
        message.classList.add(...(isError
            ? ['border-error/25', 'bg-error-container/20', 'text-error']
            : ['border-secondary/20', 'bg-secondary/10', 'text-secondary']));
    }

    function renderFiles() {
        previewUrls.forEach((url) => URL.revokeObjectURL(url));
        previewUrls.length = 0;
        previewGrid.replaceChildren();
        fileCount.textContent = `${screenshots.length} of 3 added`;

        screenshots.forEach((file, index) => {
            const card = document.createElement('article');
            card.className = 'generator-preview relative';

            const image = document.createElement('img');
            image.src = URL.createObjectURL(file);
            previewUrls.push(image.src);
            image.alt = `Screenshot ${index + 1}: ${file.name}`;

            const footer = document.createElement('div');
            footer.className = 'flex items-center justify-between gap-2 px-3 py-2';

            const name = document.createElement('span');
            name.className = 'min-w-0 truncate text-xs text-on-surface-variant';
            name.textContent = file.name;

            const remove = document.createElement('button');
            remove.type = 'button';
            remove.className = 'rounded-md px-2 py-1 text-xs font-medium text-error hover:bg-error-container/20';
            remove.textContent = 'Remove';
            remove.setAttribute('aria-label', `Remove ${file.name}`);
            remove.addEventListener('click', () => {
                screenshots.splice(index, 1);
                renderFiles();
            });

            footer.append(name, remove);
            card.append(image, footer);
            previewGrid.append(card);
        });
    }

    function addFiles(fileList) {
        const incoming = Array.from(fileList || []);
        const rejected = incoming.filter((file) => !allowedTypes.includes(file.type) || file.size > maxFileSize);

        if (rejected.length) {
            showMessage('Use PNG, JPG, or WEBP images up to 2 MB each.', true);
        }

        const accepted = incoming.filter((file) => allowedTypes.includes(file.type) && file.size <= maxFileSize);
        const remainingSlots = 3 - screenshots.length;
        screenshots.push(...accepted.slice(0, remainingSlots));

        if (accepted.length > remainingSlots) {
            showMessage('You can add up to three screenshots.', true);
        }

        renderFiles();
    }

    dropZone.addEventListener('click', () => fileInput.click());
    dropZone.addEventListener('keydown', (event) => {
        if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            fileInput.click();
        }
    });
    fileInput.addEventListener('change', () => {
        addFiles(fileInput.files);
        fileInput.value = '';
    });
    dropZone.addEventListener('dragover', (event) => {
        event.preventDefault();
        dropZone.classList.add('is-dragging');
    });
    dropZone.addEventListener('dragleave', () => dropZone.classList.remove('is-dragging'));
    dropZone.addEventListener('drop', (event) => {
        event.preventDefault();
        dropZone.classList.remove('is-dragging');
        addFiles(event.dataTransfer.files);
    });

    async function generateChallenge() {
        const websiteUrl = urlInput.value.trim();
        if (!websiteUrl && screenshots.length === 0) {
            showMessage('Add a public website URL, upload a screenshot, or use both.', true);
            urlInput.focus();
            return;
        }

        const payload = new FormData();
        payload.append('website_url', websiteUrl);
        screenshots.forEach((file) => payload.append('screenshots[]', file, file.name));
        message.classList.add('hidden');
        result.classList.add('hidden');
        generateButton.disabled = true;
        generateButton.innerHTML = '<span class="material-symbols-outlined animate-spin text-lg" aria-hidden="true">progress_activity</span><span>Analyzing the reference…</span>';

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
            document.getElementById('result-title').value = challenge.title || '';
            document.getElementById('result-description').value = challenge.description || '';
            document.getElementById('result-difficulty').value = challenge.difficulty || 'medium';
            for (let index = 0; index < 3; index++) {
                const task = challenge.tasks?.[index] || {};
                const skills = Array.isArray(task.skills) ? task.skills.join(', ') : (task.skills || '');
                document.getElementById(`result-task-${index}`).value = task.description || '';
                document.getElementById(`result-skills-${index}`).value = skills;
            }
            result.classList.remove('hidden');
            result.scrollIntoView({ behavior: 'smooth', block: 'start' });
            showMessage(data.notice ? `${data.notice} Review the draft below and save when ready.` : 'Challenge draft generated. Review it below, make any edits, then save.');
        } catch (error) {
            showMessage(error.message || 'Challenge generation failed. Please try again.', true);
        } finally {
            generateButton.disabled = false;
            generateButton.innerHTML = '<span class="material-symbols-outlined text-lg" aria-hidden="true">auto_awesome</span><span>Generate challenge</span>';
        }
    }

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        generateChallenge();
    });

    document.getElementById('generate-again').addEventListener('click', () => {
        result.classList.add('hidden');
        generateChallenge();
    });
})();
</script>
@endpush
