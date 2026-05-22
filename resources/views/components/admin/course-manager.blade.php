@props(['categories'])

<div class="admin-card">
    <h3>Course Manager</h3>

    <h4>Add Category</h4>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <input type="text" name="name" class="input" placeholder="Category Name" required>
        <button type="submit" class="btn-primary">Add Category</button>
    </form>

    <h4>Add Course</h4>
    <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <select name="course_category_id" class="input" required>
            <option value="">-- Select Category --</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
        <input type="text" name="name" class="input" placeholder="Course Name" required>
        <input type="file" name="image" class="input" accept="image/*" onchange="previewImage(this, 'course-add-preview')">
        <div id="course-add-preview" style="display:none;margin:0.5rem 0;">
            <img src="" alt="Preview" style="max-width:100%;max-height:150px;border-radius:6px;border:1px solid #e5e7eb;">
        </div>
        <button type="submit" class="btn-primary">Add Course</button>
    </form>

    <h4>Current Courses:</h4>

    @if ($categories->isEmpty())
        <p>Belum ada kategori.</p>
    @else
        @foreach ($categories as $category)
            <div class="course-category-admin">
                <div class="course-category-header">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="inline-form">
                        @csrf
                        @method('PUT')
                        <input type="text" name="name" class="input" value="{{ $category->name }}" required>
                        <button class="btn-primary">Simpan</button>
                    </form>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline-form">
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn">Hapus Kategori</button>
                    </form>
                </div>

                @if ($category->courses->isEmpty())
                    <p>No courses in this category yet.</p>
                @else
                    <div class="course-list-admin">
                        @foreach ($category->courses as $course)
                            <div class="course-item-admin">
                                @if ($course->image)
                                    <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->name }}" class="course-thumb">
                                @endif

                                <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data" class="inline-form">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="course_category_id" value="{{ $category->id }}">
                                    <input type="text" name="name" class="input" value="{{ $course->name }}" required>
                                    <input type="file" name="image" class="input" accept="image/*" onchange="previewImage(this, 'course-edit-preview-{{ $course->id }}')">
                                    <div id="course-edit-preview-{{ $course->id }}" style="display:none;margin:0.5rem 0;">
                                        <img src="" alt="Preview" style="max-width:100%;max-height:150px;border-radius:6px;border:1px solid #e5e7eb;">
                                    </div>
                                    <button class="btn-primary">Simpan</button>
                                </form>

                                <div class="course-item-actions">
                                    <form action="{{ route('admin.courses.up', $course->id) }}" method="POST">
                                        @csrf
                                        <button class="btn-secondary">↑</button>
                                    </form>
                                    <form action="{{ route('admin.courses.down', $course->id) }}" method="POST">
                                        @csrf
                                        <button class="btn-secondary">↓</button>
                                    </form>
                                    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete-btn">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    @endif
</div>
