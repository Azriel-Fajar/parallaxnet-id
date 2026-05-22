<section class="gallery-section">
    <div class="container">
        <h2>Galeri Parallaxnet</h2>

        <?php if($images->isNotEmpty()): ?>
            <div class="gallery-grid">
                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(asset('storage/' . $image->filename)); ?>" target="_blank" rel="noopener" class="gallery-item gallery-item--<?php echo e($i % 5); ?>">
                        <img src="<?php echo e(asset('storage/' . $image->filename)); ?>" alt="" loading="lazy">
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="gallery-cta">
                <a href="<?php echo e(route('galeri')); ?>" class="gallery-cta__btn">Lihat Semua Dokumentasi &rarr;</a>
            </div>
        <?php else: ?>
            <p class="empty-state">Belum ada galeri saat ini.</p>
        <?php endif; ?>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/components/gallery.blade.php ENDPATH**/ ?>