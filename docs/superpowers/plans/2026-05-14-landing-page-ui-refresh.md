# Landing Page UI Refresh Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Refresh the home landing page UI — edge-peek slider, landscape course cards, prominent centered video, tighter section padding, and unified larger section h2 headings.

**Architecture:** Pure CSS + minimal Blade restructure. No JS changes. All changes isolated to `public/css/home.css` and `resources/views/index.blade.php`. The slider JS already assigns `peek-left`/`peek-right` classes — only CSS needs updating to position slides in a horizontal track.

**Tech Stack:** Laravel 12 Blade, vanilla CSS (no preprocessor), XAMPP/PHP 8.2. Dev server: `composer run dev`. View at `http://localhost:8000` (or XAMPP port).

---

## File Map

| File | What changes |
|---|---|
| `public/css/home.css` | Tasks 1, 2, 3, 4, 5 |
| `resources/views/index.blade.php` | Task 3 only |

---

### Task 1: Slider — Edge Peek CSS

**Files:**
- Modify: `public/css/home.css` (slider section, lines ~1085–1140)

- [ ] **Step 1: Open `public/css/home.css` and locate the slider peek block**

Find this comment and the rules below it (around line 1085):
```
/* === Slider peek redesign === */
```
The existing rules for `.slider-section .slide`, `.slide.active`, `.slide.peek-left`, `.slide.peek-right` all live here.

- [ ] **Step 2: Replace the slider peek CSS block**

Replace the entire block from `/* === Slider peek redesign === */` down to (and including) the `.slider-section .slide img` rule with:

```css
/* === Slider peek redesign === */
.slider-section {
    padding: var(--section-v) 0;
}

.slider-section .slider-wrapper {
    position: relative;
    overflow: hidden;
    width: 100%;
}

.slider-section .slider {
    position: relative;
    width: 100%;
    /* height set by JS via slider.style.height */
}

/* All slides sit in absolute position within the track */
.slider-section .slide {
    position: absolute;
    top: 0;
    width: 84%;
    left: 8%;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.4s ease, transform 0.4s ease;
    transform: translateX(0);
}

/* Active slide sits in normal flow to give the wrapper its height */
.slider-section .slide.active {
    position: relative;
    opacity: 1;
    pointer-events: auto;
    transform: translateX(0);
    z-index: 2;
    left: 8%;
    width: 84%;
}

/* Left peek: shifted left, 8% bleeds in from left edge */
.slider-section .slide.peek-left {
    opacity: 0.4;
    transform: translateX(-100%);
    z-index: 1;
}

/* Right peek: shifted right, 8% bleeds in from right edge */
.slider-section .slide.peek-right {
    opacity: 0.4;
    transform: translateX(100%);
    z-index: 1;
}

.slider-section .slide img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
    border-radius: 12px;
    box-shadow: 0 6px 24px rgba(0, 0, 0, 0.15);
}
```

- [ ] **Step 3: Verify nav buttons still show**

The `.nav-btn.prev` and `.nav-btn.next` rules are in the earlier `main .slider-section` block (around lines 412–437). Confirm they still read:
```css
main .slider-section .nav-btn.prev { left: 10px; }
main .slider-section .nav-btn.next { right: 10px; }
```
These are scoped to `main .slider-section` — they won't conflict. No changes needed.

- [ ] **Step 4: Start dev server and verify slider visually**

```bash
composer run dev
```

Open `http://localhost:8000` in browser. With slider images uploaded in admin:
- Active slide occupies ~84% width, centered
- Left and right slides peek ~8% from each edge, dimmed (opacity ~0.4)
- Prev/Next buttons still work
- Auto-scroll still advances slides

- [ ] **Step 5: Commit**

```bash
git add public/css/home.css
git commit -m "feat: slider edge-peek — adjacent slides visible at 8% each side"
```

---

### Task 2: Course Cards — Landscape 16/9

**Files:**
- Modify: `public/css/home.css` (category card and grid rules, lines ~1140–1310)

- [ ] **Step 1: Change card thumb aspect ratio**

Find `.category-card__thumb` (around line 1194):
```css
.category-card__thumb {
    width: 100%;
    aspect-ratio: 4 / 5;
    ...
}
```
Change `aspect-ratio: 4 / 5` → `aspect-ratio: 16 / 9`.

