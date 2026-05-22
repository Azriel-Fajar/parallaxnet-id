<div class="admin-card">
    <h3>Upload Slider Image</h3>

    <form action="<?php echo e(route('admin.upload.slider')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <input type="file" name="filename" class="input" required accept="image/*" onchange="previewImage(this, 'slider-preview')">
        <div id="slider-preview" class="img-preview-slot">
            <span class="img-preview-placeholder">Preview gambar akan muncul di sini</span>
            <img src="" alt="Preview" style="display:none;width:100%;height:100%;object-fit:contain;border-radius:6px;">
        </div>
        <button type="submit" class="btn-primary">Upload Slider</button>
    </form>

    <h4>Gambar Slider Saat Ini:</h4>

    <div class="gallery-list">
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="gallery-item">
                <img src="<?php echo e(asset('storage/'.$slider->filename)); ?>" alt="img">

                <form action="<?php echo e(route('admin.delete.slider', $slider->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="delete-btn">Hapus</button>
                </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/components/admin/upload-slider.blade.php ENDPATH**/ ?>