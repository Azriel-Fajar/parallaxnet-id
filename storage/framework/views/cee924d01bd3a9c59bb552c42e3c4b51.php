<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['cssFile' => '', 'cssKurikulum' => 'false']));

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

foreach (array_filter((['cssFile' => '', 'cssKurikulum' => 'false']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo e(config('app.name', 'Parallaxnet Siber Indonesia')); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <meta name="description"
        content="Parallaxnet menawarkan pembelajaran IT praktis melalui kursus Pemrograman, Cloud Computing, Keamanan Siber, dan Pengembangan Perangkat Lunak untuk membina generasi lulusan yang kompetitif." />
    <meta name="keywords"
        content="belajar IT, kursus IT, bootcamp IT, pemrograman, cloud computing, keamanan siber, pengembangan perangkat lunak, Parallaxnet" />
    <meta name="author" content="Parallaxnet" />
    <link rel="canonical" href="https://www.parallaxnet.id/index.php" />
    <meta property="og:title" content="Parallaxnet – Merevolusi Pendidikan dengan Pembelajaran IT Praktis" />
    <meta property="og:description"
        content="Bergabunglah dengan Parallaxnet untuk mendapatkan keterampilan dunia nyata di bidang IT yang akan membuat Anda unggul di pasar kerja." />
    <meta property="og:image" content="<?php echo e(asset('images/Parallaxnet-3D Approved Logo.png')); ?>" />
    <meta property="og:url" content="https://www.parallaxnet.id" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="id_ID" />

    <link rel="icon" href="<?php echo e(asset('images/Parallaxnet Logo Transparent.png')); ?>">

    
    <link rel="stylesheet" href="<?php echo e(asset('css/navbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/footer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/overlay.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/sweetalert.css')); ?>">
    <?php if($cssKurikulum): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/kurikulumBase.css')); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/' . $cssFile . '.css')); ?>?v=<?php echo e(time()); ?>">

    <script src="https://unpkg.com/scrollreveal"></script>

</head>

<body>
    <?php echo e($slot); ?>


    <?php echo $__env->make('sweetalert::alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <script src="<?php echo e(asset('js/navbar.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <?php if($cssKurikulum): ?>
        <script src="<?php echo e(asset('js/course.js')); ?>"></script>
    <?php endif; ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/layouts/base.blade.php ENDPATH**/ ?>