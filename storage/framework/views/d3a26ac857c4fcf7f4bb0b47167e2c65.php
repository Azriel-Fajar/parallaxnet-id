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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.hero','data' => ['eyebrow' => 'Parallaxnet','title' => 'Professional Course','tagline' => 'Tiga bidang fokus lanjutan: Cybersecurity, Ethical Hacker, dan IoT.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.hero'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Parallaxnet','title' => 'Professional Course','tagline' => 'Tiga bidang fokus lanjutan: Cybersecurity, Ethical Hacker, dan IoT.']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.section','data' => ['eyebrow' => 'Overview','title' => 'Tentang Professional Course','variant' => 'overview']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Overview','title' => 'Tentang Professional Course','variant' => 'overview']); ?>
        <p>Professional Course dirancang memberi pengetahuan mendalam dan keterampilan teknis lanjutan pada tiga bidang fokus: Cybersecurity, Ethical Hacker, dan IoT. Setiap kursus menyajikan pengalaman praktis dengan materi yang relevan dengan kebutuhan industri saat ini, dapat diakses fleksibel melalui LMS.</p>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.course.section','data' => ['eyebrow' => 'Pilih Fokus','title' => 'Tiga bidang spesialisasi']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('course.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Pilih Fokus','title' => 'Tiga bidang spesialisasi']); ?>
        <ul class="course-hub">
            <li><a class="course-hub__link" href="<?php echo e(route('profesional.cybersecurity')); ?>">Cybersecurity<span class="course-hub__link-sub">Strategi keamanan organisasi</span></a></li>
            <li><a class="course-hub__link" href="<?php echo e(route('profesional.ethicalhacker')); ?>">Ethical Hacker<span class="course-hub__link-sub">NMAP, Metasploit, Hydra</span></a></li>
            <li><a class="course-hub__link" href="<?php echo e(route('profesional.iot')); ?>">IoT<span class="course-hub__link-sub">Sensor, ESP32, LoRaWAN, MQTT</span></a></li>
        </ul>
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

<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/kurikulum/profesional/index.blade.php ENDPATH**/ ?>