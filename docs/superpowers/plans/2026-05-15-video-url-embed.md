# Video URL Embed Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Replace file-upload hero video with YouTube/Google Drive iframe embed in the admin panel and homepage.

**Architecture:** Add `video_url` + `embed_type` columns to `home_videos`, drop file columns and delete all existing video files/rows in a single migration. Model gains `detectType()` and `embedUrl()` helpers. Admin form becomes a URL text input; public component renders `<iframe>` instead of `<video>`.

**Tech Stack:** Laravel 12, Blade, MySQL (XAMPP), no new packages required.

---

## File Map

| File | Action |
|------|--------|
| `database/migrations/2026_05_15_XXXXXX_replace_file_columns_on_home_videos.php` | Create |
| `app/Models/HomeVideo.php` | Modify |
| `app/Http/Controllers/AdminController.php` | Modify (`uploadVideo`, `deleteVideo`) |
| `resources/views/components/admin/video-upload.blade.php` | Modify (full rewrite) |
| `resources/views/components/home-video.blade.php` | Modify (full rewrite) |

---

### Task 1: Migration — replace schema + delete existing files/rows

**Files:**
- Create: `database/migrations/2026_05_15_100000_replace_file_columns_on_home_videos.php`

- [ ] **Step 1: Create the migration**

```bash
php artisan make:migration replace_file_columns_on_home_videos
```

- [ ] **Step 2: Fill in the migration**

Open the generated file (timestamp will differ — find it in `database/migrations/`) and replace the entire contents with:

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    public function up(): void
    {
        // Delete all stored video files before dropping columns
        $rows = DB::table('home_videos')->get(['filename', 'filename_webm', 'poster']);
        foreach ($rows as $row) {
            foreach (['filename', 'filename_webm', 'poster'] as $col) {
                if (!empty($row->$col)) {
                    Storage::disk('public')->delete($row->$col);
                }
            }
        }

        DB::table('home_videos')->truncate();

        Schema::table('home_videos', function (Blueprint $table) {
            $table->dropColumn(['filename', 'filename_webm', 'poster']);
        });

        Schema::table('home_videos', function (Blueprint $table) {
            $table->string('video_url');
            $table->enum('embed_type', ['youtube', 'drive']);
        });
    }

    public function down(): void
    {
        Schema::table('home_videos', function (Blueprint $table) {
            $table->dropColumn(['video_url', 'embed_type']);
        });

        Schema::table('home_videos', function (Blueprint $table) {
            $table->string('filename')->default('');
            $table->string('filename_webm')->nullable();
            $table->string('poster')->nullable();
        });
    }
};
```

- [ ] **Step 3: Run the migration**

```bash
php artisan migrate
```

Expected output: `Migrating: 2026_05_15_100000_replace_file_columns_on_home_videos` then `Migrated`.

- [ ] **Step 4: Verify schema**

```bash
php artisan tinker --execute="Schema::getColumnListing('home_videos')"
```

Expected: `['id', 'video_url', 'embed_type', 'created_at', 'updated_at']` (no `filename`, `filename_webm`, `poster`).

- [ ] **Step 5: Commit**

```bash
git add database/migrations/
git commit -m "feat(videos): replace file columns with video_url + embed_type"
```

---

### Task 2: Update `HomeVideo` model

**Files:**
- Modify: `app/Models/HomeVideo.php`

- [ ] **Step 1: Replace the model contents**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeVideo extends Model
{
    use HasFactory;

    protected $fillable = ['video_url', 'embed_type'];

    public static function detectType(string $url): ?string
    {
        if (preg_match('/youtube\.com\/watch\?.*v=|youtu\.be\//', $url)) {
            return 'youtube';
        }
        if (preg_match('/drive\.google\.com\/file\/d\//', $url)) {
            return 'drive';
        }
        return null;
    }

    public function embedUrl(): string
    {
        if ($this->embed_type === 'youtube') {
            preg_match('/(?:v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $this->video_url, $m);
            return 'https://www.youtube.com/embed/' . ($m[1] ?? '');
        }
        // drive
        preg_match('/\/file\/d\/([^\/]+)/', $this->video_url, $m);
        return 'https://drive.google.com/file/d/' . ($m[1] ?? '') . '/preview';
    }

    public static function current(): ?self
    {
        return static::latest('id')->first();
    }
}
```

