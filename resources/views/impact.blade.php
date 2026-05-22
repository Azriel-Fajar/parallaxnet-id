@php
    $modules = [
        ['title' => 'Inovator yang Ahli dalam Teknologi', 'items' => ['Siswa diharapkan menjadi inovator paham teknologi yang siap menghadapi tantangan digital.']],
        ['title' => 'Pengetahuan yang Seimbang', 'items' => ['Peserta memperoleh pengetahuan teoritis dan keterampilan praktis, sehingga mendorong inovasi.']],
        ['title' => 'Pemecah Masalah', 'items' => ['Siswa mengembangkan keterampilan untuk merancang dan mengimplementasikan solusi teknologi untuk masalah dunia nyata.']],
        ['title' => 'Keterampilan Dunia Nyata', 'items' => ['Komitmen Parallaxnet memastikan lulusan sangat kompetitif di pasar kerja dengan keterampilan praktis.']],
        ['title' => 'Rekam Jejak', 'items' => ['Dokumentasi langkah-langkah, perubahan, dan informasi relevan dengan skill yang diperlukan.']],
        ['title' => 'Keunggulan Kompetitif', 'items' => ['Memperbarui keterampilan agar mencerminkan penyelesaian atau layanan terkini.']],
    ];
@endphp

<x-kurikulum cssFile="course" cssKurikulum=true title="Impact">
    <x-course.hero
        eyebrow="Tentang Kami"
        title="Impact"
        tagline="Dampak nyata yang dihasilkan lulusan Parallaxnet di dunia industri dan masyarakat." />

    <x-course.section eyebrow="Overview" title="Hasil yang Parallaxnet hasilkan" variant="overview">
        <p>Parallaxnet membentuk lulusan yang tidak hanya menguasai teknologi tetapi juga siap menjadi pemecah masalah dan inovator di lingkungan kerja masa depan.</p>
    </x-course.section>

    <x-course.section eyebrow="Dampak" title="Profil lulusan kami">
        <x-course.curriculum :modules="$modules" />
    </x-course.section>

    <x-course.cta />
</x-kurikulum>
