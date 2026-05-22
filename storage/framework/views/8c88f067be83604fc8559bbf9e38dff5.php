<div class="admin-card">
    <h3>Upload Document Image</h3>

    <form action="<?php echo e(route('admin.upload.doc')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <input type="file" name="filename" class="input" required accept="image/*" onchange="previewImage(this, 'doc-preview')">
        <div id="doc-preview" class="img-preview-slot">
            <span class="img-preview-placeholder">Preview gambar akan muncul di sini</span>
            <img src="" alt="Preview" style="display:none;width:100%;height:100%;object-fit:contain;border-radius:6px;">
        </div>
        <button type="submit" class="btn-primary">Upload Document</button>
    </form>

    <h4>Gambar Document Saat Ini:</h4>

    <div class="gallery-list">
        <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="gallery-item">
                <img src="<?php echo e(asset('storage/' . $doc->filename)); ?>" alt="img">

                <form action="<?php echo e(route('admin.delete.doc', $doc->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="delete-btn">Hapus</button>
                </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/components/admin/upload-document.blade.php ENDPATH**/ ?>