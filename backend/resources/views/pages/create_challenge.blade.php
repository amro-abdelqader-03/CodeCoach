@extends('layouts.app')

@section('title', 'Create a Challenge')

@section('content')
<div class="flex flex-col w-full">
<section class="relative w-full max-w-3xl mx-auto px-6 lg:px-12 py-space-xl lg:py-20">
<div class="pointer-events-none absolute top-8 left-1/2 -translate-x-1/2 w-[34rem] h-[18rem] rounded-full bg-primary-container/10 blur-3xl"></div>
<div class="relative flex flex-col items-center text-center mb-space-xl">
<div class="inline-flex items-center gap-space-xs px-space-md py-1.5 rounded-full bg-surface-container-high shadow-[0_0_20px_rgba(77,142,255,0.22)] mb-space-lg">
<span class="font-caption-caps text-caption-caps uppercase tracking-wider text-secondary">✦ AI CHALLENGE GENERATOR</span>
</div>
<h1 class="font-display-hero text-display-hero text-on-surface mb-space-md">
        Create a <span class="text-secondary">Challenge</span>
</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl">
        Bring any website to life. Upload screenshots or paste a URL, and let AI turn it into your next frontend challenge.
      </p>
</div>
<div class="relative w-full bg-surface-container/80 backdrop-blur-xl rounded-xl p-space-lg md:p-space-xl shadow-[0_24px_48px_-12px_rgba(0,0,0,0.6),0_0_32px_-8px_rgba(77,142,255,0.18)] flex flex-col gap-space-lg">
<div class="flex flex-col">
<div class="group rounded-xl bg-surface-container-lowest/75 p-space-xl text-center cursor-pointer transition-all duration-200 shadow-[inset_0_0_0_1px_rgba(123,208,255,0.2)] hover:bg-surface-container-low hover:shadow-[inset_0_0_0_1px_rgba(123,208,255,0.45),0_0_28px_-4px_rgba(77,142,255,0.28)]" id="drop-zone">
<div class="w-14 h-14 rounded-full bg-primary-container/15 text-primary flex items-center justify-center mx-auto mb-space-md shadow-[0_0_20px_rgba(77,142,255,0.2)] group-hover:scale-105 transition-transform">
<span class="material-symbols-outlined text-[28px]">cloud_upload</span>
</div>
<p class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">
            Drop your website screenshots here
          </p>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-md">
            Drag and drop images or browse files
          </p>
<span class="inline-flex items-center px-space-sm py-1 rounded-full bg-surface-container-high font-label-mono text-label-mono text-secondary">
            PNG, JPG, JPEG, WEBP
          </span>
<input accept="image/png,image/jpeg,image/webp" class="hidden" id="file-input" multiple="" type="file"/>
</div>
<div class="hidden grid grid-cols-2 sm:grid-cols-3 gap-space-md mt-space-md" id="preview-grid"></div>
</div>
<div class="flex items-center gap-space-md">
<div class="h-px flex-1 bg-surface-container-highest"></div>
<span class="font-caption-caps text-caption-caps uppercase text-outline">OR</span>
<div class="h-px flex-1 bg-surface-container-highest"></div>
</div>
<div class="flex flex-col gap-space-sm">
<div class="bg-surface-container-lowest/90 rounded-lg flex items-center gap-space-sm px-space-md py-3.5 shadow-[inset_0_0_0_1px_rgba(140,144,159,0.2)] focus-within:shadow-[0_0_0_2px_rgba(77,142,255,0.45)] transition-all">
<span class="material-symbols-outlined text-outline text-[20px]">language</span>
<input class="w-full bg-transparent font-label-mono text-label-mono text-on-surface placeholder:text-outline focus:outline-none" id="url-input" placeholder="https://example.com" type="url"/>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
          Either screenshots, a URL, or both are sufficient to generate your challenge.
        </p>
