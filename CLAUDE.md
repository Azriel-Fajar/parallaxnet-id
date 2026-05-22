# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Parallaxnet Siber Indonesia — a Laravel 12 company website for a cybersecurity training provider. Indonesian-language content. Runs on XAMPP (MySQL, PHP 8.2).

## Commands

```bash
# First-time setup
composer run setup

# Dev server (PHP + queue + Vite concurrently)
composer run dev

# Build assets
npm run build

# Run tests
composer run test

# Single test
php artisan test --filter TestName

# Code style
./vendor/bin/pint

# Storage symlink (required for uploaded images to be publicly accessible)
php artisan storage:link

# Migrate
php artisan migrate
```

## Database

MySQL via XAMPP. DB name: `parallaxnet_id`, user: `root`, no password (default XAMPP config). Session, cache, and queue all use the database driver.

## Architecture

**Layouts** (`resources/views/layouts/`):
- `base.blade.php` — bare HTML shell with Vite assets, navbar, footer
- `app.blade.php` — extends base, used by public-facing pages
- `kurikulum.blade.php` — extends base, used by all curriculum/course pages
- `admin-layout.blade.php` — admin dashboard shell with sidebar

**Public pages** are mostly static Blade views rendered by `HomeController`, `KurikulumController`, `BootcampController`, `ProfesionalController`. No Livewire or Inertia — plain Blade + Vite.

**Admin panel** (`/admin`): dashboard protected by `auth` + `Admin` + `PreventBackHistory` middleware. Section pages: sliders, news, documents, partner logos (mitra, was "university"), hero video, courses (categories + courses), testimonials, FAQs. All upload/CRUD routes live inside the protected middleware group. Dedicated controllers: `AdminCourseCategoryController`, `AdminCourseController`, `AdminFaqController`, `AdminTestimonialController` for CRUD; `AdminController` for uploads + section page rendering.

**Image upload pattern** (`AdminController`): validates → resizes with `intervention/image` v2 → saves relative to `storage/` (note the existing `public_path('storage/')` quirk — Phase 2 fix) → stores path in DB. News generates a thumbnail at 300px alongside the 800px original. Course tiles use 400px wide; partner logos use 300px wide. Hero video accepts MP4/WebM (`mimetypes:video/mp4,video/webm`, max 50MB) saved under `images/video/`.

**Models**: `News`, `SliderImage`, `DocImage`, `UnivImages` (has `category` column for partner grouping), `CourseCategory` hasMany `Course`, `Faq`, `Testimonial`, `HomeVideo` (single-row pattern via `HomeVideo::current()`), `User`.

**Course catalog**: DB-driven via `CourseCategory` + `Course`. Public home renders grouped tile grid filtered to categories with courses. `/kursus` renders the full catalog. Seed via `CourseCategorySeeder` + `CourseSeeder` (24 courses across 5 categories: Basic Course, Web Bootcamp, AI Bootcamp, Hacker Bootcamp, Profesional).

**Empty-state rule**: hide entire section when empty for slider, hero video, course grid, FAQ, testimonials. Render section + placeholder for gallery + partners.

**Navbar**: 5 top-level items — Beranda, Tentang Kami, LMS (external), Kurikulum (4 submenu: Basic Course, Bootcamp, Profesional, Inggris), Berita. No Beasiswa, no Genius nav link, no Register submenu.

**Profesional pages**: only Cybersecurity, Ethical Hacker, IoT. Old `cloud`, `lawenforcement`, `cloudengineer` views + routes deleted. Bootcamp has Web, AI, Hacker — old `fullstackdev` route 301-redirects to `/kurikulum/bootcamp/hacker`.

**Middleware**:
- `Admin` — checks `Auth::user()->role === 'admin'`
- `PreventBackHistory` — prevents browser back-button access to admin after logout

**User roles**: single `role` column on `users` table. Only `admin` role exists in practice.

**Alerts**: `realrashid/sweet-alert` — use `Alert::toast('message', 'type')` for all flash feedback.

## Key Paths

- Uploaded images live in `storage/images/{slider,news,news/thumbs,document,university}/`
- Public URL for uploaded files: `/storage/images/...` (requires `php artisan storage:link`)
- Route names follow Indonesian: `tentangKami`, `kurikulum`, `berita`, `profesional`, etc.

## CSS Architecture

**CSS is NOT in `resources/css/` (not Vite-compiled).** All styles live in `public/css/` and are served statically.

| File | Scope |
|------|-------|
| `public/css/footer.css` | Footer component |
| `public/css/navbar.css` | Navbar component |
| `public/css/home.css` | Home page sections |
| `public/css/admin.css` | Admin panel |
| `public/css/berita.css` | News page |
| `public/css/tentang-kami.css` | About page |
| `public/css/kurikulumBase.css` | Curriculum base layout |
| `public/css/course.css` | Course pages |
| `public/css/galeri.css` | Gallery section |
| `public/css/login.css` | Login page |
| `public/css/overlay.css` | Overlay/modal styles |
| `public/css/os.css`, `teknologi.css`, `benefit.css`, `impact.css` | Home sub-sections |

**When editing styles**: grep `public/css/` not `resources/css/`.
