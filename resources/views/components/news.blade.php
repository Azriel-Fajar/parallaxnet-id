@if ($images->isEmpty())
    <p class="no-news">Tidak ada berita tersedia saat ini.</p>
@endif

@foreach ($images as $news)
    <div class="card">
        <a target="_blank" href="{{ $news->news_link }}">
            <img src="{{ asset('storage/'.$news->news_img_filename) }}" alt="{{ $news->news_title }}">
            <div class="overlay"></div>
            <div class="card-content">
                <span class="card-category">Berita</span>
                <p class="card-title">{{ $news->news_title }}</p>
                <div class="card-author">
                    <span></span>
                    <p>{{ $news->news_author ?? 'Parallaxnet' }}</p>
                </div>
            </div>
        </a>
    </div>
@endforeach
