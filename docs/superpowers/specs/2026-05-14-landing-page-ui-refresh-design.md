# Landing Page UI Refresh — Design Spec

**Date:** 2026-05-14
**Scope:** `public/css/home.css`, `resources/views/components/slider.blade.php`, `resources/views/index.blade.php`

---

## 1. Slider — Edge Peek

**Goal:** Adjacent slides peek ~8% from each side, hinting more content without overwhelming the active slide.

**Current state:**
- `.slider-section .slide.peek-left/peek-right` use `transform: scale(0.85) translateX(±95%)` — pushes slides mostly off-screen
- `.slider-section .slider-wrapper` has `overflow: hidden` in CSS but the translate values are too large to show meaningful peek

**Changes (CSS only — JS already sets peek classes):**
- `.slider-section .slider-wrapper`: ensure `overflow: hidden`, `position: relative`
- `.slider-section .slider`: `display: flex`, `position: relative`, no fixed width
- `.slider-section .slide`: `position: absolute`, `width: 84%`, centered via `left: 8%`
- `.slider-section .slide.active`: `opacity: 1`, `z-index: 2`, `position: relative` (takes up flow space to set wrapper height)
- `.slider-section .slide.peek-left`: `opacity: 0.4`, `transform: translateX(-100%)`, `left: 8%`, `z-index: 1`
- `.slider-section .slide.peek-right`: `opacity: 0.4`, `transform: translateX(100%)`, `right: -92%` adjusted so 8% bleeds in from right, `z-index: 1`
- Remove `scale(0.85)` — no shrinking, just dimming + offset
- Nav buttons remain positioned inside `.slider-wrapper`

**No JS changes required.** Existing `peek-left`/`peek-right` class assignment in `slider.blade.php` is correct.

---

## 2. Course Cards — Landscape 16/9

**Goal:** Cards feel horizontal/rectangular rather than tall portrait. 2-3 per row.

**Current state:**
- `.category-card__thumb`: `aspect-ratio: 4/5` (portrait)
- `.category-card`: `max-width: 280px`, `justify-self: center`
- Grid: 1→2→3→4 col breakpoints

**Changes (`home.css`):**
- `.category-card__thumb`: `aspect-ratio: 16/9`
- `.category-card`: remove `max-width: 280px`, remove `justify-self: center`
- Grid breakpoints: 1-col (default) → 2-col (≥480px) → 3-col (≥1024px) — remove 4-col breakpoint
- `.category-card__mosaic`: `aspect-ratio: 16/9` (was `4/5`)
- `.category-card--span` (Semua Kursus): `grid-column: 1 / -1`, `flex-direction: row`, mosaic `width: 200px`, `flex-shrink: 0`, `aspect-ratio: 16/9`

---

## 3. Promo Video — Centered Above Cards

**Goal:** Video is prominent, centered, ~75% container width, above course grid.

**Current state:**
- `.category-section__layout.has-video`: CSS grid `320px 1fr` side-by-side
- Video panel sits left of course grid
- Course grid gets `.has-video` class reducing it to 2-col

**Changes:**

**`index.blade.php`:**
- Move `<aside class="promo-video-panel">` and its `<script>` **above** `.category-grid` div, outside `.category-section__layout`
- Remove `has-video` class conditionals from `.category-section__layout` and `.category-grid`
- Remove `category-card--span` class from "Semua Kursus" card (no longer needs special span behavior)

**`home.css`:**
- `.promo-video-panel`: `max-width: 75%`, `margin: 0 auto 2rem`, remove side-panel sizing
- `.category-section__layout.has-video`: remove grid override — layout is always single column flex
- `.category-grid.has-video` overrides: remove entirely
- `.category-grid.has-video .category-card--span` overrides: remove entirely

---

## 4. Section Padding

**Goal:** Reduce vertical whitespace by ~half between sections.

**Current:** `--section-v: clamp(3rem, 6vw, 5rem)`

**Change (`home.css` `:root`):**
```css
--section-v: clamp(1.5rem, 3vw, 2rem);
```

Also update `.category-section` padding which has its own inline `clamp(3rem, 6vw, 5rem)` — change to `clamp(1.5rem, 3vw, 2rem)`.

---

## 5. Section Subheader (h2) — Unified Larger Size

**Goal:** All section h2 titles bigger and consistent.

**Current (scattered):**
- Testimoni h2: `clamp(1.8rem, 4vw, 2.8rem)`
- Gallery h2: `clamp(2rem, 3.5vw, 3rem)`
- Univ h2: `clamp(1.5rem, 4vw, 3rem)`
- Programs h2: `clamp(1.8rem, 4vw, 2.8rem)`

**Change:** Unify all to `clamp(2.2rem, 4.5vw, 3.2rem)` in `home.css`. Update each selector individually (4 locations).

---

## Files Changed

| File | Changes |
|---|---|
| `public/css/home.css` | Slider peek CSS, card aspect-ratio, grid breakpoints, video panel layout, `--section-v`, h2 sizes |
| `resources/views/index.blade.php` | Video panel moved above grid, `has-video` class conditionals removed |
| `resources/views/components/slider.blade.php` | No changes |

---

## Out of Scope

- Slider JS logic — no changes
- Admin panel
- Any page other than the home landing page
- Mobile-specific breakpoints beyond what grid changes naturally handle