- [ ] **Step 2: Remove max-width and justify-self from `.category-card`**

Find `.category-card` (around line 1174):
```css
.category-card {
    ...
    max-width: 280px;
    width: 100%;
    justify-self: center;
}
```
Remove both `max-width: 280px` and `justify-self: center` lines. Leave all other properties intact.

- [ ] **Step 3: Update grid breakpoints — remove 4-col, cap at 3-col**

Find the three `@media` blocks for `.category-grid` (around lines 1156–1172):

```css
@media (min-width: 480px) {
    .category-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (min-width: 768px) {
    .category-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

@media (min-width: 1200px) {
    .category-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }
}
```

Replace with:
```css
@media (min-width: 480px) {
    .category-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (min-width: 1024px) {
    .category-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}
```

(Delete the `min-width: 768px` and `min-width: 1200px` blocks entirely, replace with the single `1024px` block above.)

- [ ] **Step 4: Update mosaic aspect ratio**

Find `.category-card__mosaic` (around line 1246):
```css
.category-card__mosaic {
    width: 100%;
    aspect-ratio: 4 / 5;
    ...
}
```
Change `aspect-ratio: 4 / 5` → `aspect-ratio: 16 / 9`.

- [ ] **Step 5: Style "Semua Kursus" card as full-width horizontal row**

Find `.category-card--all .category-card__thumb` (around line 1242):
```css
.category-card--all .category-card__thumb {
    display: none;
}
```

Add these rules after it:
```css
.category-card--all {
    grid-column: 1 / -1;
    flex-direction: row;
    max-width: none;
}

.category-card--all .category-card__mosaic {
    width: 200px;
    flex-shrink: 0;
    aspect-ratio: 16 / 9;
}

.category-card--all .category-card__body {
    justify-content: center;
}
```

- [ ] **Step 6: Verify cards visually**

With dev server running, open `http://localhost:8000`:
- Cards are landscape (wider than tall) with 16/9 image on top
- 1-col on mobile, 2-col on medium, 3-col on desktop
- "Semua Kursus" spans full width with mosaic image on left, text on right

- [ ] **Step 7: Commit**

```bash
git add public/css/home.css
git commit -m "feat: course cards landscape 16/9, 3-col grid, semua kursus full-width row"
```

---

### Task 3: Promo Video — Centered Above Cards

**Files:**
- Modify: `public/css/home.css` (promo video panel + category layout rules)
- Modify: `resources/views/index.blade.php`

- [ ] **Step 1: Update `.promo-video-panel` CSS to centered block**

Find `.promo-video-panel` in `home.css` (around line 1310):
```css
.promo-video-panel {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    background: #fff;
    border-radius: 16px;
    padding: 1.25rem;
    box-shadow: 0 4px 20px rgba(29, 70, 110, 0.09);
}
```

Replace with:
```css
.promo-video-panel {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    background: #fff;
    border-radius: 16px;
    padding: 1.25rem;
    box-shadow: 0 4px 20px rgba(29, 70, 110, 0.09);
    max-width: 75%;
    margin: 0 auto 2rem;
}
```

- [ ] **Step 2: Remove has-video grid overrides from CSS**

Find and delete this entire block (around line 1280):
```css
@media (min-width: 1024px) {
    .category-section__layout.has-video {
        display: grid;
        grid-template-columns: 320px 1fr;
        gap: 2rem;
        align-items: start;
    }

    .category-grid.has-video {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .category-grid.has-video .category-card {
        max-width: none;
    }

    .category-grid.has-video .category-card--span {
        grid-column: 1 / -1;
        flex-direction: row;
        max-width: none;
    }

    .category-grid.has-video .category-card--span .category-card__mosaic {
        width: 140px;
        flex-shrink: 0;
        aspect-ratio: 1;
    }
}
```

- [ ] **Step 3: Restructure `index.blade.php` — move video above grid**

Open `resources/views/index.blade.php`. Find the `category-section` block (around line 39–136).

