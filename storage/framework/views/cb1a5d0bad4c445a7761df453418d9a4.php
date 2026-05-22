<?php
    $mainFeatures = [
        'Pelatihan imersif',
        'Materi yang Dapat Diunduh',
        'Durasi kursus 6 Bulan',
        'Umpan balik langsung dan pelatihan dari Julie setiap minggu',
        'Akses ke alat-alat canggih dan latihan praktik',
        'Komunitas Online Pribadi',
    ];

    $extraOptions = [
        'Reduksi Aksen',
        'Pelatihan Vokal Profesional',
        'Bimbingan Belajar TOEFL',
    ];
?>

<?php if (isset($component)) { $__componentOriginal0ca26ed2bae8f10cd0071336f4e286c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0ca26ed2bae8f10cd0071336f4e286c1 = $attributes; } ?>
<?php $component = App\View\Components\Kurikulum::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('kurikulum'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Kurikulum::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['cssFile' => 'course','cssKurikulum' => 'true']); ?>    <?php if (isset($component)) { $__componentOriginal1997cd396f831a910aa3ca26ab7f7297 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1997cd396f831a910aa3ca26ab7f7297 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.hero','data' => ['eyebrow' => 'Parallaxnet','title' => 'English Course','tagline' => 'Pelatihan Bahasa Inggris fokus pada speaking dan pengucapan efektif â€” dengan opsi aksen dan persiapan TOEFL.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.hero'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Parallaxnet','title' => 'English Course','tagline' => 'Pelatihan Bahasa Inggris fokus pada speaking dan pengucapan efektif â€” dengan opsi aksen dan persiapan TOEFL.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1997cd396f831a910aa3ca26ab7f7297)): ?>
<?php $attributes = $__attributesOriginal1997cd396f831a910aa3ca26ab7f7297; ?>
<?php unset($__attributesOriginal1997cd396f831a910aa3ca26ab7f7297); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1997cd396f831a910aa3ca26ab7f7297)): ?>
<?php $component = $__componentOriginal1997cd396f831a910aa3ca26ab7f7297; ?>
<?php unset($__componentOriginal1997cd396f831a910aa3ca26ab7f7297); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal564ddf376d4375851b73d6edab701a8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal564ddf376d4375851b73d6edab701a8e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.section','data' => ['eyebrow' => 'Overview','title' => 'Tentang English Course','variant' => 'overview']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Overview','title' => 'Tentang English Course','variant' => 'overview']); ?>
        <p>Program pelatihan Bahasa Inggris ini fokus pada pengembangan keterampilan berbicara dan pengucapan yang efektif, dengan opsi pelatihan aksen dan persiapan TOEFL melalui LMS dan Meeting Conference. Menggunakan metode pembelajaran imersif, peserta akan dilatih dengan berbagai materi dan latihan langsung.</p>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal564ddf376d4375851b73d6edab701a8e)): ?>
<?php $attributes = $__attributesOriginal564ddf376d4375851b73d6edab701a8e; ?>
<?php unset($__attributesOriginal564ddf376d4375851b73d6edab701a8e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal564ddf376d4375851b73d6edab701a8e)): ?>
<?php $component = $__componentOriginal564ddf376d4375851b73d6edab701a8e; ?>
<?php unset($__componentOriginal564ddf376d4375851b73d6edab701a8e); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal564ddf376d4375851b73d6edab701a8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal564ddf376d4375851b73d6edab701a8e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.section','data' => ['eyebrow' => 'Yang Anda Dapatkan','title' => 'Fitur program']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Yang Anda Dapatkan','title' => 'Fitur program']); ?>
        <?php if (isset($component)) { $__componentOriginalaf353cd3b26a3d1a6bd93497c52dd9ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaf353cd3b26a3d1a6bd93497c52dd9ff = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.features','data' => ['items' => $mainFeatures]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.features'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mainFeatures)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaf353cd3b26a3d1a6bd93497c52dd9ff)): ?>
