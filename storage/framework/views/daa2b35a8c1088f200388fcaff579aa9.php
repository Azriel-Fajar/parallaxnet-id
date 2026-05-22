<?php
    $nav = [
        ['name' => 'Dashboard',    'route' => 'admin.dashboard',    'icon' => 'grid'],
        ['name' => 'Berita',       'route' => 'admin.news',         'icon' => 'newspaper'],
        ['name' => 'Slider',       'route' => 'admin.slider',       'icon' => 'images'],
        ['name' => 'Dokumen',      'route' => 'admin.document',     'icon' => 'file'],
        ['name' => 'Partners',      'route' => 'admin.university',   'icon' => 'building'],
        ['name' => 'Video Hero',   'route' => 'admin.video',        'icon' => 'video'],
        ['name' => 'Courses',      'route' => 'admin.courses',      'icon' => 'book'],
        ['name' => 'Testimoni',    'route' => 'admin.testimonials', 'icon' => 'quote'],
        ['name' => 'FAQ',          'route' => 'admin.faqs',         'icon' => 'help'],
    ];

    $icons = [
        'grid'      => '<rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>',
        'newspaper' => '<path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/>',
        'images'    => '<rect width="18" height="18" x="3" y="3" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>',
        'file'      => '<path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/>',
        'building'  => '<rect width="16" height="20" x="4" y="2" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M12 10h.01"/><path d="M12 14h.01"/><path d="M16 10h.01"/><path d="M16 14h.01"/><path d="M8 10h.01"/><path d="M8 14h.01"/>',
        'video'     => '<path d="m22 8-6 4 6 4V8Z"/><rect width="14" height="12" x="2" y="6" rx="2" ry="2"/>',
        'book'      => '<path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/>',
        'quote'     => '<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"/>',
        'help'      => '<circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/>',
    ];

    $user = auth()->user();
    $initial = $user ? strtoupper(substr($user->name, 0, 1)) : 'A';
?>

<aside class="sidebar" id="adminSidebar">
    <div class="sidebar-header">
        <div class="brand-mark">
            <img src="<?php echo e(asset('images/Parallaxnet-3D Approved Logo Square.png')); ?>" alt="Parallaxnet" class="brand-logo-img">
        </div>
        <div>
            <h2>Parallaxnet</h2>
            <div class="brand-sub">Admin Panel</div>
        </div>
    </div>

    <nav class="sidebar-nav" aria-label="Admin navigation">
        <div class="nav-section-label">Menu</div>
        <ul>
            <?php $__currentLoopData = $nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route($item['route'])); ?>"
                       class="<?php echo e(request()->routeIs($item['route']) ? 'active' : ''); ?>">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <?php echo $icons[$item['icon']]; ?>

                        </svg>
                        <span><?php echo e($item['name']); ?></span>
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </nav>

    <div class="sidebar-footer">
        <?php if(auth()->guard()->check()): ?>
            <div class="user-card">
                <div class="user-avatar"><?php echo e($initial); ?></div>
                <div class="user-info">
                    <div class="user-name"><?php echo e($user->name); ?></div>
                    <div class="user-role"><?php echo e(ucfirst($user->role ?? 'admin')); ?></div>
                </div>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button class="logout-btn" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/components/admin/sidebar.blade.php ENDPATH**/ ?>