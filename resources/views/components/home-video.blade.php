@php
    $video = \App\Models\HomeVideo::current();
@endphp

@if ($video)
    <div class="video-block">
        <iframe src="{{ $video->embedUrl() }}"
            allow="autoplay; fullscreen; picture-in-picture"
            allowfullscreen
            loading="lazy"
            style="width:100%;aspect-ratio:16/9;border:0;border-radius:8px;">
        </iframe>
    </div>
@endif
