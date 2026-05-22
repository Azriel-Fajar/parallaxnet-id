<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['video', 'videos' => collect()]));

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

foreach (array_filter((['video', 'videos' => collect()]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="admin-card">
    <h3>Video Promosi</h3>

    <form action="<?php echo e(route('admin.upload.video')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <label style="display:block;margin-top:0.5rem;font-size:0.85rem;font-weight:600;">
            Link YouTube atau Google Drive
        </label>
        <input type="url" name="video_url" class="input" required
               placeholder="https://www.youtube.com/watch?v=... atau Google Drive"
               value="<?php echo e(old('video_url')); ?>">

        <?php $__errorArgs = ['video_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p style="color:#e53e3e;font-size:0.8rem;margin-top:0.25rem;"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <p style="font-size:0.8rem;color:#666;margin:0.5rem 0 0.75rem;line-height:1.4;">
            Pastikan link bersifat publik (Siapa saja yang punya link dapat menonton).
        </p>

        <button type="submit" class="btn-primary">Simpan Video</button>
    </form>

    <h4>Video Tersimpan (<?php echo e($videos->count()); ?>):</h4>

    <?php if($videos->isEmpty()): ?>
        <p>Belum ada video.</p>
    <?php else: ?>
        <div style="display:flex;flex-direction:column;gap:0.75rem;margin-top:0.5rem;">
            <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div style="border:1px solid <?php echo e($vid->is_active ? '#38a169' : '#e5e7eb'); ?>;border-radius:8px;padding:0.75rem;display:flex;justify-content:space-between;align-items:center;gap:1rem;<?php echo e($vid->is_active ? 'background:#f0fff4;' : ''); ?>">
                    <div style="display:flex;flex-direction:column;gap:0.25rem;min-width:0;">
                        <div style="display:flex;align-items:center;gap:0.5rem;">
                            <span style="font-size:0.75rem;font-weight:600;text-transform:uppercase;
                                  color:<?php echo e($vid->embed_type === 'youtube' ? '#e53e3e' : '#3182ce'); ?>;">
                                <?php echo e($vid->embed_type === 'youtube' ? 'YouTube' : 'Google Drive'); ?>

                            </span>
                            <?php if($vid->is_active): ?>
                                <span style="font-size:0.7rem;font-weight:700;color:#fff;background:#38a169;padding:1px 7px;border-radius:999px;">
                                    AKTIF
                                </span>
                            <?php endif; ?>
                        </div>
                        <span style="font-size:0.8rem;color:#555;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:320px;">
                            <?php echo e($vid->video_url); ?>

                        </span>
                        <span style="font-size:0.75rem;color:#888;">
                            <?php echo e($vid->created_at->format('d M Y')); ?>

                        </span>
                    </div>
                    <div style="display:flex;gap:0.5rem;flex-shrink:0;">
                        <?php if(!$vid->is_active): ?>
                            <form action="<?php echo e(route('admin.activate.video', $vid->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn-primary" style="font-size:0.8rem;padding:0.35rem 0.75rem;">
                                    Aktifkan
                                </button>
                            </form>
                        <?php endif; ?>
                        <form action="<?php echo e(route('admin.delete.video', $vid->id)); ?>" method="POST" class="delete-video-form">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="delete-btn" type="button" onclick="confirmDeleteVideo(this)">Hapus</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>

<script>
function confirmDeleteVideo(btn) {
    Swal.fire({
        title: 'Hapus video ini?',
        text: 'Tindakan ini tidak dapat dibatalkan.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e53e3e',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.isConfirmed) {
            btn.closest('form').submit();
        }
    });
}
</script>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/components/admin/video-upload.blade.php ENDPATH**/ ?>