<x-app-layout cssFile="galeri">
    <main>
        <section class="galeri-header">
            <div class="container">
                <h1 id="galeri-title">Galeri Parallaxnet</h1>
            </div>
        </section>

        <section class="galeri-section">
            <div class="container">
                @if ($images->isNotEmpty())
                    <div class="masonry-grid">
                        @foreach ($images as $image)
                            <div class="masonry-item" data-src="{{ asset('storage/' . $image->filename) }}">
                                <img src="{{ asset('storage/' . $image->filename) }}" alt="" loading="lazy">
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="empty-state">Belum ada galeri saat ini.</p>
                @endif
            </div>
        </section>

        {{-- Lightbox --}}
        <div id="lightbox" class="lightbox" role="dialog" aria-modal="true" aria-labelledby="galeri-title">
            <button id="lightbox-close" class="lightbox__close" aria-label="Tutup">&times;</button>
            <button id="lightbox-prev" class="lightbox__arrow lightbox__arrow--prev" aria-label="Sebelumnya">&#8592;</button>
            <img id="lightbox-img" class="lightbox__img" src="" alt="">
            <button id="lightbox-next" class="lightbox__arrow lightbox__arrow--next" aria-label="Berikutnya">&#8594;</button>
        </div>
    </main>

    <script src="{{ asset('js/galeri.js') }}"></script>
</x-app-layout>
