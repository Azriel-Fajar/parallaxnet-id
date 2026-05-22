# Partner Category Combobox Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Replace the static datalist category input on the admin partner upload form with a vanilla JS combobox fed by DB categories, group the admin gallery by category, and flatten the public landing page partner section into a single row of logos.

**Architecture:** `AdminController::university()` passes `$categories` + `$univGrouped` to the admin view. `app/View/Components/Universities.php` passes a flat `$partners` collection to the public view. The admin Blade component renders a combobox widget + grouped gallery. The public `universities.blade.php` renders one flat `partner-logos` div. CSS for the combobox goes into `public/css/admin.css`. No new routes, models, or migrations.

**Tech Stack:** Laravel 12, Blade components, vanilla JS, existing `public/css/admin.css`, existing `public/css/home.css`

---

## File Map

| File | Action | What changes |
|------|--------|--------------|
| `app/Http/Controllers/AdminController.php` | Modify | `university()` passes `$categories` + `$univGrouped` |
| `resources/views/components/admin/upload-university.blade.php` | Modify | Combobox widget + grouped gallery |
| `public/css/admin.css` | Modify | `.combobox-*` + `.partner-group` styles |
| `app/View/Components/Universities.php` | Modify | Pass flat `$partners` instead of `$groupedPartners` |
| `resources/views/components/universities.blade.php` | Modify | Single flat partner-logos div, no category groups |

---

## Task 1: Update AdminController to pass categories and grouped data

**Files:**
- Modify: `app/Http/Controllers/AdminController.php:58-61`

- [ ] **Step 1: Open the controller and locate the `university()` method**

In `app/Http/Controllers/AdminController.php`, find:
```php
public function university()
{
    return view('admin.pages.university', ['univ' => UnivImages::latest('id')->get()]);
}
```

- [ ] **Step 2: Replace the method body**

Replace the entire method with:
```php
public function university()
{
    $univ = UnivImages::latest('id')->get();

    $categories = UnivImages::whereNotNull('category')
        ->distinct()
        ->pluck('category')
        ->sort()
        ->values();

    $univGrouped = $univ->groupBy(fn($u) => $u->category ?: 'Tanpa Kategori');

    $named        = $univGrouped->except('Tanpa Kategori')->sortKeys();
    $uncategorized = $univGrouped->only('Tanpa Kategori');
    $univGrouped  = $named->merge($uncategorized);

    return view('admin.pages.university', compact('univ', 'categories', 'univGrouped'));
}
```

- [ ] **Step 3: Verify the page loads without error**

Start XAMPP (Apache + MySQL), open a browser to `http://localhost/Parallaxnet%20ID/public/admin/partners` (or whatever the local URL is), confirm no 500 error. The page should still render — the component will receive the new variables but we haven't changed the component yet so it will fall back gracefully (the `$univ` variable is still passed).

- [ ] **Step 4: Commit**

```bash
git add app/Http/Controllers/AdminController.php
git commit -m "feat: pass categories and grouped partner data to university view"
```

---

## Task 2: Add combobox and partner-group CSS

**Files:**
- Modify: `public/css/admin.css`

- [ ] **Step 1: Open `public/css/admin.css` and find the GALLERY section**

Search for the comment block:
```css
/* ============================================================
   GALLERY (existing list pattern reused everywhere)
   ============================================================ */
```

- [ ] **Step 2: Append new CSS after the last `.gallery-item` rule (after line ending `border-radius: var(--r-sm);` for gallery-item video)**

Find the end of the gallery block (after `.gallery-item video { ... }`) and add:

```css
/* ============================================================
   PARTNER GROUP (category grouping in university/partners page)
   ============================================================ */
.partner-group {
    margin-bottom: 1.5rem;
}

.partner-group-title {
    font-size: 0.78rem;
    font-weight: 600;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.06em;
    margin-bottom: 0.5rem;
    padding-bottom: 0.4rem;
    border-bottom: 1px solid var(--border);
}

/* ============================================================
   COMBOBOX (vanilla JS category picker)
   ============================================================ */
.combobox-wrapper {
    position: relative;
    width: 100%;
}

.combobox-dropdown {
    position: absolute;
    top: calc(100% + 4px);
    left: 0;
    right: 0;
    background: var(--bg-card);
    border: 1px solid var(--border-strong);
    border-radius: var(--r-sm);
    box-shadow: var(--shadow-md);
    z-index: 200;
    max-height: 200px;
    overflow-y: auto;
}

.combobox-option {
    padding: 0.55rem 0.85rem;
    font-size: 0.9rem;
    color: var(--text-primary);
    cursor: pointer;
    transition: background 0.1s;
}

.combobox-option:hover,
.combobox-option.active {
    background: var(--bg-content);
}

.combobox-option--new {
    font-style: italic;
    color: var(--text-secondary);
    border-top: 1px solid var(--border);
}

.combobox-option--empty {
    font-style: italic;
    color: var(--text-muted);
    cursor: default;
    pointer-events: none;
}
```

- [ ] **Step 3: Verify CSS file saves without syntax errors**

