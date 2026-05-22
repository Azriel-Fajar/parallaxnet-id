<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'eyebrow' => null,
    'title' => null,
    'variant' => 'plain',
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
    'eyebrow' => null,
    'title' => null,
    'variant' => 'plain',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $classes = trim('course-section ' . ($variant === 'overview' ? 'course-section--overview' : ''));
?>

<section <?php echo e($attributes->merge(['class' => $classes])); ?>>
    <?php if($eyebrow || $title): ?>
        <header class="course-section__head">
            <?php if($eyebrow): ?>
                <span class="course-section__eyebrow"><?php echo e($eyebrow); ?></span>
            <?php endif; ?>
            <?php if($title): ?>
                <h2 class="course-section__title"><?php echo e($title); ?></h2>
            <?php endif; ?>
        </header>
    <?php endif; ?>

    <div class="course-section__body">
        <?php echo e($slot); ?>

    </div>
</section>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/components/course/section.blade.php ENDPATH**/ ?>