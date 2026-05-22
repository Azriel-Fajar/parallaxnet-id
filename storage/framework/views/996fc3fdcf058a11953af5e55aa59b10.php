<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'href' => 'https://wa.me/6285788220000',
    'label' => 'Daftar Sekarang',
    'kicker' => 'Siap memulai?',
    'title' => 'Ambil langkah berikutnya.',
    'lead' => 'Hubungi tim kami via WhatsApp untuk info pendaftaran, jadwal, dan subsidi.',
]));

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

foreach (array_filter(([
    'href' => 'https://wa.me/6285788220000',
    'label' => 'Daftar Sekarang',
    'kicker' => 'Siap memulai?',
    'title' => 'Ambil langkah berikutnya.',
    'lead' => 'Hubungi tim kami via WhatsApp untuk info pendaftaran, jadwal, dan subsidi.',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section class="course-cta">
    <?php if($kicker): ?>
        <span class="course-cta__kicker"><?php echo e($kicker); ?></span>
    <?php endif; ?>
    <?php if($title): ?>
        <h2 class="course-cta__title"><?php echo e($title); ?></h2>
    <?php endif; ?>
    <?php if($lead): ?>
        <p class="course-cta__lead"><?php echo e($lead); ?></p>
    <?php endif; ?>
    <a href="<?php echo e($href); ?>" target="_blank" rel="noopener" class="cta-button cta-accent">
        <?php echo e($label); ?>

    </a>
</section>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/components/course/cta.blade.php ENDPATH**/ ?>