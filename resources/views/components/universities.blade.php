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
