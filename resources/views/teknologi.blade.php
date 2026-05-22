@php
    $features = [
        'Solusi cloud privat yang sangat terkonvergensi',
        'Marketplace untuk aplikasi Open Source',
        'Lingkungan Cloud yang aman (siap untuk Keamanan Pasca Kuantum)',
        'Desain berdasarkan persyaratan klien dan dapat ditingkatkan',
        'Sistem Cloud Privat Multi Tenancy',
        'Sistem dukungan tambahan 24/7',
    ];
@endphp

<x-kurikulum cssFile="course" cssKurikulum=true title="Teknologi">
    <x-course.hero
        eyebrow="Tentang Kami"
        title="Teknologi"
        tagline="Dukungan Cloud Computing berkinerja tinggi dari Virtalus HyperCX." />

    <x-course.section eyebrow="Overview" title="Infrastruktur Cloud Parallaxnet" variant="overview">
        <p>Parallaxnet ditenagai oleh platform Virtalus HyperCX — solusi cloud privat berperforma tinggi yang dirancang untuk lingkungan pembelajaran skala besar dengan jaminan keamanan dan ketersediaan.</p>
    </x-course.section>

    <x-course.section eyebrow="Fitur" title="Yang ditawarkan platform">
        <x-course.features :items="$features" />
    </x-course.section>

    <x-course.cta />
</x-kurikulum>