The current structure is:
```html
<div class="category-section__layout {{ ... has-video ... }}">
    {{-- Promo Video Panel --}}
    @if (isset($promoVideos) && $promoVideos->count() > 0)
        <aside class="promo-video-panel" ...>
            ...
        </aside>
        <script>...</script>
    @endif

    {{-- Course grid --}}
    <div class="category-grid {{ ... has-video ... }}">
        ...
        <a ... class="category-card category-card--all {{ ... category-card--span ... }}">
```

Replace the entire `<div class="category-section__layout ...">` wrapper and its contents with:

```html
<div class="category-section__layout">

    {{-- Promo Video Panel (centered, above grid) --}}
    @if (isset($promoVideos) && $promoVideos->count() > 0)
        <aside class="promo-video-panel" id="promoVideoPanel">
            <h3 class="promo-video-panel__title">Video Promosi</h3>
            <div class="promo-video-carousel" id="promoCarousel">
                @foreach ($promoVideos as $i => $vid)
                    <div class="promo-video-slide {{ $i === 0 ? 'active' : '' }}" data-index="{{ $i }}">
                        <video controls preload="metadata" class="promo-video-player">
                            <source src="{{ asset('storage/' . $vid->filename) }}" type="video/mp4">
                        </video>
                    </div>
                @endforeach
            </div>
            @if ($promoVideos->count() > 1)
                <div class="promo-video-nav">
                    <button class="promo-video-btn" id="promoPrev" aria-label="Video sebelumnya">&#8592;</button>
                    <div class="promo-video-dots" id="promoDots">
                        @foreach ($promoVideos as $i => $vid)
                            <button class="promo-dot {{ $i === 0 ? 'active' : '' }}" data-goto="{{ $i }}" aria-label="Video {{ $i + 1 }}"></button>
                        @endforeach
                    </div>
                    <button class="promo-video-btn" id="promoNext" aria-label="Video berikutnya">&#8594;</button>
                </div>
            @endif
        </aside>
        <script>
        (function () {
            const panel = document.getElementById('promoVideoPanel');
            if (!panel) return;
            const slides = panel.querySelectorAll('.promo-video-slide');
            const dots = panel.querySelectorAll('.promo-dot');
            let current = 0;

            function goTo(n) {
                slides[current].classList.remove('active');
                if (dots[current]) dots[current].classList.remove('active');
                slides[current].querySelector('video').pause();
                current = (n + slides.length) % slides.length;
                slides[current].classList.add('active');
                if (dots[current]) dots[current].classList.add('active');
            }

            document.getElementById('promoPrev')?.addEventListener('click', () => goTo(current - 1));
            document.getElementById('promoNext')?.addEventListener('click', () => goTo(current + 1));
            dots.forEach(d => d.addEventListener('click', () => goTo(+d.dataset.goto)));
        })();
        </script>
    @endif

    {{-- Course grid --}}
    <div class="category-grid">
        @foreach ($staticCards as $card)
            <a href="{{ route($card['route']) }}" class="category-card">
                <div class="category-card__thumb">
                    <img src="{{ $card['image'] }}" alt="{{ $card['name'] }}" loading="lazy"
                        onerror="this.style.display='none'">
                </div>
                <div class="category-card__body">
                    <h3>{{ $card['name'] }}</h3>
                    <p>{{ $card['blurb'] }}</p>
                </div>
            </a>
        @endforeach

        {{-- All Courses teaser --}}
        @php
            $mosaicThumbs = collect();
            if (isset($courseCategories)) {
                foreach ($courseCategories as $cat) {
                    foreach ($cat->courses as $c) {
                        if ($c->image) { $mosaicThumbs->push(asset('storage/' . $c->image)); }
                        if ($mosaicThumbs->count() >= 4) { break 2; }
                    }
                }
            }
        @endphp
        <a href="{{ route('courses.all') }}" class="category-card category-card--all">
            <div class="category-card__mosaic">
                @foreach ($mosaicThumbs as $m)
                    <img src="{{ $m }}" alt="" loading="lazy" onerror="this.style.display='none'">
                @endforeach
                @for ($i = $mosaicThumbs->count(); $i < 4; $i++)
                    <div class="category-card__mosaic-slot"></div>
                @endfor
            </div>
            <div class="category-card__body">
                <h3>Semua Kursus</h3>
                <p class="category-card__all-cta">Lihat Semua Kursus &rarr;</p>
            </div>
        </a>
    </div>
</div>
```

