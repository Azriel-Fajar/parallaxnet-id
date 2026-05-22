<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Partners','breadcrumb' => 'Konten']); ?>
    <div class="page-header">
        <div>
            <div class="ph-title">Kelola Logo Partners</div>
            <div class="ph-sub">Logo institusi mitra dengan kategori opsional.</div>
        </div>
    </div>

    <?php if (isset($component)) { $__componentOriginalc04a5fd6a3dcf5670d483c271bbeb984 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc04a5fd6a3dcf5670d483c271bbeb984 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.upload-university','data' => ['univ' => $univ,'categories' => $categories,'univGrouped' => $univGrouped]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.upload-university'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['univ' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($univ),'categories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($categories),'univGrouped' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($univGrouped)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc04a5fd6a3dcf5670d483c271bbeb984)): ?>
<?php $attributes = $__attributesOriginalc04a5fd6a3dcf5670d483c271bbeb984; ?>
<?php unset($__attributesOriginalc04a5fd6a3dcf5670d483c271bbeb984); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc04a5fd6a3dcf5670d483c271bbeb984)): ?>
<?php $component = $__componentOriginalc04a5fd6a3dcf5670d483c271bbeb984; ?>
<?php unset($__componentOriginalc04a5fd6a3dcf5670d483c271bbeb984); ?>
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
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/admin/pages/university.blade.php ENDPATH**/ ?>