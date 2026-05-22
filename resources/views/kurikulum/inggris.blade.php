@php
    $mainFeatures = [
        'Pelatihan imersif',
        'Materi yang Dapat Diunduh',
        'Durasi kursus 6 Bulan',
        'Umpan balik langsung dan pelatihan dari Julie setiap minggu',
        'Akses ke alat-alat canggih dan latihan praktik',
        'Komunitas Online Pribadi',
    ];

    $extraOptions = [
        'Reduksi Aksen',
        'Pelatihan Vokal Profesional',
        'Bimbingan Belajar TOEFL',
    ];
@endphp

<x-kurikulum cssFile="course" cssKurikulum=true>    <x-course.hero
        eyebrow="Parallaxnet"
        title="English Course"
        tagline="Pelatihan Bahasa Inggris fokus pada speaking dan pengucapan efektif â€” dengan opsi aksen dan persiapan TOEFL." />

    <x-course.section eyebrow="Overview" title="Tentang English Course" variant="overview">
        <p>Program pelatihan Bahasa Inggris ini fokus pada pengembangan keterampilan berbicara dan pengucapan yang efektif, dengan opsi pelatihan aksen dan persiapan TOEFL melalui LMS dan Meeting Conference. Menggunakan metode pembelajaran imersif, peserta akan dilatih dengan berbagai materi dan latihan langsung.</p>
    </x-course.section>

    <x-course.section eyebrow="Yang Anda Dapatkan" title="Fitur program">
        <x-course.features :items="$mainFeatures" />
    </x-course.section>

    <x-course.section eyebrow="Opsi Lain" title="Pelatihan tambahan">
        <x-course.features :items="$extraOptions" />
    </x-course.section>

    <x-course.cta />
</x-kurikulum>

