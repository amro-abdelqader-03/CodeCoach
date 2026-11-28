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
| AI Coach status | `/ai-evaluation` |
| AI evaluation result | `/ai-evaluation/{submission}` |
| Peer evaluations | `/peer-evaluations` |
| Profile | `/profile` |
| Admin dashboard | `/admin` |
| Admin sections | `/admin/users`, `/admin/challenges`, `/admin/evaluations`, `/admin/appointments`, `/admin/reports`, `/admin/settings` |

The original static HTML files remain in `frontend/` as design references. Shared image assets are served from `backend/public/images`.

Challenge generation uses Vizra ADK `0.0.48` with Ollama through Prism. Set `OLLAMA_URL=http://127.0.0.1:11434/` and `OLLAMA_MODEL=qwen2.5:7b` in `backend/.env`, and pull the model with `ollama pull qwen2.5:7b`. Website URLs are downloaded and summarized locally before Ollama drafts the challenge. Screenshot generation requires a vision model configured with `OLLAMA_VISION_MODEL`; `qwen2.5:7b` is text-only. Challenge covers are generated as local SVG artwork and do not use an image model. Run `php artisan migrate` from `backend/` to create the agent session and trace tables required by Vizra ADK.

Learner-created challenges start as private drafts and can be published after the creator completes every task. The challenge library lists published challenges separately from a signed-in learner's own challenges. Learners upload one UTF-8 source file per task (HTML, CSS, JS, JSX, TS, TSX, Vue, JSON, or TXT, up to 2 MB). Tasks unlock in order; each file gets its own local Ollama review, and its score, summary, strengths, and weaknesses are stored in `challenge_submissions`. An AI score above 80 unlocks peer evaluation for that task submission. Learners can publish 15-minute to 2-hour evaluation slots, book another learner's open slot, and save a human score and feedback when they complete the review. The conversational AI Coach page is marked as in progress; code evaluation is available through each task submission result page.

Evaluation appointment times use `APP_TIMEZONE`, which defaults to `Asia/Amman` and can be overridden in `backend/.env`.

## Admin API

Admin data endpoints are served under `/api/admin` and require a Sanctum token with the `admin` ability belonging to an administrator account. Create a token with `POST /api/admin/login` using JSON such as:

```json
{
  "email": "admin@example.com",
  "password": "your-password",
  "device_name": "admin-client"
}
```

Send the returned token as `Authorization: Bearer <token>` and include `Accept: application/json`. The API includes `/me`, `/dashboard`, and list, detail, create, update, and delete endpoints for `/users`, `/challenges`, `/appointments`, and `/shop-items`; it also exposes read-only `/evaluations`, `/reports`, and `/settings` endpoints. `/evaluations` returns paginated challenge submissions with their AI and peer review details. `POST /api/admin/logout` revokes the current token or ends the current admin session. The existing `/admin` URLs render the Blade admin pages; their data forms submit through this protected API using the signed-in admin session.

Run `php artisan migrate` from `backend/` after installing dependencies to create the Sanctum personal access token table along with the application's other tables.
