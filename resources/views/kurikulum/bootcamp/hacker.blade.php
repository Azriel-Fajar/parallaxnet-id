@php
    $skills = [
        ['title' => 'Advanced Cybersecurity for Professionals'],
        ['title' => 'Basic Ethical Hacking'],
        ['title' => 'Advanced Ethical Hacking'],
    ];

    $features = [
        'LMS (Learning Management System) dengan tiga skill.',
        'Mesin Virtual untuk langganan 2 tahun (2 vCore, 2 GB RAM, 25 GB cloud storage) plus 100+ aplikasi open source enterprise.',
        'Sertifikasi Internasional Parallaxnet USA sebanyak 3 sertifikat.',
        'Subsidi 90% oleh Virtalus.com.',
    ];
@endphp

<x-kurikulum cssFile="course" cssKurikulum=true>    <x-course.hero
        eyebrow="Bootcamp"
        title="Hacker Bootcamp"
        tagline="Pelatihan intensif keterampilan ofensif dan defensif keamanan siber tingkat profesional." />

    <x-course.section eyebrow="Overview" title="Tentang Hacker Bootcamp" variant="overview">
        <p>Hacker Bootcamp adalah pelatihan intensif yang membekali keterampilan ofensif dan defensif keamanan siber tingkat profesional. Peserta dilatih dengan skenario serangan nyata dan teknik pertahanan modern.</p>
    </x-course.section>

    <x-course.section eyebrow="Kurikulum" title="Tiga keterampilan yang dipelajari">
        <x-course.curriculum :modules="$skills" />
    </x-course.section>

    <x-course.section eyebrow="Yang Anda Dapatkan" title="Fasilitas program">
        <x-course.features :items="$features" />
    </x-course.section>

    <x-course.cta />
</x-kurikulum>

