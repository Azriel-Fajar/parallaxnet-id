<div class="admin-card">
    <h3>Upload News</h3>

    <form action="<?php echo e(route('admin.upload.news')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <input type="text" name="news_title" placeholder="News Title" class="input" required>
        <input type="text" name="news_link" placeholder="News Link" class="input" required>
        <input type="file" name="news_img_filename" class="input" accept="image/*" onchange="previewImage(this, 'news-preview')">
        <div id="news-preview" class="img-preview-slot">
            <span class="img-preview-placeholder">Preview gambar akan muncul di sini</span>
            <img src="" alt="Preview" style="display:none;width:100%;height:100%;object-fit:contain;border-radius:6px;">
        </div>

        <button type="submit" class="btn-primary">Upload News</button>
    </form>

    <h4>Gambar News Saat Ini:</h4>

    <div class="gallery-list">
        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="gallery-item">
                <img src="<?php echo e(asset('storage/' . $newsItem->thumbnail)); ?>" alt="img">

                <form action="<?php echo e(route('admin.delete.news', $newsItem->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="delete-btn">Hapus</button>
                </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/components/admin/upload-news.blade.php ENDPATH**/ ?>