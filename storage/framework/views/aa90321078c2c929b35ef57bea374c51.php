<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['faqs']));

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

foreach (array_filter((['faqs']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="admin-card">
    <h3>FAQ Manager</h3>

    <form action="<?php echo e(route('admin.faqs.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" name="question" class="input" placeholder="Pertanyaan" required>
        <textarea name="answer" class="input" placeholder="Jawaban" rows="3" required></textarea>
        <button type="submit" class="btn-primary">Tambah FAQ</button>
    </form>

    <h4>FAQ Saat Ini:</h4>

    <?php if($faqs->isEmpty()): ?>
        <p>Belum ada FAQ.</p>
    <?php else: ?>
        <div class="faq-admin-list">
            <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="faq-admin-item">
                    <form action="<?php echo e(route('admin.faqs.update', $faq->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <input type="text" name="question" class="input" value="<?php echo e($faq->question); ?>" required>
                        <textarea name="answer" class="input" rows="3" required><?php echo e($faq->answer); ?></textarea>
                        <button type="submit" class="btn-primary">Simpan</button>
                    </form>

                    <div class="faq-admin-actions">
                        <form action="<?php echo e(route('admin.faqs.up', $faq->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button class="btn-secondary">↑</button>
                        </form>
                        <form action="<?php echo e(route('admin.faqs.down', $faq->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button class="btn-secondary">↓</button>
                        </form>
                        <form action="<?php echo e(route('admin.faqs.destroy', $faq->id)); ?>" method="POST">
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
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/components/admin/faq-manager.blade.php ENDPATH**/ ?>