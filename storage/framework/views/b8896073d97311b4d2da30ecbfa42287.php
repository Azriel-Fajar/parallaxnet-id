<?php if($images->isEmpty()): ?>
    <p class="no-news">Tidak ada berita tersedia saat ini.</p>
<?php endif; ?>

<?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card">
        <a target="_blank" href="<?php echo e($news->news_link); ?>">
            <img src="<?php echo e(asset('storage/'.$news->news_img_filename)); ?>" alt="<?php echo e($news->news_title); ?>">
            <div class="overlay"></div>
            <div class="card-content">
                <span class="card-category">Berita</span>
                <p class="card-title"><?php echo e($news->news_title); ?></p>
                <div class="card-author">
                    <span></span>
                    <p><?php echo e($news->news_author ?? 'Parallaxnet'); ?></p>
                </div>
            </div>
        </a>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/components/news.blade.php ENDPATH**/ ?>