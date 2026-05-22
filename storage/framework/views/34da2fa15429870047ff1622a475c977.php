<section class="partners-section">
    <div class="container">
        <h2>Partners</h2>

        <?php if($partners->isNotEmpty()): ?>
            <div class="partner-logos">
                <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e(asset('storage/' . $logo->filename)); ?>" alt="">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <p class="empty-state">Belum ada partner saat ini.</p>
        <?php endif; ?>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/components/universities.blade.php ENDPATH**/ ?>