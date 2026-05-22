<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Dashboard','breadcrumb' => 'Beranda Admin']); ?>
    <div class="page-header">
        <div>
            <div class="ph-title">Selamat datang, <?php echo e(auth()->user()->name); ?></div>
            <div class="ph-sub">Ringkasan konten website Parallaxnet Siber Indonesia.</div>
        </div>
    </div>

    <div class="stat-grid">
        <div class="stat-card">
            <div class="stat-icon"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/></svg></div>
            <div class="stat-body">
                <div class="stat-label">Berita</div>
                <div class="stat-value"><?php echo e($counts['news']); ?></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon blue"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg></div>
            <div class="stat-body">
                <div class="stat-label">Slider</div>
                <div class="stat-value"><?php echo e($counts['sliders']); ?></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon purple"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg></div>
            <div class="stat-body">
                <div class="stat-label">Dokumen</div>
                <div class="stat-value"><?php echo e($counts['docs']); ?></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon amber"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="16" height="20" x="4" y="2" rx="2"/><path d="M9 22v-4h6v4"/></svg></div>
            <div class="stat-body">
                <div class="stat-label">Mitra</div>
                <div class="stat-value"><?php echo e($counts['univ']); ?></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon rose"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 8-6 4 6 4V8Z"/><rect width="14" height="12" x="2" y="6" rx="2"/></svg></div>
            <div class="stat-body">
                <div class="stat-label">Video Hero</div>
                <div class="stat-value"><?php echo e($counts['videos']); ?></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon cyan"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg></div>
            <div class="stat-body">
                <div class="stat-label">Courses</div>
                <div class="stat-value"><?php echo e($counts['courses']); ?></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon indigo"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/></svg></div>
            <div class="stat-body">
                <div class="stat-label">Testimoni</div>
                <div class="stat-value"><?php echo e($counts['testimonials']); ?></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></div>
            <div class="stat-body">
                <div class="stat-label">FAQ</div>
                <div class="stat-value"><?php echo e($counts['faqs']); ?></div>
            </div>
        </div>
    </div>

    <div class="recent-grid">
        <div class="admin-card">
            <h3>Berita Terbaru</h3>
            <?php if($recentNews->isEmpty()): ?>
                <div class="empty-state">Belum ada berita.</div>
            <?php else: ?>
                <div class="recent-list">
                    <?php $__currentLoopData = $recentNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="recent-item">
                            <img src="<?php echo e(asset('storage/' . $n->thumbnail)); ?>" alt="" class="recent-thumb" onerror="this.style.visibility='hidden'">
                            <div class="recent-text">
                                <div class="recent-title"><?php echo e($n->news_title); ?></div>
                                <div class="recent-meta"><?php echo e($n->created_at?->diffForHumans()); ?></div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="admin-card">
            <h3>Slider Terbaru</h3>
            <?php if($recentSliders->isEmpty()): ?>
                <div class="empty-state">Belum ada slider.</div>
            <?php else: ?>
                <div class="recent-list">
                    <?php $__currentLoopData = $recentSliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="recent-item">
                            <img src="<?php echo e(asset('storage/' . $s->filename)); ?>" alt="" class="recent-thumb" onerror="this.style.visibility='hidden'">
                            <div class="recent-text">
                                <div class="recent-title">Slider #<?php echo e($i + 1); ?></div>
                                <div class="recent-meta"><?php echo e($s->created_at?->diffForHumans()); ?></div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $attributes = $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $component = $__componentOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/admin/pages/dashboard.blade.php ENDPATH**/ ?>