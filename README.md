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
