<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['univ', 'categories', 'univGrouped']));

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

foreach (array_filter((['univ', 'categories', 'univGrouped']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $categoriesJson = json_encode($categories->values()->all());
?>

<div class="admin-card">
    <h3>Upload Partner Logo</h3>

    <form action="<?php echo e(route('admin.upload.university')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <input type="file" name="filename" class="input" required accept="image/*" onchange="previewImage(this, 'univ-preview')">
        <div id="univ-preview" style="display:none;margin:0.5rem 0;">
            <img src="" alt="Preview" style="max-width:100%;max-height:200px;border-radius:6px;border:1px solid #e5e7eb;">
        </div>

        <div class="combobox-wrapper">
            <input type="hidden" name="category" id="category-hidden">
            <input type="text" id="category-display" class="input" placeholder="Kategori (pilih atau ketik baru)" autocomplete="off">
            <div id="category-dropdown" class="combobox-dropdown" style="display:none;"></div>
        </div>

        <button type="submit" class="btn-primary">Upload Partner</button>
    </form>

    <h4>Partner Saat Ini:</h4>

    <?php $__empty_1 = true; $__currentLoopData = $univGrouped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryName => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="partner-group">
            <div class="partner-group-title"><?php echo e($categoryName); ?></div>
            <div class="gallery-list">
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="gallery-item">
                        <img src="<?php echo e(asset('storage/' . $university->filename)); ?>" alt="img">
                        <form action="<?php echo e(route('admin.delete.university', $university->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="delete-btn">Hapus</button>
                        </form>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p style="color:var(--text-muted);font-size:0.88rem;">Belum ada partner logo.</p>
    <?php endif; ?>
</div>

<script>
(function () {
    const categories = <?php echo $categoriesJson; ?>;
    const display    = document.getElementById('category-display');
    const hidden     = document.getElementById('category-hidden');
    const dropdown   = document.getElementById('category-dropdown');

    function renderOptions(query) {
        const q       = query.trim().toLowerCase();
        const matches = categories.filter(c => c.toLowerCase().includes(q));

        dropdown.innerHTML = '';

        if (matches.length === 0 && q === '') {
            const empty = document.createElement('div');
            empty.className = 'combobox-option combobox-option--empty';
            empty.textContent = 'Belum ada kategori tersimpan';
            dropdown.appendChild(empty);
        } else {
            matches.forEach(cat => {
                const opt = document.createElement('div');
                opt.className = 'combobox-option';
                opt.textContent = cat;
                opt.addEventListener('mousedown', (e) => {
                    e.preventDefault();
                    display.value = cat;
                    hidden.value  = cat;
                    closeDropdown();
                });
                dropdown.appendChild(opt);
            });
        }

        const exactMatch = categories.some(c => c.toLowerCase() === q);
        if (q !== '' && !exactMatch) {
            const addOpt = document.createElement('div');
            addOpt.className = 'combobox-option combobox-option--new';
            addOpt.textContent = 'Tambah: ' + query.trim();
            addOpt.addEventListener('mousedown', (e) => {
                e.preventDefault();
                display.value = query.trim();
                hidden.value  = query.trim();
                closeDropdown();
            });
            dropdown.appendChild(addOpt);
        }
    }

    function openDropdown() {
        renderOptions(display.value);
        dropdown.style.display = 'block';
    }

    function closeDropdown() {
        dropdown.style.display = 'none';
    }

    display.addEventListener('focus', openDropdown);

    display.addEventListener('input', function () {
        hidden.value = display.value.trim();
        renderOptions(display.value);
        dropdown.style.display = 'block';
    });

    display.addEventListener('blur', function () {
        setTimeout(closeDropdown, 150);
    });

    display.addEventListener('change', function () {
        if (display.value.trim() === '') {
            hidden.value = '';
        }
    });
})();
</script>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/components/admin/upload-university.blade.php ENDPATH**/ ?>