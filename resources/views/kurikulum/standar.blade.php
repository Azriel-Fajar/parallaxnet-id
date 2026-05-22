@php
    $skills = [
        ['title' => 'Basic Cloud Computing'],
        ['title' => 'Cyber Security Basic'],
        ['title' => 'Software Engineering'],
        ['title' => 'Basic Networking'],
        ['title' => 'Introduction to Python'],
        ['title' => 'Business Course'],
        ['title' => 'Techpreneur'],
    ];

    $features = [
        'LMS (Learning Management System) dengan tujuh skill.',
        'Mesin Virtual untuk langganan 2 tahun (2 vCore, 2 GB RAM, 25 GB cloud storage) plus 100+ aplikasi open source enterprise.',
        'Sertifikasi Internasional Parallaxnet USA sebanyak 7 sertifikat.',
        'Subsidi 90% oleh Virtalus.com.',
    ];
@endphp

<x-kurikulum cssFile="course" cssKurikulum=true>    <x-course.hero
        eyebrow="Parallaxnet"
        title="Basic Course"
        tagline="Tujuh keterampilan dasar paling penting di dunia IT â€” fondasi praktis untuk memulai karier teknologi." />

    <x-course.section eyebrow="Overview" title="Tentang Basic Course" variant="overview">
        <p>Basic Course adalah kursus online yang membekali tujuh keterampilan dasar paling penting di dunia IT. Program ini dirancang untuk memberi fondasi pengetahuan dan keterampilan praktis yang dibutuhkan memulai karier di industri teknologi. Pembelajaran fleksibel melalui modul mikro di LMS, dapat diakses kapan saja.</p>
    </x-course.section>

    <x-course.section eyebrow="Kurikulum" title="Tujuh keterampilan yang dipelajari">
        <x-course.curriculum :modules="$skills" />
    </x-course.section>

    <x-course.section eyebrow="Yang Anda Dapatkan" title="Fasilitas program">
        <x-course.features :items="$features" />
    </x-course.section>

    <x-course.cta />
</x-kurikulum>

