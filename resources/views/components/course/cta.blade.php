@props([
    'href' => 'https://wa.me/6285788220000',
    'label' => 'Daftar Sekarang',
    'kicker' => 'Siap memulai?',
    'title' => 'Ambil langkah berikutnya.',
    'lead' => 'Hubungi tim kami via WhatsApp untuk info pendaftaran, jadwal, dan subsidi.',
])

<section class="course-cta">
    @if($kicker)
        <span class="course-cta__kicker">{{ $kicker }}</span>
    @endif
    @if($title)
        <h2 class="course-cta__title">{{ $title }}</h2>
    @endif
    @if($lead)
        <p class="course-cta__lead">{{ $lead }}</p>
    @endif
    <a href="{{ $href }}" target="_blank" rel="noopener" class="cta-button cta-accent">
        {{ $label }}
    </a>
</section>
