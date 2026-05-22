<?php
    $modules = [
        ['title' => 'Pembelajaran Fleksibel', 'items' => ['Waktu belajar 24/7 dengan model lanjutan (6 bulan – 1 tahun).']],
        ['title' => 'Penilaian dan Pemeringkatan Otomatis', 'items' => ['Menggunakan teknologi Kecerdasan Buatan. Tanpa melibatkan manusia, sistem membantu siswa.']],
        ['title' => 'Perangkat Fleksibel untuk LMS', 'items' => ['Dapat menggunakan perangkat apa pun.']],
        ['title' => 'Modul Pembelajaran Mikro', 'items' => ['Modul pembelajaran disiapkan dengan model unggul, dibuat oleh profesional lulusan MIT dan Harvard.']],
        ['title' => 'Pembelajaran Praktis', 'items' => ['Tidak hanya tutorial teoritis — kami memberikan wadah untuk belajar secara praktis.']],
        ['title' => 'Sertifikasi', 'items' => ['Sertifikasi Internasional Parallaxnet USA.']],
        ['title' => 'Program Magang di Amerika dan Indonesia', 'items' => ['10 teratas akan berkesempatan mengikuti program magang online di Indonesia dan USA (seleksi).']],
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
<?php $component->withAttributes(['cssFile' => 'course','cssKurikulum' => 'true','title' => 'Benefit']); ?>
    <?php if (isset($component)) { $__componentOriginal1997cd396f831a910aa3ca26ab7f7297 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1997cd396f831a910aa3ca26ab7f7297 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.hero','data' => ['eyebrow' => 'Tentang Kami','title' => 'Benefit','tagline' => 'Keunggulan ekosistem belajar Parallaxnet — fleksibel, praktis, dan didukung sertifikasi internasional.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.hero'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Tentang Kami','title' => 'Benefit','tagline' => 'Keunggulan ekosistem belajar Parallaxnet — fleksibel, praktis, dan didukung sertifikasi internasional.']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.section','data' => ['eyebrow' => 'Overview','title' => 'Mengapa Parallaxnet','variant' => 'overview']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Overview','title' => 'Mengapa Parallaxnet','variant' => 'overview']); ?>
        <p>Parallaxnet dirancang untuk memberi siswa pengalaman belajar yang fleksibel, praktis, dan terhubung langsung dengan kebutuhan industri. Berikut adalah manfaat utama yang Anda dapatkan.</p>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.section','data' => ['eyebrow' => 'Manfaat','title' => 'Apa yang Anda dapatkan']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Manfaat','title' => 'Apa yang Anda dapatkan']); ?>
        <?php if (isset($component)) { $__componentOriginal398240402897664a80e241bb73f809f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal398240402897664a80e241bb73f809f0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.curriculum','data' => ['modules' => $modules]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.curriculum'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['modules' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($modules)]); ?>
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
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/benefit.blade.php ENDPATH**/ ?>