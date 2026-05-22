<div id="overlay"></div>

<nav id="navbar">
    <div class="container">
        <div class="logo-container"><a href="<?php echo e(route('home')); ?>"><img
                    src="<?php echo e(asset('images/Parallaxnet-3D Approved Logo Square.png')); ?>" alt="Logo Image"></a></div>
        <ul id="menu-links">
            <li><a href="<?php echo e(route('home')); ?>">Beranda</a></li>
            <li><a href="<?php echo e(route('tentangKami')); ?>">Tentang Kami</a></li>
            <li><a href="https://learn.parallaxnet.com/login/index.php" target="_blank">LMS</a></li>
            <li>
                <a href="<?php echo e(route('kurikulum')); ?>">Kurikulum</a>
                <ul>
                    <li><a href="<?php echo e(route('standar')); ?>">Basic Course</a></li>
                    <li><a href="<?php echo e(route('bootcamp')); ?>">Bootcamp</a></li>
                    <li><a href="<?php echo e(route('profesional')); ?>">Professional Course</a></li>
                    <li><a href="<?php echo e(route('inggris')); ?>">English Course</a></li>
                </ul>
            </li>
            <li><a href="<?php echo e(route('berita')); ?>">Berita</a></li>
        </ul>
        <div class="button-container">
            <svg id="menu" xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960"
                width="32px" fill="#1f1f1f">
                <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
            </svg>
            <svg id="close" xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960"
                width="32px" fill="#1f1f1f">
                <path
                    d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
            </svg>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/components/navbar.blade.php ENDPATH**/ ?>