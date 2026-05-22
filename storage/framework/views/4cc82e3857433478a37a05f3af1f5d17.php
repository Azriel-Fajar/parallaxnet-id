<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['cssFile' => 'galeri']); ?>
    <main>
        <section class="galeri-section">
            <div class="container">
                <h1 id="galeri-title">Galeri Parallaxnet</h1>
                <?php if($images->isNotEmpty()): ?>
                    <div class="masonry-grid">
                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="masonry-item" data-src="<?php echo e(asset('storage/' . $image->filename)); ?>">
                                <img src="<?php echo e(asset('storage/' . $image->filename)); ?>" alt="" loading="lazy">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <p class="empty-state">Belum ada galeri saat ini.</p>
                <?php endif; ?>
            </div>
        </section>

        
        <div id="lightbox" class="lightbox" role="dialog" aria-modal="true" aria-labelledby="galeri-title">
            <button id="lightbox-close" class="lightbox__close" aria-label="Tutup">&times;</button>
            <div class="lightbox__inner">
                <button id="lightbox-prev" class="lightbox__arrow lightbox__arrow--prev" aria-label="Sebelumnya">&#8592;</button>
                <img id="lightbox-img" class="lightbox__img" src="" alt="">
                <button id="lightbox-next" class="lightbox__arrow lightbox__arrow--next" aria-label="Berikutnya">&#8594;</button>
            </div>
        </div>
    </main>

    <script src="<?php echo e(asset('js/galeri.js')); ?>"></script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/galeri.blade.php ENDPATH**/ ?>