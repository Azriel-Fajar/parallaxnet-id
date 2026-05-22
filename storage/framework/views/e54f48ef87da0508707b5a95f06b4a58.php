<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['categories']));

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

foreach (array_filter((['categories']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="admin-card">
    <h3>Course Manager</h3>

    <h4>Add Category</h4>
    <form action="<?php echo e(route('admin.categories.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" name="name" class="input" placeholder="Category Name" required>
        <button type="submit" class="btn-primary">Add Category</button>
    </form>

    <h4>Add Course</h4>
    <form action="<?php echo e(route('admin.courses.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <select name="course_category_id" class="input" required>
            <option value="">-- Select Category --</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <input type="text" name="name" class="input" placeholder="Course Name" required>
        <input type="file" name="image" class="input" accept="image/*" onchange="previewImage(this, 'course-add-preview')">
        <div id="course-add-preview" style="display:none;margin:0.5rem 0;">
            <img src="" alt="Preview" style="max-width:100%;max-height:150px;border-radius:6px;border:1px solid #e5e7eb;">
        </div>
        <button type="submit" class="btn-primary">Add Course</button>
    </form>

    <h4>Current Courses:</h4>

    <?php if($categories->isEmpty()): ?>
        <p>Belum ada kategori.</p>
    <?php else: ?>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="course-category-admin">
                <div class="course-category-header">
                    <form action="<?php echo e(route('admin.categories.update', $category->id)); ?>" method="POST" class="inline-form">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <input type="text" name="name" class="input" value="<?php echo e($category->name); ?>" required>
                        <button class="btn-primary">Simpan</button>
                    </form>
                    <form action="<?php echo e(route('admin.categories.destroy', $category->id)); ?>" method="POST" class="inline-form">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="delete-btn">Hapus Kategori</button>
                    </form>
                </div>

                <?php if($category->courses->isEmpty()): ?>
                    <p>No courses in this category yet.</p>
                <?php else: ?>
                    <div class="course-list-admin">
                        <?php $__currentLoopData = $category->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="course-item-admin">
                                <?php if($course->image): ?>
                                    <img src="<?php echo e(asset('storage/' . $course->image)); ?>" alt="<?php echo e($course->name); ?>" class="course-thumb">
                                <?php endif; ?>

                                <form action="<?php echo e(route('admin.courses.update', $course->id)); ?>" method="POST" enctype="multipart/form-data" class="inline-form">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <input type="hidden" name="course_category_id" value="<?php echo e($category->id); ?>">
                                    <input type="text" name="name" class="input" value="<?php echo e($course->name); ?>" required>
                                    <input type="file" name="image" class="input" accept="image/*" onchange="previewImage(this, 'course-edit-preview-<?php echo e($course->id); ?>')">
                                    <div id="course-edit-preview-<?php echo e($course->id); ?>" style="display:none;margin:0.5rem 0;">
                                        <img src="" alt="Preview" style="max-width:100%;max-height:150px;border-radius:6px;border:1px solid #e5e7eb;">
                                    </div>
                                    <button class="btn-primary">Simpan</button>
                                </form>

                                <div class="course-item-actions">
                                    <form action="<?php echo e(route('admin.courses.up', $course->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button class="btn-secondary">↑</button>
                                    </form>
                                    <form action="<?php echo e(route('admin.courses.down', $course->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button class="btn-secondary">↓</button>
                                    </form>
                                    <form action="<?php echo e(route('admin.courses.destroy', $course->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="delete-btn">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/components/admin/course-manager.blade.php ENDPATH**/ ?>