- [ ] **Step 4: Verify video panel and grid**

Open `http://localhost:8000` with a promo video uploaded in admin:
- Video appears centered, ~75% page width, above course cards
- Course cards render in full 3-col grid (not compressed to 2-col)
- Without a video uploaded: course grid renders normally, no empty space above

- [ ] **Step 5: Commit**

```bash
git add public/css/home.css resources/views/index.blade.php
git commit -m "feat: promo video centered above course grid at 75% width"
```

---

### Task 4: Section Padding — Tighter

**Files:**
- Modify: `public/css/home.css` (`:root` vars + `.category-section`)

- [ ] **Step 1: Update `--section-v` CSS variable**

Find in `:root` (line ~12):
```css
--section-v: clamp(3rem, 6vw, 5rem);
```
Change to:
```css
--section-v: clamp(1.5rem, 3vw, 2rem);
```

- [ ] **Step 2: Update `.category-section` inline padding**

Find `.category-section` (around line 1141):
```css
.category-section {
    padding: clamp(3rem, 6vw, 5rem) 0;
}
```
Change to:
```css
.category-section {
    padding: clamp(1.5rem, 3vw, 2rem) 0;
}
```

- [ ] **Step 3: Verify padding visually**

Open `http://localhost:8000` — scroll through all sections. Sections should feel tighter but not cramped. Check:
- Slider section
- Gallery section
- Testimoni section
- FAQ section
- Partners section

- [ ] **Step 4: Commit**

```bash
git add public/css/home.css
git commit -m "feat: reduce section vertical padding by half"
```

---

### Task 5: Section h2 — Unified Larger Size

**Files:**
- Modify: `public/css/home.css` (4 h2 size declarations)

- [ ] **Step 1: Update Testimoni h2**

Find (around line 551):
```css
.testimoni .container h2 {
    font-family: 'Poppins', sans-serif;
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    font-weight: 700;
    color: var(--secondary);
}
```
Change `font-size` to `clamp(2.2rem, 4.5vw, 3.2rem)`.

- [ ] **Step 2: Update Gallery h2**

Find (around line 667):
```css
main .gallery .container h2 {
    font-family: "poppins", sans-serif;
    font-size: clamp(2rem, 3.5vw, 3rem);
}
```
Change `font-size` to `clamp(2.2rem, 4.5vw, 3.2rem)`.

- [ ] **Step 3: Update Partners/Univ h2**

Find (around line 705):
```css
main .univ .container h2 {
    font-family: "poppins", sans-serif;
    font-size: clamp(1.5rem, 4vw, 3rem);
}
```
Change `font-size` to `clamp(2.2rem, 4.5vw, 3.2rem)`.

- [ ] **Step 4: Update Programs h2**

Find (around line 829):
```css
.programs-header h2 {
    font-family: 'Poppins', sans-serif;
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 0.5rem;
}
```
Change `font-size` to `clamp(2.2rem, 4.5vw, 3.2rem)`.

- [ ] **Step 5: Verify headings visually**

Open `http://localhost:8000` — scroll through all sections. All section h2 headings should appear noticeably larger and consistent in size across Testimoni, Gallery, Partners, and Programs sections.

- [ ] **Step 6: Commit**

```bash
git add public/css/home.css
git commit -m "feat: unify section h2 to clamp(2.2rem, 4.5vw, 3.2rem)"
```

---

## Self-Review

**Spec coverage:**
1. Slider edge peek — Task 1 ✓
2. Course cards landscape 16/9 — Task 2 ✓
3. Promo video centered above grid — Task 3 ✓
4. Section padding tighter — Task 4 ✓
5. Section h2 bigger/unified — Task 5 ✓

**Placeholder scan:** No TBDs, TODOs, or vague steps. All code blocks complete.

**Type consistency:** CSS class names consistent throughout — `.category-card--all`, `.promo-video-panel`, `.slider-section`, `.slide.peek-left/peek-right` match existing codebase naming exactly.

**Gap check:** Spec notes "no changes to `slider.blade.php`" — confirmed, no task touches it.