Hard-refresh `http://localhost/Parallaxnet%20ID/public/admin/partners` in browser. No visual regressions on the partners page.

- [ ] **Step 4: Commit**

```bash
git add public/css/admin.css
git commit -m "feat: add combobox and partner-group CSS to admin stylesheet"
```

---

## Task 3: Replace upload form with combobox + grouped gallery in Blade component

**Files:**
- Modify: `resources/views/components/admin/upload-university.blade.php`

- [ ] **Step 1: Open the component**

Current content of `resources/views/components/admin/upload-university.blade.php`:
```blade
<div class="admin-card">
    <h3>Upload Partner Logo</h3>

    <form action="{{ route('admin.upload.university') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="filename" class="input" required accept="image/*" onchange="previewImage(this, 'univ-preview')">
        <div id="univ-preview" style="display:none;margin:0.5rem 0;">
            <img src="" alt="Preview" style="max-width:100%;max-height:200px;border-radius:6px;border:1px solid #e5e7eb;">
        </div>
        <input type="text" name="category" class="input" placeholder="Kategori (cth: Universitas, Industri, Pemerintah)" list="partner-categories">
        <datalist id="partner-categories">
            <option value="Universitas">
            <option value="Industri">
            <option value="Pemerintah">
            <option value="Komunitas">
        </datalist>
        <button type="submit" class="btn-primary">Upload Partner</button>
    </form>

    <h4>Partner Saat Ini:</h4>

    <div class="gallery-list">
        @foreach ($univ as $university)
            <div class="gallery-item">
                <img src="{{ asset('storage/' . $university->filename) }}" alt="img">
                <p>{{ $university->category ?: 'Tanpa Kategori' }}</p>

                <form action="{{ route('admin.delete.university', $university->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn">Hapus</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
```

- [ ] **Step 2: Replace the entire file content**

Replace with:
```blade
@php
    $categoriesJson = json_encode($categories->values()->all());
@endphp

<div class="admin-card">
    <h3>Upload Partner Logo</h3>

    <form action="{{ route('admin.upload.university') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="filename" class="input" required accept="image/*" onchange="previewImage(this, 'univ-preview')">
        <div id="univ-preview" style="display:none;margin:0.5rem 0;">
            <img src="" alt="Preview" style="max-width:100%;max-height:200px;border-radius:6px;border:1px solid #e5e7eb;">
        </div>

        <div class="combobox-wrapper">
            <input type="hidden" name="category" id="category-hidden">
            <input type="text" id="category-display" class="input" placeholder="Kategori (pilih atau ketik baru)" autocomplete="off">
            <div id="category-dropdown" class="combobox-dropdown" style="display:none;"></div>
        </div>

        <button type="submit" class="btn-primary">Upload Partner</button>
    </form>

    <h4>Partner Saat Ini:</h4>

    @forelse ($univGrouped as $categoryName => $items)
        <div class="partner-group">
            <div class="partner-group-title">{{ $categoryName }}</div>
            <div class="gallery-list">
                @foreach ($items as $university)
                    <div class="gallery-item">
                        <img src="{{ asset('storage/' . $university->filename) }}" alt="img">
                        <form action="{{ route('admin.delete.university', $university->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn">Hapus</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <p style="color:var(--text-muted);font-size:0.88rem;">Belum ada partner logo.</p>
    @endforelse
</div>

<script>
(function () {
    const categories = {!! $categoriesJson !!};
    const display    = document.getElementById('category-display');
    const hidden     = document.getElementById('category-hidden');
    const dropdown   = document.getElementById('category-dropdown');

    function renderOptions(query) {
        const q       = query.trim().toLowerCase();
        const matches = categories.filter(c => c.toLowerCase().includes(q));

        dropdown.innerHTML = '';

        if (matches.length === 0 && q === '') {
            const empty = document.createElement('div');
            empty.className = 'combobox-option combobox-option--empty';
            empty.textContent = 'Belum ada kategori tersimpan';
            dropdown.appendChild(empty);
        } else {
            matches.forEach(cat => {
                const opt = document.createElement('div');
                opt.className = 'combobox-option';
                opt.textContent = cat;
                opt.addEventListener('mousedown', (e) => {
                    e.preventDefault();
                    display.value = cat;
                    hidden.value  = cat;
                    closeDropdown();
                });
                dropdown.appendChild(opt);
            });
        }

        const exactMatch = categories.some(c => c.toLowerCase() === q);
        if (q !== '' && !exactMatch) {
            const addOpt = document.createElement('div');
            addOpt.className = 'combobox-option combobox-option--new';
            addOpt.textContent = 'Tambah: ' + query.trim();
            addOpt.addEventListener('mousedown', (e) => {
                e.preventDefault();
                display.value = query.trim();
                hidden.value  = query.trim();
                closeDropdown();
            });
            dropdown.appendChild(addOpt);
        }
    }

    function openDropdown() {
        renderOptions(display.value);
        dropdown.style.display = 'block';
    }

    function closeDropdown() {
        dropdown.style.display = 'none';
    }

    display.addEventListener('focus', openDropdown);

    display.addEventListener('input', function () {
        hidden.value = display.value.trim();
        renderOptions(display.value);
        dropdown.style.display = 'block';
    });

    display.addEventListener('blur', function () {
        // blur fires before mousedown on option — delay so mousedown can fire first
        setTimeout(closeDropdown, 150);
    });

    // Clear hidden when display is cleared
    display.addEventListener('change', function () {
        if (display.value.trim() === '') {
            hidden.value = '';
        }
    });
})();
</script>
```

