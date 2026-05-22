<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Login — Admin Parallaxnet</title>

    <link rel="icon" href="<?php echo e(asset('images/Parallaxnet Logo Transparent.png')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/sweetalert.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>?v=<?php echo e(filemtime(public_path('css/admin.css'))); ?>">

    <style>
        body {
            min-height: 100dvh;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0c4a6e 100%);
            padding: 1rem;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            border-radius: 20px;
            padding: 2.5rem 2rem;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
            animation: fadeUp 0.4s ease;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .login-card .brand {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.65rem;
            margin-bottom: 1.5rem;
        }
        .login-card .brand-mark {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            overflow: hidden;
        }
        .login-card .brand-mark img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .login-card .brand-text {
            font-size: 1.05rem;
            font-weight: 600;
            color: #0f172a;
        }

        .login-card h2 {
            text-align: center;
            font-size: 1.4rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.4rem;
        }

        .login-card .sub {
            text-align: center;
            color: #64748b;
            font-size: 0.88rem;
            margin-bottom: 1.5rem;
        }

        .input-group { margin-bottom: 1rem; }
        .input-group label {
            display: block;
            margin-bottom: 0.35rem;
            font-size: 0.82rem;
            font-weight: 500;
            color: #475569;
        }

        .login-btn {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 10px;
            background: #10b981;
            color: white;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: background 0.15s;
            margin-top: 0.5rem;
        }
        .login-btn:hover { background: #059669; }

        .login-card .back-link {
            display: block;
            text-align: center;
            margin-top: 1.25rem;
            font-size: 0.85rem;
            color: #64748b;
            text-decoration: none;
        }
        .login-card .back-link:hover { color: #0f172a; }

        .err {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 0.65rem 0.85rem;
            border-radius: 8px;
            font-size: 0.85rem;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="brand">
            <div class="brand-mark">
                <img src="<?php echo e(asset('images/Parallaxnet Logo Transparent.png')); ?>" alt="Parallaxnet">
            </div>
            <div class="brand-text">Parallaxnet Admin</div>
        </div>

        <h2>Selamat Datang</h2>
        <p class="sub">Masuk untuk mengelola konten website.</p>

        <?php if($errors->any()): ?>
            <div class="err"><?php echo e($errors->first()); ?></div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('login.submit')); ?>">
            <?php echo csrf_field(); ?>

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="name" autocomplete="username" required autofocus>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" autocomplete="current-password" required>
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>

        <a href="<?php echo e(route('home')); ?>" class="back-link">← Kembali ke beranda</a>
    </div>

    <?php echo $__env->make('sweetalert::alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/auth/login.blade.php ENDPATH**/ ?>