<?php $attributes = $__attributesOriginalaf353cd3b26a3d1a6bd93497c52dd9ff; ?>
<?php unset($__attributesOriginalaf353cd3b26a3d1a6bd93497c52dd9ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaf353cd3b26a3d1a6bd93497c52dd9ff)): ?>
<?php $component = $__componentOriginalaf353cd3b26a3d1a6bd93497c52dd9ff; ?>
<?php unset($__componentOriginalaf353cd3b26a3d1a6bd93497c52dd9ff); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal564ddf376d4375851b73d6edab701a8e)): ?>
<?php $attributes = $__attributesOriginal564ddf376d4375851b73d6edab701a8e; ?>
<?php unset($__attributesOriginal564ddf376d4375851b73d6edab701a8e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal564ddf376d4375851b73d6edab701a8e)): ?>
<?php $component = $__componentOriginal564ddf376d4375851b73d6edab701a8e; ?>
<?php unset($__componentOriginal564ddf376d4375851b73d6edab701a8e); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal564ddf376d4375851b73d6edab701a8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal564ddf376d4375851b73d6edab701a8e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.section','data' => ['eyebrow' => 'Opsi Lain','title' => 'Pelatihan tambahan']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Opsi Lain','title' => 'Pelatihan tambahan']); ?>
        <?php if (isset($component)) { $__componentOriginalaf353cd3b26a3d1a6bd93497c52dd9ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaf353cd3b26a3d1a6bd93497c52dd9ff = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.features','data' => ['items' => $extraOptions]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.features'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($extraOptions)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaf353cd3b26a3d1a6bd93497c52dd9ff)): ?>
<?php $attributes = $__attributesOriginalaf353cd3b26a3d1a6bd93497c52dd9ff; ?>
<?php unset($__attributesOriginalaf353cd3b26a3d1a6bd93497c52dd9ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaf353cd3b26a3d1a6bd93497c52dd9ff)): ?>
<?php $component = $__componentOriginalaf353cd3b26a3d1a6bd93497c52dd9ff; ?>
<?php unset($__componentOriginalaf353cd3b26a3d1a6bd93497c52dd9ff); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal564ddf376d4375851b73d6edab701a8e)): ?>
<?php $attributes = $__attributesOriginal564ddf376d4375851b73d6edab701a8e; ?>
<?php unset($__attributesOriginal564ddf376d4375851b73d6edab701a8e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal564ddf376d4375851b73d6edab701a8e)): ?>
<?php $component = $__componentOriginal564ddf376d4375851b73d6edab701a8e; ?>
<?php unset($__componentOriginal564ddf376d4375851b73d6edab701a8e); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginala947b051bbbfad002f4892bd52fbe15b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala947b051bbbfad002f4892bd52fbe15b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.cta','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.cta'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala947b051bbbfad002f4892bd52fbe15b)): ?>
<?php $attributes = $__attributesOriginala947b051bbbfad002f4892bd52fbe15b; ?>
<?php unset($__attributesOriginala947b051bbbfad002f4892bd52fbe15b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala947b051bbbfad002f4892bd52fbe15b)): ?>
<?php $component = $__componentOriginala947b051bbbfad002f4892bd52fbe15b; ?>
<?php unset($__componentOriginala947b051bbbfad002f4892bd52fbe15b); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0ca26ed2bae8f10cd0071336f4e286c1)): ?>
<?php $attributes = $__attributesOriginal0ca26ed2bae8f10cd0071336f4e286c1; ?>
<?php unset($__attributesOriginal0ca26ed2bae8f10cd0071336f4e286c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0ca26ed2bae8f10cd0071336f4e286c1)): ?>
<?php $component = $__componentOriginal0ca26ed2bae8f10cd0071336f4e286c1; ?>
<?php unset($__componentOriginal0ca26ed2bae8f10cd0071336f4e286c1); ?>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/kurikulum/inggris.blade.php ENDPATH**/ ?>