<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['testimonials']));

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

foreach (array_filter((['testimonials']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="admin-card">
    <h3>Testimonial Manager</h3>

    <form action="<?php echo e(route('admin.testimonials.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="text" name="name" class="input" placeholder="Nama" required>
        <input type="text" name="role" class="input" placeholder="Peran / Asal (mis. Mahasiswa UMKT - Kalimantan Timur)" required>
        <textarea name="quote" class="input" placeholder="Kutipan testimoni" rows="4" required></textarea>
        <input type="file" name="image" class="input" accept="image/*">
        <button type="submit" class="btn-primary">Tambah Testimoni</button>
    </form>

    <h4>Testimoni Saat Ini:</h4>

    <?php if($testimonials->isEmpty()): ?>
        <p>Belum ada testimoni.</p>
    <?php else: ?>
        <div class="testimonial-admin-list">
            <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="testimonial-admin-item">
                    <form action="<?php echo e(route('admin.testimonials.update', $testimonial->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <input type="text" name="name" class="input" value="<?php echo e($testimonial->name); ?>" required>
                        <input type="text" name="role" class="input" value="<?php echo e($testimonial->role); ?>" required>
                        <textarea name="quote" class="input" rows="4" required><?php echo e($testimonial->quote); ?></textarea>

                        <?php if($testimonial->image): ?>
                            <div class="testimonial-admin-preview">
                                <img src="<?php echo e(asset(str_starts_with($testimonial->image, 'images/testimonials/') ? 'storage/' . $testimonial->image : $testimonial->image)); ?>" alt="<?php echo e($testimonial->name); ?>" style="max-width:120px;height:auto;">
                            </div>
                        <?php endif; ?>

                        <input type="file" name="image" class="input" accept="image/*">
                        <button type="submit" class="btn-primary">Simpan</button>
                    </form>

                    <div class="testimonial-admin-actions">
                        <form action="<?php echo e(route('admin.testimonials.up', $testimonial->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button class="btn-secondary">^</button>
                        </form>
                        <form action="<?php echo e(route('admin.testimonials.down', $testimonial->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button class="btn-secondary">v</button>
                        </form>
                        <form action="<?php echo e(route('admin.testimonials.destroy', $testimonial->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="delete-btn">Hapus</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/components/admin/testimonial-manager.blade.php ENDPATH**/ ?>