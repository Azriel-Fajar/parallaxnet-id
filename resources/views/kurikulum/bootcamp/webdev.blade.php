@php
    $skills = [
        ['title' => 'Full Stack Development'],
        ['title' => 'Introduction to JavaScript'],
        ['title' => 'Basic HTML and CSS'],
        ['title' => 'Databases'],
        ['title' => 'Web Hosting'],
    ];

    $features = [
        'LMS (Learning Management System) dengan lima skill.',
        'Mesin Virtual untuk langganan 2 tahun (2 vCore, 2 GB RAM, 25 GB cloud storage) plus 100+ aplikasi open source enterprise.',
        'Sertifikasi Internasional Parallaxnet USA sebanyak 5 sertifikat.',
        'Subsidi 90% oleh Virtalus.com.',
    ];
@endphp

<x-kurikulum cssFile="course" cssKurikulum=true>    <x-course.hero
        eyebrow="Bootcamp"
        title="Web Bootcamp"
        tagline="Pelatihan intensif membangun aplikasi web modern dari nol hingga deploy â€” untuk pemula dan praktisi." />

    <x-course.section eyebrow="Overview" title="Tentang Web Bootcamp" variant="overview">
        <p>Web Bootcamp adalah pelatihan intensif yang membekali keterampilan teknis untuk membangun aplikasi web modern dari nol hingga deploy. Cocok bagi pemula maupun praktisi yang ingin memperdalam stack web.</p>
    </x-course.section>

    <x-course.section eyebrow="Kurikulum" title="Lima keterampilan yang dipelajari">
        <x-course.curriculum :modules="$skills" />
    </x-course.section>

    <x-course.section eyebrow="Yang Anda Dapatkan" title="Fasilitas program">
        <x-course.features :items="$features" />
    </x-course.section>

    <x-course.cta />
</x-kurikulum>