- [ ] **Step 2: Verify model loads**

```bash
php artisan tinker --execute="var_dump(App\Models\HomeVideo::class)"
```

Expected: `string(22) "App\Models\HomeVideo"` — no parse errors.

- [ ] **Step 3: Spot-check `detectType` and `embedUrl` in tinker**

```bash
php artisan tinker
```

```php
App\Models\HomeVideo::detectType('https://www.youtube.com/watch?v=dQw4w9WgXcQ');
// => "youtube"

App\Models\HomeVideo::detectType('https://drive.google.com/file/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs/view');
// => "drive"

App\Models\HomeVideo::detectType('https://vimeo.com/123');
// => null

$v = new App\Models\HomeVideo(['video_url' => 'https://youtu.be/dQw4w9WgXcQ', 'embed_type' => 'youtube']);
$v->embedUrl();
// => "https://www.youtube.com/embed/dQw4w9WgXcQ"

$v2 = new App\Models\HomeVideo(['video_url' => 'https://drive.google.com/file/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs/view', 'embed_type' => 'drive']);
$v2->embedUrl();
// => "https://drive.google.com/file/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs/preview"
```

Exit tinker: `exit`

- [ ] **Step 4: Commit**

```bash
git add app/Models/HomeVideo.php
git commit -m "feat(videos): add detectType and embedUrl to HomeVideo model"
```

---

### Task 3: Update `AdminController` — `uploadVideo` and `deleteVideo`

**Files:**
- Modify: `app/Http/Controllers/AdminController.php`

- [ ] **Step 1: Remove unused imports**

At the top of `AdminController.php`, find and remove these use statements if they now have no other references:

```php
use Illuminate\Support\Str;          // used by Str::random in old uploadVideo — remove if unused elsewhere
```

Check first — `Str` may be used in other methods. Search the file for other `Str::` usages before removing.

- [ ] **Step 2: Replace `uploadVideo` method**

Find the existing `uploadVideo` method (lines ~239–285) and replace it entirely:

```php
public function uploadVideo(Request $request)
{
    $request->validate([
        'video_url' => ['required', 'url', function ($attribute, $value, $fail) {
            if (!\App\Models\HomeVideo::detectType($value)) {
                $fail('URL harus dari YouTube atau Google Drive.');
            }
        }],
    ]);

    HomeVideo::create([
        'video_url'  => $request->video_url,
        'embed_type' => HomeVideo::detectType($request->video_url),
    ]);

    Alert::toast('Video berhasil disimpan.', 'success');

    return redirect()->back();
}
```

- [ ] **Step 3: Replace `deleteVideo` method**

Find the existing `deleteVideo` method (lines ~287–300) and replace it entirely:

```php
public function deleteVideo($id)
{
    HomeVideo::findOrFail($id)->delete();

    Alert::toast('Video dihapus.', 'success');

    return redirect()->back();
}
```

- [ ] **Step 4: Verify no syntax errors**

```bash
php artisan route:list --path=admin 2>&1 | head -5
```

Expected: route list output, no parse errors.

- [ ] **Step 5: Commit**

```bash
git add app/Http/Controllers/AdminController.php
git commit -m "feat(videos): replace file upload controller logic with URL save"
```

---

### Task 4: Rewrite admin `video-upload.blade.php`

**Files:**
- Modify: `resources/views/components/admin/video-upload.blade.php`

- [ ] **Step 1: Replace the entire file**

