@props(['title' => 'Dashboard', 'breadcrumb' => 'Admin'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} — Admin Parallaxnet</title>

    <link rel="icon" href="{{ asset('images/Parallaxnet Logo Transparent.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}?v={{ filemtime(public_path('css/admin.css')) }}">
</head>

<body>
    <div class="admin-shell">
        <x-admin.sidebar />

        <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

        <div class="main">
            <header class="topbar">
                <button class="menu-toggle" id="menuToggle" aria-label="Open navigation menu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <line x1="3" y1="6" x2="21" y2="6"/>
                        <line x1="3" y1="12" x2="21" y2="12"/>
                        <line x1="3" y1="18" x2="21" y2="18"/>
                    </svg>
                </button>

                <div class="topbar-title">
                    <div class="breadcrumb">{{ $breadcrumb }}</div>
                    <h1>{{ $title }}</h1>
                </div>

                <div class="topbar-actions">
                    @auth
                        <div class="top-user">
                            <span class="top-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                            <span>{{ auth()->user()->name }}</span>
                        </div>
                    @endauth
                </div>
            </header>

            <main class="content" id="adminContent">
                <div class="content-loading-overlay" id="contentLoadingOverlay" aria-hidden="true">
                    <div class="content-loading-inner">
                        <div class="content-spinner"></div>
                        <div class="content-loading-text">Memproses<span class="loading-dots"><span>.</span><span>.</span><span>.</span></span></div>
                    </div>
                </div>
                {{ $slot }}
            </main>
        </div>
    </div>

    @include('sweetalert::alert')

    <script>
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            const img = preview.querySelector('img');
            const placeholder = preview.querySelector('.img-preview-placeholder');
            if (!input.files || !input.files[0]) {
                img.style.display = 'none';
                img.src = '';
                if (placeholder) placeholder.style.display = '';
                return;
            }
            const reader = new FileReader();
            reader.onload = e => {
                img.src = e.target.result;
                img.style.display = 'block';
                if (placeholder) placeholder.style.display = 'none';
            };
            reader.readAsDataURL(input.files[0]);
        }
        function previewVideo(input, previewId) {
            const preview = document.getElementById(previewId);
            if (!input.files || !input.files[0]) { preview.style.display = 'none'; return; }
            preview.querySelector('video').src = URL.createObjectURL(input.files[0]);
            preview.style.display = 'block';
        }
    </script>

    <script>
        (function () {
            // Loading overlay — form submits + sidebar nav clicks
            const overlay = document.getElementById('contentLoadingOverlay');
            function showOverlay() { overlay?.classList.add('active'); }

            document.getElementById('adminContent')?.addEventListener('submit', showOverlay);

            document.querySelectorAll('.sidebar-nav a').forEach(function (a) {
                a.addEventListener('click', function (e) {
                    // Don't show if already on this page
                    if (a.classList.contains('active')) return;
                    showOverlay();
                });
            });

            const toggle   = document.getElementById('menuToggle');
            const sidebar  = document.querySelector('.sidebar');
            const backdrop = document.getElementById('sidebarBackdrop');

            function open()  { sidebar.classList.add('open'); backdrop.classList.add('open'); }
            function close() { sidebar.classList.remove('open'); backdrop.classList.remove('open'); }

            toggle?.addEventListener('click', () => {
                sidebar.classList.contains('open') ? close() : open();
            });
            backdrop?.addEventListener('click', close);

            // Close drawer on nav link click (mobile)
            sidebar?.querySelectorAll('.sidebar-nav a').forEach(a => {
                a.addEventListener('click', () => {
                    if (window.innerWidth < 1024) close();
                });
            });
        })();
    </script>
</body>

</html>
