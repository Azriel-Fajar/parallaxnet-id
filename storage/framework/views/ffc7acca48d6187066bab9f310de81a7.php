<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Video Hero','breadcrumb' => 'Konten']); ?>
    <div class="page-header">
        <div>
            <div class="ph-title">Kelola Video Hero</div>
            <div class="ph-sub">MP4 &amp; poster wajib, WebM opsional. Maksimal 20 MB per file.</div>
        </div>
    </div>

    <?php if (isset($component)) { $__componentOriginal948dc561cf96699abcfdb69687118de5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal948dc561cf96699abcfdb69687118de5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.video-upload','data' => ['video' => $video,'videos' => $videos]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.video-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['video' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($video),'videos' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($videos)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal948dc561cf96699abcfdb69687118de5)): ?>
<?php $attributes = $__attributesOriginal948dc561cf96699abcfdb69687118de5; ?>
<?php unset($__attributesOriginal948dc561cf96699abcfdb69687118de5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal948dc561cf96699abcfdb69687118de5)): ?>
<?php $component = $__componentOriginal948dc561cf96699abcfdb69687118de5; ?>
<?php unset($__componentOriginal948dc561cf96699abcfdb69687118de5); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $attributes = $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $component = $__componentOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/admin/pages/video.blade.php ENDPATH**/ ?>