```blade
@props(['video', 'videos' => collect()])

<div class="admin-card">
    <h3>Video Promosi</h3>

    <form action="{{ route('admin.upload.video') }}" method="POST">
        @csrf

        <label style="display:block;margin-top:0.5rem;font-size:0.85rem;font-weight:600;">
            Link YouTube atau Google Drive
        </label>
        <input type="url" name="video_url" class="input" required
               placeholder="https://www.youtube.com/watch?v=... atau Google Drive"
               value="{{ old('video_url') }}">

        @error('video_url')
            <p style="color:#e53e3e;font-size:0.8rem;margin-top:0.25rem;">{{ $message }}</p>
        @enderror

        <p style="font-size:0.8rem;color:#666;margin:0.5rem 0 0.75rem;line-height:1.4;">
            Pastikan link bersifat publik (Siapa saja yang punya link dapat menonton).
        </p>

        <button type="submit" class="btn-primary">Simpan Video</button>
    </form>

    <h4>Video Tersimpan ({{ $videos->count() }}):</h4>

    @if ($videos->isEmpty())
        <p>Belum ada video.</p>
    @else
        <div style="display:flex;flex-direction:column;gap:0.75rem;margin-top:0.5rem;">
            @foreach ($videos as $i => $vid)
                <div style="border:1px solid #e5e7eb;border-radius:8px;padding:0.75rem;display:flex;justify-content:space-between;align-items:center;gap:1rem;">
                    <div style="display:flex;flex-direction:column;gap:0.25rem;min-width:0;">
                        <span style="font-size:0.75rem;font-weight:600;text-transform:uppercase;
                              color:{{ $vid->embed_type === 'youtube' ? '#e53e3e' : '#3182ce' }};">
                            {{ $vid->embed_type === 'youtube' ? 'YouTube' : 'Google Drive' }}
                        </span>
                        <span style="font-size:0.8rem;color:#555;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:320px;">
                            {{ $vid->video_url }}
                        </span>
                        <span style="font-size:0.75rem;color:#888;">
                            {{ $vid->created_at->format('d M Y') }}
                            @if ($i === 0) &bull; <strong>Aktif</strong> @endif
                        </span>
                    </div>
                    <form action="{{ route('admin.delete.video', $vid->id) }}" method="POST" style="flex-shrink:0;">
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn" type="submit">Hapus</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
</div>
```

- [ ] **Step 2: Open admin video page in browser and verify**

Navigate to `http://localhost/Parallaxnet%20ID/public/admin/video` (or whichever local URL you use).

Check:
- Form shows URL text input, no file inputs
- Submit with an invalid URL → validation error displayed inline
- Submit with a YouTube URL → success toast, entry appears in list with red "YouTube" badge
- Submit with a Drive URL → success toast, entry appears in list with blue "Google Drive" badge
- Delete button removes the entry

- [ ] **Step 3: Commit**

```bash
git add resources/views/components/admin/video-upload.blade.php
git commit -m "feat(videos): replace file upload form with URL input in admin"
```

---

### Task 5: Rewrite public `home-video.blade.php`

**Files:**
- Modify: `resources/views/components/home-video.blade.php`

- [ ] **Step 1: Replace the entire file**

```blade
@php
    $video = \App\Models\HomeVideo::current();
@endphp

@if ($video)
    <section class="video-block">
        <div class="container">
            <iframe src="{{ $video->embedUrl() }}"
                allow="autoplay; fullscreen; picture-in-picture"
                allowfullscreen
                loading="lazy"
                style="width:100%;aspect-ratio:16/9;border:0;border-radius:8px;">
            </iframe>
        </div>
    </section>
@endif
```

- [ ] **Step 2: Verify homepage renders correctly**

Navigate to `http://localhost/Parallaxnet%20ID/public/` (homepage).

- If no video in DB: video section is hidden entirely — correct.
- After saving a YouTube URL in admin: section shows YouTube iframe.
- After saving a Drive URL in admin: section shows Drive preview iframe.

- [ ] **Step 3: Commit**

```bash
git add resources/views/components/home-video.blade.php
git commit -m "feat(videos): render URL embed iframe on homepage"
```

---

## Self-Review Checklist

**Spec coverage:**
- [x] Schema migration (drop file cols, add url/type, truncate rows, delete files)
- [x] `HomeVideo::detectType()` + `embedUrl()`
- [x] `uploadVideo()` rewritten with URL validation
- [x] `deleteVideo()` simplified (no Storage::delete)
- [x] Admin form → URL input with hint + error display
- [x] Admin list → badge + URL + delete
- [x] Public component → `<iframe>` with empty-state hide
- [x] Compression spec obsoleted (note in spec doc, no job implemented)

**Placeholders:** None.

**Type consistency:** `detectType()` returns `?string`, used in controller as `HomeVideo::detectType($request->video_url)` — consistent. `embedUrl()` called on model instance in blade — consistent.
