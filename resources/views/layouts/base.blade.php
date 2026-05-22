@props(['cssFile' => '', 'cssKurikulum' => 'false'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Parallaxnet Siber Indonesia') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description"
        content="Parallaxnet menawarkan pembelajaran IT praktis melalui kursus Pemrograman, Cloud Computing, Keamanan Siber, dan Pengembangan Perangkat Lunak untuk membina generasi lulusan yang kompetitif." />
    <meta name="keywords"
        content="belajar IT, kursus IT, bootcamp IT, pemrograman, cloud computing, keamanan siber, pengembangan perangkat lunak, Parallaxnet" />
    <meta name="author" content="Parallaxnet" />
    <link rel="canonical" href="https://www.parallaxnet.id/index.php" />
    <meta property="og:title" content="Parallaxnet – Merevolusi Pendidikan dengan Pembelajaran IT Praktis" />
    <meta property="og:description"
        content="Bergabunglah dengan Parallaxnet untuk mendapatkan keterampilan dunia nyata di bidang IT yang akan membuat Anda unggul di pasar kerja." />
    <meta property="og:image" content="{{ asset('images/Parallaxnet-3D Approved Logo.png') }}" />
    <meta property="og:url" content="https://www.parallaxnet.id" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="id_ID" />

    <link rel="icon" href="{{ asset('images/Parallaxnet Logo Transparent.png') }}">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/overlay.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
    @if ($cssKurikulum)
        <link rel="stylesheet" href="{{ asset('css/kurikulumBase.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('css/' . $cssFile . '.css') }}?v={{ time() }}">

    <script src="https://unpkg.com/scrollreveal"></script>

</head>

<body>
    {{ $slot }}

    @include('sweetalert::alert')

    {{-- JavaScript --}}
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @if ($cssKurikulum)
        <script src="{{ asset('js/course.js') }}"></script>
    @endif
</body>

</html>
