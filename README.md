# CodeCoach

CodeCoach is a frontend practice platform built with Laravel 12, Blade, Tailwind CSS 4, and Vite.

## Run locally

From the Laravel application directory:

```bash
cd backend
composer install
npm install
```

Start Laravel and Vite in separate terminals:

```bash
php artisan serve
npm run dev
```

To build production assets:

```bash
npm run build
```

## Pages

Public pages are defined in `backend/routes/web.php` and rendered from `backend/resources/views/pages` with the shared `layouts/app.blade.php` layout. The admin area uses `layouts/admin.blade.php` and includes a page for every sidebar item.

| Page | Route |
| --- | --- |
| Home | `/` |
| How it works | `/how-it-works` |
| Gamification | `/gamification` |
| Challenges | `/challenges` |
| Create a challenge | `/challenges/create` |
| Challenge details | `/challenges/{challenge}` |
| AI evaluation | `/ai-evaluation` |
| Profile | `/profile` |
| Admin dashboard | `/admin` |
| Admin sections | `/admin/users`, `/admin/challenges`, `/admin/evaluations`, `/admin/appointments`, `/admin/reports`, `/admin/settings` |

The original static HTML files remain in `frontend/` as design references. Shared image assets are served from `backend/public/images`.

Challenge generation uses Vizra ADK `0.0.48` with Ollama through Prism. Set `OLLAMA_URL=http://127.0.0.1:11434/` and `OLLAMA_MODEL=qwen2.5:7b` in `backend/.env`, and pull the model with `ollama pull qwen2.5:7b`. Website URLs are downloaded and summarized locally before Ollama drafts the challenge. Screenshot generation requires a vision model configured with `OLLAMA_VISION_MODEL`; `qwen2.5:7b` is text-only. Challenge covers are generated as local SVG artwork and do not use an image model. Run `php artisan migrate` from `backend/` to create the agent session and trace tables required by Vizra ADK.
