# Video Compression — Design Spec
_Date: 2026-05-15_

## Goal

Automatically compress uploaded promo videos (MP4) server-side after upload, without blocking the admin upload request.

## Approach

Queue-based FFmpeg compression. Upload stores raw file → dispatches `CompressVideo` job → queue worker compresses in background → replaces original file in-place.

## Data Flow

```
uploadVideo() 
  → Storage::putFileAs() stores raw MP4
  → HomeVideo::create() saves record
  → CompressVideo::dispatch($video->id)

[Queue Worker]
  CompressVideo::handle()
    → shell ffmpeg (CRF 28, max 1280p, libx264, AAC 128k, faststart)
    → overwrite storage file
    → HomeVideo->update([compressed_at => now()])

[On failure (max 3 attempts)]
  → HomeVideo->update([compression_failed => true])
```

## FFmpeg Command

```bash
ffmpeg -i {input} -vf "scale='min(1280,iw)':-2" \
  -c:v libx264 -crf 28 -preset slow \
  -movflags +faststart \
  -c:a aac -b:a 128k \
  {output} -y
```

WebM is not compressed (already efficient; re-encoding degrades quality unpredictably).

## New Components

### `app/Jobs/CompressVideo.php`
- Implements `ShouldQueue`
- `$tries = 3`
- Constructor receives `HomeVideo $video` (model binding)
- `handle()`: resolve absolute path from `Storage::disk('public')->path($video->filename)`, run FFmpeg via `Process` (Symfony, already in Laravel), overwrite in-place, update `compressed_at`
- `failed()`: set `compression_failed = true` on the model

### Migration: `add_compression_columns_to_home_videos`
- `compressed_at` — `nullable timestamp`
- `compression_failed` — `boolean default false`

## Modified Components

### `AdminController::uploadVideo()`
After `HomeVideo::create(...)`, add:
```php
CompressVideo::dispatch($video);
```

### `admin.pages.video` Blade
Status badge per video row:
- `compression_failed = true` → red badge "Kompresi gagal"
- `compressed_at = null` → yellow badge "Mengompresi…"
- otherwise → green badge "Terkompresi"

## Prerequisites

FFmpeg must be installed and accessible on the server PATH before the queue worker runs jobs. On Windows/XAMPP: download FFmpeg static build, add `bin/` folder to system PATH.

## Error Handling

| Scenario | Behavior |
|----------|----------|
| FFmpeg not in PATH | Job fails after 3 attempts; `compression_failed = true`; video still serves (uncompressed) |
| FFmpeg error (corrupt input) | Same as above |
| Job success | `compressed_at` set; file replaced in-place; same filename/URL |

## Out of Scope

- WebM compression
- Re-compression of existing videos
- Progress bar (polling) — badge is sufficient
