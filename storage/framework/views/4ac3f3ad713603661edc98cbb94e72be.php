<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title' => 'Dashboard', 'breadcrumb' => 'Admin']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['title' => 'Dashboard', 'breadcrumb' => 'Admin']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($title); ?> — Admin Parallaxnet</title>

    <link rel="icon" href="<?php echo e(asset('images/Parallaxnet Logo Transparent.png')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/sweetalert.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>?v=<?php echo e(filemtime(public_path('css/admin.css'))); ?>">
</head>

<body>
    <div class="admin-shell">
        <?php if (isset($component)) { $__componentOriginalbebe114f3ccde4b38d7462a3136be045 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbebe114f3ccde4b38d7462a3136be045 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbebe114f3ccde4b38d7462a3136be045)): ?>
<?php $attributes = $__attributesOriginalbebe114f3ccde4b38d7462a3136be045; ?>
<?php unset($__attributesOriginalbebe114f3ccde4b38d7462a3136be045); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbebe114f3ccde4b38d7462a3136be045)): ?>
<?php $component = $__componentOriginalbebe114f3ccde4b38d7462a3136be045; ?>
<?php unset($__componentOriginalbebe114f3ccde4b38d7462a3136be045); ?>
<?php endif; ?>

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
                    <div class="breadcrumb"><?php echo e($breadcrumb); ?></div>
                    <h1><?php echo e($title); ?></h1>
                </div>

                <div class="topbar-actions">
                    <?php if(auth()->guard()->check()): ?>
                        <div class="top-user">
                            <span class="top-avatar"><?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?></span>
                            <span><?php echo e(auth()->user()->name); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </header>

            <main class="content" id="adminContent">
                <div class="content-loading-overlay" id="contentLoadingOverlay" aria-hidden="true">
                    <div class="content-loading-inner">
                        <div class="content-spinner"></div>
                        <div class="content-loading-text">Memproses<span class="loading-dots"><span>.</span><span>.</span><span>.</span></span></div>
                    </div>
                </div>
                <?php echo e($slot); ?>

            </main>
        </div>
    </div>

    <?php echo $__env->make('sweetalert::alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

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
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/layouts/admin-layout.blade.php ENDPATH**/ ?>