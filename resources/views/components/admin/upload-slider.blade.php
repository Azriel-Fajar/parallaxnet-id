<div class="admin-card">
    <h3>Upload Slider Image</h3>

    <form action="{{ route('admin.upload.slider') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="filename" class="input" required accept="image/*" onchange="previewImage(this, 'slider-preview')">
        <div id="slider-preview" class="img-preview-slot">
            <span class="img-preview-placeholder">Preview gambar akan muncul di sini</span>
            <img src="" alt="Preview" style="display:none;width:100%;height:100%;object-fit:contain;border-radius:6px;">
        </div>
        <button type="submit" class="btn-primary">Upload Slider</button>
    </form>

    <h4>Gambar Slider Saat Ini:</h4>

    <div class="gallery-list">
        @foreach ($sliders as $slider)
            <div class="gallery-item">
                <img src="{{ asset('storage/'.$slider->filename) }}" alt="img">

                <form action="{{ route('admin.delete.slider', $slider->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn">Hapus</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
