# Video URL Embed — Design Spec
_Date: 2026-05-15_

## Goal

Replace file-upload-based hero video with URL embed. Admin pastes a YouTube or Google Drive public link; homepage renders it as an `<iframe>`. No file storage, no FFmpeg, no size limits.

## Decision: Obsoletes Compression Spec

`2026-05-15-video-compression-design.md` is superseded by this spec. The `CompressVideo` job described there should NOT be implemented.

## Approach

Add `video_url` + `embed_type` columns to `home_videos`, drop file columns, delete all existing rows + storage files. Admin form becomes URL input only. Public component renders `<iframe>` instead of `<video>`.

## Schema Migration

Migration: `replace_file_columns_on_home_videos`

**Remove columns:** `filename`, `filename_webm`, `poster`

**Add columns:**
- `video_url` — `string`, not null
- `embed_type` — `enum(['youtube','drive'])`, not null

**Data cleanup in migration:**
1. Delete all files in `storage/app/public/images/video/` (MP4, WebM, posters)
2. Truncate `home_videos` table
3. Drop old columns, add new columns

## Model: `HomeVideo`

```php
protected $fillable = ['video_url', 'embed_type'];

public static function detectType(string $url): ?string
{
    if (preg_match('/youtube\.com\/watch\?.*v=|youtu\.be\//', $url)) return 'youtube';
    if (preg_match('/drive\.google\.com\/file\/d\//', $url)) return 'drive';
    return null;
}

public function embedUrl(): string
{
    if ($this->embed_type === 'youtube') {
        preg_match('/(?:v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $this->video_url, $m);
        return 'https://www.youtube.com/embed/' . ($m[1] ?? '');
    }
    preg_match('/\/file\/d\/([^\/]+)/', $this->video_url, $m);
    return 'https://drive.google.com/file/d/' . ($m[1] ?? '') . '/preview';
}

public static function current(): ?self
{
    return static::latest('id')->first();
}
```

## Controller: `AdminController`

### `uploadVideo()` — replace entirely

```php
public function uploadVideo(Request $request)
{
    $request->validate([
        'video_url' => ['required', 'url', function ($attr, $val, $fail) {
            if (!HomeVideo::detectType($val)) {
                $fail('URL harus dari YouTube atau Google Drive.');
            }
        }],
    ]);

    $type = HomeVideo::detectType($request->video_url);
    HomeVideo::create([
        'video_url'  => $request->video_url,
        'embed_type' => $type,
    ]);

    Alert::toast('Video berhasil disimpan.', 'success');
    return redirect()->back();
}
```

### `deleteVideo()` — simplify

```php
public function deleteVideo($id)
{
    HomeVideo::findOrFail($id)->delete();
    Alert::toast('Video dihapus.', 'success');
    return redirect()->back();
}
```

## Admin Blade: `resources/views/components/admin/video-upload.blade.php`

Replace file inputs with:
- Text input `video_url` — placeholder "https://www.youtube.com/watch?v=... atau Google Drive"
- Helper text: "Pastikan link bersifat publik (Siapa saja yang punya link)"
- Submit button

Video list rows: show `embed_type` badge (YouTube/Drive) + truncated URL + delete button. Remove `<video>` preview and poster column.

## Public Component: `resources/views/components/home-video.blade.php`

```blade
@php $video = \App\Models\HomeVideo::current(); @endphp

@if ($video)
<section class="home-video">
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

## Validation Rules

| Input | Rule |
|-------|------|
| `video_url` | required, valid URL, matches YouTube or Drive pattern |

Error toast on failure via SweetAlert.

## Error Handling

| Scenario | Behavior |
|----------|----------|
| URL not YouTube/Drive | Validation fails, toast error, redirect back |
| Video deleted/made private by owner | iframe shows platform's error UI — acceptable tradeoff |
| No video in DB | Section hidden (existing empty-state rule) |

## Files Changed

| File | Change |
|------|--------|
| `database/migrations/..._replace_file_columns_on_home_videos.php` | New migration |
| `app/Models/HomeVideo.php` | Add `detectType()`, `embedUrl()`, update `$fillable` |
| `app/Http/Controllers/AdminController.php` | Rewrite `uploadVideo()`, simplify `deleteVideo()` |
| `resources/views/components/admin/video-upload.blade.php` | Replace form + list UI |
| `resources/views/components/home-video.blade.php` | Replace `<video>` with `<iframe>` |

## Out of Scope

- Poster/thumbnail upload
- Multiple simultaneous active videos
- Video title/description metadata
- oEmbed preview in admin before saving
