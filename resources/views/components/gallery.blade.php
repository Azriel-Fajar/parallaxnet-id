<section class="gallery-section">
    <div class="container">
        <h2>Galeri Parallaxnet</h2>

        @if ($images->isNotEmpty())
            <div class="gallery-grid">
                @foreach ($images as $i => $image)
                    <a href="{{ asset('storage/' . $image->filename) }}" target="_blank" rel="noopener" class="gallery-item gallery-item--{{ $i % 5 }}">
                        <img src="{{ asset('storage/' . $image->filename) }}" alt="" loading="lazy">
                    </a>
                @endforeach
            </div>
            <div class="gallery-cta">
                <a href="{{ route('galeri') }}" class="gallery-cta__btn">Lihat Semua Dokumentasi &rarr;</a>
            </div>
        @else
            <p class="empty-state">Belum ada galeri saat ini.</p>
        @endif
    </div>
</section>
