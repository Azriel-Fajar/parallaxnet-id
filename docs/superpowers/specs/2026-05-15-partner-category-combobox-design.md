# Partner Category Combobox — Design Spec
Date: 2026-05-15

## Goal
Replace the static `<datalist>` category input in the admin partner (mitra) upload form with a vanilla JS combobox that shows existing DB categories as a filterable dropdown while still allowing free-text new categories. Group the partner gallery by category.

## Scope
- `AdminController::university()` — pass additional data
- `resources/views/components/admin/upload-university.blade.php` — combobox + grouped gallery
- No DB migration, no new models, no new routes

---

## 1. Controller Changes

**File:** `app/Http/Controllers/AdminController.php`, method `university()`

Pass two additional variables to the view:

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

    // Sort: named categories alphabetical, 'Tanpa Kategori' last
    $named = $univGrouped->except('Tanpa Kategori')->sortKeys();
    $uncategorized = $univGrouped->only('Tanpa Kategori');
    $univGrouped = $named->merge($uncategorized);

    return view('admin.pages.university', compact('univ', 'categories', 'univGrouped'));
}
```

`$categories` — sorted array of distinct non-null category strings, JSON-encoded into the component for the combobox JS.
`$univGrouped` — collection keyed by category name, named categories first (alphabetical), "Tanpa Kategori" last.

---

## 2. Combobox UI

**File:** `resources/views/components/admin/upload-university.blade.php`

Replace:
```html
<input type="text" name="category" class="input" placeholder="..." list="partner-categories">
<datalist id="partner-categories">...</datalist>
```

With a vanilla JS combobox:

### HTML structure
```html
<div class="combobox-wrapper" style="position:relative;">
    <input type="hidden" name="category" id="category-hidden">
    <input type="text" id="category-display" class="input" placeholder="Kategori (pilih atau ketik baru)" autocomplete="off">
    <div id="category-dropdown" class="combobox-dropdown" style="display:none;..."></div>
</div>
```

### Behavior
- On focus/input: show dropdown panel, filter options by typed text (case-insensitive)
- Options = DB categories (`$categories` JSON-encoded into a `const categories = [...]` JS variable)
- If typed text is non-empty and doesn't exactly match any option: append "Tambah: [typed text]" as last item
- Click option: set hidden input value + display input value, close dropdown
- Click "Tambah: X": set both inputs to X, close dropdown
- Click outside: close dropdown
- Empty input: clear hidden input value (category = null on submit)

### Styling
- Dropdown panel: white background, border, border-radius matching admin card style, `z-index: 100`, max-height with scroll
- Each option: hover highlight matching admin table row hover
- "Tambah: X" item: italic or slightly muted style to distinguish from existing options

---

## 3. Grouped Gallery

Replace flat `@foreach ($univ as $university)` with grouped rendering:

```blade
@foreach ($univGrouped as $categoryName => $items)
    <div class="partner-group">
        <h5 class="partner-group-title">{{ $categoryName }}</h5>
        <div class="gallery-list">
            @foreach ($items as $university)
                {{-- existing .gallery-item card with delete form --}}
            @endforeach
        </div>
    </div>
@endforeach
```

Group header `<h5>` uses existing admin typography. No change to the individual card or delete form.

---

## Error Handling
- Category field remains `nullable` in validation — no change to `AdminController::uploadUniversity()`
- Empty combobox submits no `category` value → `null` stored → appears under "Tanpa Kategori" group
- No JS errors if `$categories` is empty (combobox just shows "Tambah: X" for any input)

---

## Out of Scope
- Renaming/merging categories
- Deleting categories (they disappear naturally when all logos in that category are deleted)
- Reordering categories
