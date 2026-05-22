# Gallery Preview + Full Page Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Limit the homepage gallery to 6 photos with a "Lihat Semua Dokumentasi" button that leads to `/galeri` — a full masonry gallery page with lightbox.

**Architecture:** The `Gallery` Blade component is modified to fetch only 6 images and gains a link to `/galeri`. A new `GalleriController` fetches all images and renders a new `galeri.blade.php` view. The full-page lightbox is powered by vanilla JS in `public/js/galeri.js` loaded inline in that view.

**Tech Stack:** Laravel 12, Blade components, vanilla JS, plain CSS (no new dependencies)

---

## File Map

| File | Action | Responsibility |
|------|--------|---------------|
| `app/View/Components/Gallery.php` | Modify | Limit query to 6 images |
| `resources/views/components/gallery.blade.php` | Modify | Add "Lihat Semua Dokumentasi" button |
| `app/Http/Controllers/GalleriController.php` | Create | Fetch all DocImages, render galeri view |
| `routes/web.php` | Modify | Add `GET /galeri` route |
| `resources/views/galeri.blade.php` | Create | Full gallery page with masonry + lightbox |
| `public/css/galeri.css` | Create | Masonry grid + lightbox styles |
| `public/js/galeri.js` | Create | Lightbox open/close/prev/next/keyboard |

---

### Task 1: Limit homepage gallery to 6 images

**Files:**
- Modify: `app/View/Components/Gallery.php`

- [ ] **Step 1: Update the query**

In `app/View/Components/Gallery.php`, change line 18:

```php
// Before
$this->images = DocImage::all();

// After
$this->images = DocImage::latest('id')->take(6)->get();
```

- [ ] **Step 2: Verify in browser**

Open `http://localhost/Parallaxnet%20ID/public/` — gallery section should show at most 6 photos. If fewer than 6 exist in DB, all are shown (no change in count).

- [ ] **Step 3: Commit**

```bash
git add app/View/Components/Gallery.php
git commit -m "feat: limit homepage gallery to 6 photos"
```

---

### Task 2: Add "Lihat Semua Dokumentasi" button to homepage gallery

**Files:**
- Modify: `resources/views/components/gallery.blade.php`

- [ ] **Step 1: Add button below the grid**

Replace the full contents of `resources/views/components/gallery.blade.php` with:

```blade
<section class="gallery-section">
    <div class="container">
        <h2>Galeri Parallaxnet</h2>

        @if ($images->isNotEmpty())
            <div class="gallery-grid">
                @foreach ($images as $i => $image)
                    <a href="{{ asset('storage/' . $image->filename) }}" target="_blank" rel="noopener" class="gallery-item gallery-item--{{ $i % 5 }}">
                        <img src="{{ asset('storage/' . $image->filename) }}" alt="" loading="lazy">
                    </a>
                @endforeach
            </div>
            <div class="gallery-cta">
                <a href="{{ route('galeri') }}" class="gallery-cta__btn">Lihat Semua Dokumentasi &rarr;</a>
            </div>
        @else
            <p class="empty-state">Belum ada galeri saat ini.</p>
        @endif
    </div>
</section>
```

- [ ] **Step 2: Add button styles to `public/css/home.css`**

Append after the existing `.gallery-item--3` media query block (end of file or after line 979):

```css
.gallery-cta {
    display: flex;
    justify-content: center;
    margin-top: 1.5rem;
}

.gallery-cta__btn {
    display: inline-block;
    background: var(--secondary);
    color: var(--white);
    padding: 0.75rem 2rem;
    border-radius: 6px;
    font-weight: 600;
    text-decoration: none;
    transition: background 0.2s ease;
}

.gallery-cta__btn:hover {
    background: #163455;
}
```

- [ ] **Step 3: Verify in browser**

Open homepage — solid blue button "Lihat Semua Dokumentasi →" appears below the gallery grid. If gallery is empty, button is absent.

- [ ] **Step 4: Commit**

```bash
git add resources/views/components/gallery.blade.php public/css/home.css
git commit -m "feat: add see-all button to homepage gallery"
```

---

### Task 3: Add route + controller for full gallery page

**Files:**
- Create: `app/Http/Controllers/GalleriController.php`
- Modify: `routes/web.php`

