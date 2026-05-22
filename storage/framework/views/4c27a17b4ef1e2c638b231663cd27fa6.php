<?php
    $skills = [
        ['title' => 'Full Stack Development'],
        ['title' => 'Introduction to JavaScript'],
        ['title' => 'Basic HTML and CSS'],
        ['title' => 'Databases'],
        ['title' => 'Web Hosting'],
    ];

    $features = [
        'LMS (Learning Management System) dengan lima skill.',
        'Mesin Virtual untuk langganan 2 tahun (2 vCore, 2 GB RAM, 25 GB cloud storage) plus 100+ aplikasi open source enterprise.',
        'Sertifikasi Internasional Parallaxnet USA sebanyak 5 sertifikat.',
        'Subsidi 90% oleh Virtalus.com.',
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.hero','data' => ['eyebrow' => 'Bootcamp','title' => 'Web Bootcamp','tagline' => 'Pelatihan intensif membangun aplikasi web modern dari nol hingga deploy â€” untuk pemula dan praktisi.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.hero'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Bootcamp','title' => 'Web Bootcamp','tagline' => 'Pelatihan intensif membangun aplikasi web modern dari nol hingga deploy â€” untuk pemula dan praktisi.']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.section','data' => ['eyebrow' => 'Overview','title' => 'Tentang Web Bootcamp','variant' => 'overview']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Overview','title' => 'Tentang Web Bootcamp','variant' => 'overview']); ?>
        <p>Web Bootcamp adalah pelatihan intensif yang membekali keterampilan teknis untuk membangun aplikasi web modern dari nol hingga deploy. Cocok bagi pemula maupun praktisi yang ingin memperdalam stack web.</p>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.section','data' => ['eyebrow' => 'Kurikulum','title' => 'Lima keterampilan yang dipelajari']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Kurikulum','title' => 'Lima keterampilan yang dipelajari']); ?>
        <?php if (isset($component)) { $__componentOriginal398240402897664a80e241bb73f809f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal398240402897664a80e241bb73f809f0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.curriculum','data' => ['modules' => $skills]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.curriculum'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['modules' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($skills)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal398240402897664a80e241bb73f809f0)): ?>
<?php $attributes = $__attributesOriginal398240402897664a80e241bb73f809f0; ?>
<?php unset($__attributesOriginal398240402897664a80e241bb73f809f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal398240402897664a80e241bb73f809f0)): ?>
<?php $component = $__componentOriginal398240402897664a80e241bb73f809f0; ?>
<?php unset($__componentOriginal398240402897664a80e241bb73f809f0); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.section','data' => ['eyebrow' => 'Yang Anda Dapatkan','title' => 'Fasilitas program']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Yang Anda Dapatkan','title' => 'Fasilitas program']); ?>
        <?php if (isset($component)) { $__componentOriginalaf353cd3b26a3d1a6bd93497c52dd9ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaf353cd3b26a3d1a6bd93497c52dd9ff = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.features','data' => ['items' => $features]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.features'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($features)]); ?>
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

<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/kurikulum/bootcamp/webdev.blade.php ENDPATH**/ ?>