</div>
<button class="w-full py-4 px-space-lg rounded-xl bg-gradient-to-b from-primary-container to-secondary-container text-on-primary-container font-headline-sm text-headline-sm font-semibold shadow-[0_0_24px_-2px_rgba(77,142,255,0.45)] hover:shadow-[0_0_32px_rgba(77,142,255,0.65)] active:scale-[0.99] transition-all flex items-center justify-center gap-space-sm cursor-pointer" id="generate-btn" type="button">
<span>Generate Challenge</span>
<span>✦</span>
</button>
</div>
</section>
<script>
    (function () {
      const dropZone = document.getElementById('drop-zone');
      const fileInput = document.getElementById('file-input');
      const previewGrid = document.getElementById('preview-grid');
      const generateBtn = document.getElementById('generate-btn');
      const urlInput = document.getElementById('url-input');

      let uploadedFiles = [];

      function renderPreviews() {
        previewGrid.innerHTML = '';
        if (uploadedFiles.length === 0) {
          previewGrid.classList.add('hidden');
          return;
        }
        previewGrid.classList.remove('hidden');

        uploadedFiles.forEach((item, index) => {
          const card = document.createElement('div');
          card.className = 'relative group rounded-lg overflow-hidden bg-surface-container-lowest aspect-video shadow-md';

          const img = document.createElement('img');
          img.src = item.url;
          img.alt = item.file.name;
          img.className = 'w-full h-full object-cover';

          const removeBtn = document.createElement('button');
          removeBtn.type = 'button';
          removeBtn.innerHTML = '&times;';
          removeBtn.setAttribute('aria-label', 'Remove image');
          removeBtn.className = 'absolute top-2 right-2 w-6 h-6 rounded-full bg-surface-container-lowest/90 text-on-surface hover:bg-error hover:text-on-error flex items-center justify-center font-body-md text-body-md transition-colors cursor-pointer shadow-sm';
          removeBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            URL.revokeObjectURL(item.url);
            uploadedFiles.splice(index, 1);
            renderPreviews();
          });

          card.appendChild(img);
          card.appendChild(removeBtn);
          previewGrid.appendChild(card);
        });
      }

      function handleFiles(files) {
        const validTypes = ['image/png', 'image/jpeg', 'image/webp'];
        Array.from(files).forEach((file) => {
          if (validTypes.includes(file.type)) {
            uploadedFiles.push({
              file,
              url: URL.createObjectURL(file)
            });
          }
        });
        renderPreviews();
      }

      dropZone.addEventListener('click', () => {
        fileInput.click();
      });

      fileInput.addEventListener('change', (e) => {
        if (e.target.files.length) {
          handleFiles(e.target.files);
          fileInput.value = '';
        }
      });

      dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('bg-surface-container-low', 'shadow-[inset_0_0_0_1px_rgba(123,208,255,0.6),0_0_32px_-4px_rgba(77,142,255,0.4)]');
      });

      dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('bg-surface-container-low', 'shadow-[inset_0_0_0_1px_rgba(123,208,255,0.6),0_0_32px_-4px_rgba(77,142,255,0.4)]');
      });

      dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('bg-surface-container-low', 'shadow-[inset_0_0_0_1px_rgba(123,208,255,0.6),0_0_32px_-4px_rgba(77,142,255,0.4)]');
        if (e.dataTransfer.files.length) {
          handleFiles(e.dataTransfer.files);
        }
      });

      generateBtn.addEventListener('click', () => {
        const hasUrl = urlInput.value.trim().length > 0;
        const hasFiles = uploadedFiles.length > 0;
        if (!hasUrl && !hasFiles) {
          urlInput.focus();
          return;
        }
        generateBtn.innerHTML = '<span>Generating Challenge...</span>';
        generateBtn.classList.add('opacity-80');
        setTimeout(() => {
          generateBtn.innerHTML = '<span>Generate Challenge</span><span>&#10022;</span>';
          generateBtn.classList.remove('opacity-80');
        }, 1200);
      });
    })();
  </script>
</div>
@endsection

