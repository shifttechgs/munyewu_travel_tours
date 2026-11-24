# munyewu_travel_tours

Marketing website for **Munyewu Travel & Tours** — a Cape Town tour and private transport company based in Thornton. The site helps visitors discover a Cape Town city or Winelands tour, arrange an airport transfer or private chauffeur, and send a qualified enquiry.

## Stack

- Laravel 13 (PHP 8.3+)
- Tailwind CSS v4 + Vite
- SQLite (default)

## Features

- Full-bleed hero slider (three Cape Town scenes) with a frosted "up next" preview, dots/arrows, and reduced-motion support
- Flat-to-pill sticky header
- Tours, transfers, and an inline enquiry form
- Real enquiry backend: server-side validation, persistence to an `enquiries` table, mail notification, honeypot + CSRF, and full progressive enhancement (works without JS)

## Getting started

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run build        # or: npm run dev
php artisan serve
```

Then open the URL shown by `php artisan serve`.

## Project structure

- `resources/views/home.blade.php` — the landing page
- `resources/css/app.css`, `resources/js/app.js` — design tokens, components, and progressive-enhancement JS
- `app/Http/Controllers/EnquiryController.php`, `app/Http/Requests/EnquiryRequest.php` — enquiry handling
- `config/business.php` — single source of truth for business facts (name, address, phones, services)
- `docs/` — brand and growth docs (business profile, design system, SEO, GEO, instructions)
- `public/images/` — hero and tour imagery (see `CREDITS.md` for licences)

## Before launch

See `public/images/CREDITS.md` and `docs/memory.md` for outstanding items (official logo, image rights, and real SMTP credentials for enquiry notifications).
