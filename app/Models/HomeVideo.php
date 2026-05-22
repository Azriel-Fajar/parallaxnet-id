<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeVideo extends Model
{
    protected $fillable = ['video_url', 'embed_type', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public static function detectType(string $url): ?string
    {
        if (preg_match('/youtube\.com\/watch\?.*v=|youtu\.be\/|youtube\.com\/shorts\/|youtube\.com\/embed\//', $url)) {
            return 'youtube';
        }
        if (preg_match('/drive\.google\.com\/file\/d\/|drive\.google\.com\/open\?id=/', $url)) {
            return 'drive';
        }
        return null;
    }

    public function embedUrl(): string
    {
        if ($this->embed_type === 'youtube') {
            preg_match('/(?:v=|youtu\.be\/|shorts\/|embed\/)([a-zA-Z0-9_-]{11})/', $this->video_url, $m);
            return 'https://www.youtube.com/embed/' . urlencode($m[1] ?? '');
        }

        if ($this->embed_type === 'drive') {
            if (!preg_match('/\/file\/d\/([^\/?\#]+)/', $this->video_url, $m)) {
                preg_match('/[?&]id=([^&]+)/', $this->video_url, $m);
            }
            return 'https://drive.google.com/file/d/' . urlencode($m[1] ?? '') . '/preview';
        }

        return '';
    }

    public static function current(): ?self
    {
        return static::where('is_active', true)->first();
    }

    public function activate(): void
    {
        static::where('is_active', true)->update(['is_active' => false]);
        $this->update(['is_active' => true]);
    }
}