- [ ] **Step 3: Test the combobox — existing categories**

1. Open `http://localhost/Parallaxnet%20ID/public/admin/partners`
2. Click the category input field
3. If any partner logos with categories exist in the DB, those categories should appear in the dropdown
4. Type a partial match — dropdown should filter to matching options only
5. Click an option — input should fill and dropdown close

- [ ] **Step 4: Test the combobox — new category**

1. Type a category name that does not exist in the DB (e.g. "TestBaru")
2. Dropdown should show "Tambah: TestBaru" as the last option
3. Click it — input fills with "TestBaru", dropdown closes
4. Upload a logo with that category and confirm it saves correctly (check DB or page refresh)

- [ ] **Step 5: Test the combobox — empty submit**

1. Leave category field blank
2. Upload a logo — it should save with `category = null`
3. After page reload, logo appears under "Tanpa Kategori" group in the gallery

- [ ] **Step 6: Test grouped gallery**

1. Ensure at least 2 different category values exist in DB
2. Reload the partners page
3. Each category should have its own section with a bold header
4. "Tanpa Kategori" group should appear last (if any null-category logos exist)

- [ ] **Step 7: Commit**

```bash
git add resources/views/components/admin/upload-university.blade.php
git commit -m "feat: replace datalist with vanilla JS combobox and group gallery by category"
```

---

## Task 4: Flatten public landing page partner section

**Files:**
- Modify: `app/View/Components/Universities.php`
- Modify: `resources/views/components/universities.blade.php`

- [ ] **Step 1: Update the view component class**

Current content of `app/View/Components/Universities.php`:
```php
<?php

namespace App\View\Components;

use App\Models\UnivImages;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Universities extends Component
{
    public $groupedPartners;

    public function __construct()
    {
        $this->groupedPartners = UnivImages::orderBy('category')->get()->groupBy('category');
    }

    public function render(): View|Closure|string
    {
        return view('components.universities');
    }
}
```

Replace the entire file with:
```php
<?php

namespace App\View\Components;

use App\Models\UnivImages;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Universities extends Component
{
    public $partners;

    public function __construct()
    {
        $this->partners = UnivImages::orderBy('category')->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.universities');
    }
}
```

- [ ] **Step 2: Update the Blade view**

Current content of `resources/views/components/universities.blade.php`:
```blade
<section class="partners-section">
    <div class="container">
        <h2>Partners</h2>

        @if ($groupedPartners->isNotEmpty())
            @foreach ($groupedPartners as $category => $logos)
                <div class="partner-group">
                    <h3>{{ $category ?: '' }}</h3>
                    <div class="partner-logos">
                        @foreach ($logos as $logo)
                            <img src="{{ asset('storage/' . $logo->filename) }}" alt="">
                        @endforeach
                    </div>
                </div>
            @endforeach
        @else
            <p class="empty-state">Belum ada partner saat ini.</p>
        @endif
    </div>
</section>
```

Replace the entire file with:
```blade
<section class="partners-section">
    <div class="container">
        <h2>Partners</h2>

        @if ($partners->isNotEmpty())
            <div class="partner-logos">
                @foreach ($partners as $logo)
                    <img src="{{ asset('storage/' . $logo->filename) }}" alt="">
                @endforeach
            </div>
        @else
            <p class="empty-state">Belum ada partner saat ini.</p>
        @endif
    </div>
</section>
```

- [ ] **Step 3: Verify landing page**

Open `http://localhost/Parallaxnet%20ID/public` in the browser. Scroll to the Partners section. All logos should appear in one flat, centered row (wrapping on small screens). No category headers visible. No 500 error.

- [ ] **Step 4: Commit**

```bash
git add app/View/Components/Universities.php resources/views/components/universities.blade.php
git commit -m "feat: flatten public partner section into single logo row"
```

---

## Task 5: Verify end-to-end and edge cases

- [ ] **Step 1: Test with zero categories in DB**

If the `univ_images` table has no rows with a non-null category, open the category input — dropdown should show "Belum ada kategori tersimpan". No JS errors in browser console.

- [ ] **Step 2: Test with zero logos in DB**

If `univ_images` is empty, the gallery section should show the empty-state message "Belum ada partner logo." (from `@forelse ... @empty`).

- [ ] **Step 3: Verify no regression on other admin pages**

Navigate to Slider, News, Documents pages in admin — confirm gallery lists and forms still work normally (no CSS bleed from new rules).

- [ ] **Step 4: Verify landing page empty state**

If `univ_images` is empty, the public Partners section should show "Belum ada partner saat ini." — same as before.

- [ ] **Step 5: Final commit if any fixes were needed**

```bash
git add -p
git commit -m "fix: edge case handling for partner combobox and landing page"
```
