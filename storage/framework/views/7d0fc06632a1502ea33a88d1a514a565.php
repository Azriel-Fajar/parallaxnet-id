<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Testimoni','breadcrumb' => 'Konten']); ?>
    <div class="page-header">
        <div>
            <div class="ph-title">Kelola Testimoni</div>
            <div class="ph-sub">Testimoni pengguna yang tampil di halaman publik.</div>
        </div>
    </div>

    <?php if (isset($component)) { $__componentOriginale92d8a3ae27e6805a4f2f11f7b93b3f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale92d8a3ae27e6805a4f2f11f7b93b3f0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.testimonial-manager','data' => ['testimonials' => $testimonials]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.testimonial-manager'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['testimonials' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($testimonials)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale92d8a3ae27e6805a4f2f11f7b93b3f0)): ?>
<?php $attributes = $__attributesOriginale92d8a3ae27e6805a4f2f11f7b93b3f0; ?>
<?php unset($__attributesOriginale92d8a3ae27e6805a4f2f11f7b93b3f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale92d8a3ae27e6805a4f2f11f7b93b3f0)): ?>
<?php $component = $__componentOriginale92d8a3ae27e6805a4f2f11f7b93b3f0; ?>
<?php unset($__componentOriginale92d8a3ae27e6805a4f2f11f7b93b3f0); ?>
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
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/admin/pages/testimonials.blade.php ENDPATH**/ ?>