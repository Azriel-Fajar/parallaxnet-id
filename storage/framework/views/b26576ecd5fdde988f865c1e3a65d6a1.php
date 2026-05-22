<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'modules' => [],
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
    'modules' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    /**
     * Each module:
     *   ['title' => 'string', 'items' => ['string', ...] | null, 'subgroups' => [['title' => '', 'items' => []]] | null]
     * If items or subgroups present -> accordion. Else flat header card.
     */
?>

<?php if(!empty($modules)): ?>
    <ol class="course-curriculum">
        <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $hasItems = !empty($module['items']);
                $hasSubgroups = !empty($module['subgroups']);
                $isAccordion = $hasItems || $hasSubgroups;
                $variant = $isAccordion ? 'course-module--accordion' : 'course-module--flat';
            ?>

            <li class="course-module <?php echo e($variant); ?>" <?php if($isAccordion): ?> data-open="false" <?php endif; ?>>
                <button type="button" class="course-module__header">
                    <span class="course-module__number"><?php echo e(str_pad($i + 1, 2, '0', STR_PAD_LEFT)); ?></span>
                    <h3 class="course-module__title"><?php echo e($module['title']); ?></h3>
                    <?php if($isAccordion): ?>
                        <span class="course-module__chevron" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </span>
                    <?php endif; ?>
                </button>

                <?php if($isAccordion): ?>
                    <div class="course-module__body">
                        <div class="course-module__body-inner">
                            <?php if($hasSubgroups): ?>
                                <ol>
                                    <?php $__currentLoopData = $module['subgroups']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <p><?php echo e($sub['title']); ?></p>
                                            <?php if(!empty($sub['items'])): ?>
                                                <ul>
                                                    <?php $__currentLoopData = $sub['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><?php echo e($item); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            <?php elseif($hasItems): ?>
                                <ul>
                                    <?php $__currentLoopData = $module['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($item); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/components/course/curriculum.blade.php ENDPATH**/ ?>