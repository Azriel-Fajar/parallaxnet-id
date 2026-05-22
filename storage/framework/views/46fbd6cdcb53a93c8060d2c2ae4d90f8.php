<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Slider','breadcrumb' => 'Konten']); ?>
    <div class="page-header">
        <div>
            <div class="ph-title">Kelola Slider Beranda</div>
            <div class="ph-sub">Gambar slider yang muncul di hero halaman utama.</div>
        </div>
    </div>

    <?php if (isset($component)) { $__componentOriginal489773257f1844d17797d7b94b98829a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal489773257f1844d17797d7b94b98829a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.upload-slider','data' => ['sliders' => $sliders]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.upload-slider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sliders' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sliders)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal489773257f1844d17797d7b94b98829a)): ?>
<?php $attributes = $__attributesOriginal489773257f1844d17797d7b94b98829a; ?>
<?php unset($__attributesOriginal489773257f1844d17797d7b94b98829a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal489773257f1844d17797d7b94b98829a)): ?>
<?php $component = $__componentOriginal489773257f1844d17797d7b94b98829a; ?>
<?php unset($__componentOriginal489773257f1844d17797d7b94b98829a); ?>
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
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/admin/pages/slider.blade.php ENDPATH**/ ?>