# Gallery Preview + Full Page Design

**Date:** 2026-05-15
**Status:** Approved

## Overview

Homepage gallery section shows 6 preview photos with a "Lihat Semua Dokumentasi" button. Button leads to `/galeri` — a dedicated page showing all documentation photos in a masonry grid with lightbox.

## Architecture

### Modified files
- `app/View/Components/Gallery.php` — limit query to 6 images
- `resources/views/components/gallery.blade.php` — add "Lihat Semua Dokumentasi" button below grid

### New files
- `app/Http/Controllers/GalleriController.php` — single `index()`, fetches all `DocImage`, renders `galeri` view
- `resources/views/galeri.blade.php` — full gallery page
- `public/css/galeri.css` — masonry grid + lightbox styles
- `public/js/galeri.js` — lightbox open/close/prev/next/keyboard logic

### Route
```
GET /galeri  →  GalleriController@index  (name: galeri)
```
Added to `routes/web.php` alongside other public routes.

## Component Changes

### `Gallery` view component
- Query: `DocImage::latest('id')->take(6)->get()`
- If `$images->isNotEmpty()`: render 6-photo grid + solid blue "Lihat Semua Dokumentasi →" button centered below
- If empty: existing empty state, button hidden

### `/galeri` page
- Extends `x-app-layout` with `cssFile="galeri"`
- Heading: "Galeri Parallaxnet"
- Masonry grid (CSS columns) — all images from DB
- Each photo: clicking opens lightbox
- Empty state if no images: "Belum ada galeri saat ini."

## Lightbox Behavior
- Dark overlay covers viewport
- Image centered, max 90vw × 90vh
- Close button (×) top-right
- Prev/next arrows (hidden if only 1 image)
- Keyboard: ESC closes, ← → navigate
- Vanilla JS, no external dependencies

## Edge Cases
- Fewer than 6 images total → show all on homepage, no padding
- 0 images → empty state on both homepage and `/galeri`, button hidden on homepage
- 1 image on `/galeri` → lightbox with no prev/next arrows
- Broken image → browser default fallback, `loading="lazy"` preserved
