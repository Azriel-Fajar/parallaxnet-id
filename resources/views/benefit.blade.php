@php
    $modules = [
        ['title' => 'Pembelajaran Fleksibel', 'items' => ['Waktu belajar 24/7 dengan model lanjutan (6 bulan – 1 tahun).']],
        ['title' => 'Penilaian dan Pemeringkatan Otomatis', 'items' => ['Menggunakan teknologi Kecerdasan Buatan. Tanpa melibatkan manusia, sistem membantu siswa.']],
        ['title' => 'Perangkat Fleksibel untuk LMS', 'items' => ['Dapat menggunakan perangkat apa pun.']],
        ['title' => 'Modul Pembelajaran Mikro', 'items' => ['Modul pembelajaran disiapkan dengan model unggul, dibuat oleh profesional lulusan MIT dan Harvard.']],
        ['title' => 'Pembelajaran Praktis', 'items' => ['Tidak hanya tutorial teoritis — kami memberikan wadah untuk belajar secara praktis.']],
        ['title' => 'Sertifikasi', 'items' => ['Sertifikasi Internasional Parallaxnet USA.']],
        ['title' => 'Program Magang di Amerika dan Indonesia', 'items' => ['10 teratas akan berkesempatan mengikuti program magang online di Indonesia dan USA (seleksi).']],
    ];
@endphp

<x-kurikulum cssFile="course" cssKurikulum=true title="Benefit">
    <x-course.hero
        eyebrow="Tentang Kami"
        title="Benefit"
        tagline="Keunggulan ekosistem belajar Parallaxnet — fleksibel, praktis, dan didukung sertifikasi internasional." />

    <x-course.section eyebrow="Overview" title="Mengapa Parallaxnet" variant="overview">
        <p>Parallaxnet dirancang untuk memberi siswa pengalaman belajar yang fleksibel, praktis, dan terhubung langsung dengan kebutuhan industri. Berikut adalah manfaat utama yang Anda dapatkan.</p>
    </x-course.section>

    <x-course.section eyebrow="Manfaat" title="Apa yang Anda dapatkan">
        <x-course.curriculum :modules="$modules" />
    </x-course.section>

    <x-course.cta />
</x-kurikulum>