- [ ] **Step 1: Create the controller**

Create `app/Http/Controllers/GalleriController.php`:

```php
<?php

namespace App\Http\Controllers;

use App\Models\DocImage;

class GalleriController extends Controller
{
    public function index()
    {
        $images = DocImage::latest('id')->get();

        return view('galeri', ['images' => $images]);
    }
}
```

- [ ] **Step 2: Register the route**

In `routes/web.php`, add after line 22 (`Route::get('/kursus', ...)`):

```php
Route::get('/galeri', [GalleriController::class, 'index'])->name('galeri');
```

Also add the import at the top with the other `use` statements:

```php
use App\Http\Controllers\GalleriController;
```

- [ ] **Step 3: Verify route exists**

```bash
php artisan route:list --name=galeri
```

Expected output includes a row with `GET | galeri | galeri | GalleriController@index`.

- [ ] **Step 4: Commit**

```bash
git add app/Http/Controllers/GalleriController.php routes/web.php
git commit -m "feat: add /galeri route and controller"
```

---

### Task 4: Create galeri CSS (masonry grid + lightbox styles)

**Files:**
- Create: `public/css/galeri.css`

- [ ] **Step 1: Create the stylesheet**

Create `public/css/galeri.css`:

```css
:root {
    --primary: #eff4f8;
    --secondary: #1d466e;
    --accent: #d9a61f;
    --white: #f8f9fa;
    --con-padding: clamp(2rem, 6vw, 5rem);
    --section-v: clamp(1.5rem, 3vw, 2rem);
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    background: var(--primary);
    color: #1f2328;
}

/* === Page Header === */
.galeri-header {
    padding: var(--section-v) 0 1rem;
    text-align: center;
}

.galeri-header h1 {
    font-size: clamp(1.6rem, 3vw, 2.4rem);
    color: var(--secondary);
}

/* === Masonry Grid === */
.galeri-section {
    padding: var(--section-v) 0 calc(var(--section-v) * 2);
}

.galeri-section .container {
    padding: 0 var(--con-padding);
    max-width: 1200px;
    margin: 0 auto;
}

.masonry-grid {
    columns: 3;
    column-gap: 0.75rem;
}

.masonry-item {
    break-inside: avoid;
    margin-bottom: 0.75rem;
    overflow: hidden;
    border-radius: 8px;
    cursor: pointer;
}

.masonry-item img {
    width: 100%;
    display: block;
    transition: transform 0.3s ease;
}

.masonry-item:hover img {
    transform: scale(1.03);
}

/* === Empty State === */
.empty-state {
    text-align: center;
    padding: 3rem 0;
    color: #666;
}

/* === Lightbox === */
.lightbox {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.88);
    z-index: 9999;
    align-items: center;
    justify-content: center;
}

.lightbox.is-open {
    display: flex;
}

.lightbox__img {
    max-width: 90vw;
    max-height: 90vh;
    border-radius: 6px;
    object-fit: contain;
    user-select: none;
}

.lightbox__close {
    position: absolute;
    top: 1rem;
    right: 1.25rem;
    font-size: 2rem;
    color: #fff;
    background: none;
    border: none;
    cursor: pointer;
    line-height: 1;
    opacity: 0.8;
    transition: opacity 0.2s;
}

.lightbox__close:hover {
    opacity: 1;
}

.lightbox__arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-size: 2.5rem;
    color: #fff;
    background: none;
    border: none;
    cursor: pointer;
    opacity: 0.7;
    padding: 0.5rem 1rem;
    transition: opacity 0.2s;
    user-select: none;
}

.lightbox__arrow:hover {
    opacity: 1;
}

.lightbox__arrow--prev {
    left: 0.5rem;
}

.lightbox__arrow--next {
    right: 0.5rem;
}

.lightbox__arrow.is-hidden {
    display: none;
}

/* === Responsive === */
@media (max-width: 768px) {
    .masonry-grid {
        columns: 2;
    }
}

@media (max-width: 480px) {
    .masonry-grid {
        columns: 1;
    }
}
```

- [ ] **Step 2: Commit**

```bash
git add public/css/galeri.css
git commit -m "feat: add galeri page CSS (masonry + lightbox)"
```

---

