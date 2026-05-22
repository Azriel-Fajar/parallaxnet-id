<div class="admin-card">
    <h3>Upload Document Image</h3>

    <form action="{{ route('admin.upload.doc') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="filename" class="input" required accept="image/*" onchange="previewImage(this, 'doc-preview')">
        <div id="doc-preview" class="img-preview-slot">
            <span class="img-preview-placeholder">Preview gambar akan muncul di sini</span>
            <img src="" alt="Preview" style="display:none;width:100%;height:100%;object-fit:contain;border-radius:6px;">
        </div>
        <button type="submit" class="btn-primary">Upload Document</button>
    </form>

    <h4>Gambar Document Saat Ini:</h4>

    <div class="gallery-list">
        @foreach ($docs as $doc)
            <div class="gallery-item">
                <img src="{{ asset('storage/' . $doc->filename) }}" alt="img">

                <form action="{{ route('admin.delete.doc', $doc->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn">Hapus</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