### Task 5: Create lightbox JS

**Files:**
- Create: `public/js/galeri.js`

- [ ] **Step 1: Create the script**

Create `public/js/galeri.js`:

```js
(function () {
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const btnClose = document.getElementById('lightbox-close');
    const btnPrev = document.getElementById('lightbox-prev');
    const btnNext = document.getElementById('lightbox-next');

    const items = Array.from(document.querySelectorAll('.masonry-item'));
    let current = 0;

    function open(index) {
        current = index;
        lightboxImg.src = items[current].dataset.src;
        lightbox.classList.add('is-open');
        updateArrows();
        document.body.style.overflow = 'hidden';
    }

    function close() {
        lightbox.classList.remove('is-open');
        lightboxImg.src = '';
        document.body.style.overflow = '';
    }

    function prev() {
        if (current > 0) open(current - 1);
    }

    function next() {
        if (current < items.length - 1) open(current + 1);
    }

    function updateArrows() {
        btnPrev.classList.toggle('is-hidden', items.length <= 1 || current === 0);
        btnNext.classList.toggle('is-hidden', items.length <= 1 || current === items.length - 1);
    }

    items.forEach(function (item, i) {
        item.addEventListener('click', function () { open(i); });
    });

    btnClose.addEventListener('click', close);
    btnPrev.addEventListener('click', prev);
    btnNext.addEventListener('click', next);

    lightbox.addEventListener('click', function (e) {
        if (e.target === lightbox) close();
    });

    document.addEventListener('keydown', function (e) {
        if (!lightbox.classList.contains('is-open')) return;
        if (e.key === 'Escape') close();
        if (e.key === 'ArrowLeft') prev();
        if (e.key === 'ArrowRight') next();
    });
})();
```

- [ ] **Step 2: Commit**

```bash
git add public/js/galeri.js
git commit -m "feat: add lightbox JS for galeri page"
```

---

### Task 6: Create the full gallery Blade view

**Files:**
- Create: `resources/views/galeri.blade.php`

- [ ] **Step 1: Create the view**

Create `resources/views/galeri.blade.php`:

```blade
<x-app-layout cssFile="galeri">
    <main>
        <section class="galeri-header">
            <div class="container">
                <h1>Galeri Parallaxnet</h1>
            </div>
        </section>

        <section class="galeri-section">
            <div class="container">
                @if ($images->isNotEmpty())
                    <div class="masonry-grid">
                        @foreach ($images as $image)
                            <div class="masonry-item" data-src="{{ asset('storage/' . $image->filename) }}">
                                <img src="{{ asset('storage/' . $image->filename) }}" alt="" loading="lazy">
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="empty-state">Belum ada galeri saat ini.</p>
                @endif
            </div>
        </section>

        {{-- Lightbox --}}
        <div id="lightbox" class="lightbox" role="dialog" aria-modal="true">
            <button id="lightbox-close" class="lightbox__close" aria-label="Tutup">&times;</button>
            <button id="lightbox-prev" class="lightbox__arrow lightbox__arrow--prev" aria-label="Sebelumnya">&#8592;</button>
            <img id="lightbox-img" class="lightbox__img" src="" alt="">
            <button id="lightbox-next" class="lightbox__arrow lightbox__arrow--next" aria-label="Berikutnya">&#8594;</button>
        </div>
    </main>

    <script src="{{ asset('js/galeri.js') }}"></script>
</x-app-layout>
```

- [ ] **Step 2: Verify page loads**

Open `http://localhost/Parallaxnet%20ID/public/galeri` — page renders with heading "Galeri Parallaxnet". If images exist in DB, masonry grid shows. If empty, "Belum ada galeri saat ini." shown.

- [ ] **Step 3: Verify lightbox**

Click any photo — dark overlay opens, photo appears centered. Press ESC to close. Click × to close. Use ← → arrows to navigate (hidden when only 1 photo).

- [ ] **Step 4: Verify homepage button links correctly**

Open homepage, scroll to gallery section — "Lihat Semua Dokumentasi →" button present. Click it → navigates to `/galeri`.

- [ ] **Step 5: Commit**

```bash
git add resources/views/galeri.blade.php
git commit -m "feat: add full galeri page with masonry grid and lightbox"
```
