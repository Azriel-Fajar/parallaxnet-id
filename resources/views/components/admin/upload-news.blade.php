<div class="admin-card">
    <h3>Upload News</h3>

    <form action="{{ route('admin.upload.news') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="news_title" placeholder="News Title" class="input" required>
        <input type="text" name="news_link" placeholder="News Link" class="input" required>
        <input type="file" name="news_img_filename" class="input" accept="image/*" onchange="previewImage(this, 'news-preview')">
        <div id="news-preview" class="img-preview-slot">
            <span class="img-preview-placeholder">Preview gambar akan muncul di sini</span>
            <img src="" alt="Preview" style="display:none;width:100%;height:100%;object-fit:contain;border-radius:6px;">
        </div>

        <button type="submit" class="btn-primary">Upload News</button>
    </form>

    <h4>Gambar News Saat Ini:</h4>

    <div class="gallery-list">
        @foreach ($news as $newsItem)
            <div class="gallery-item">
                <img src="{{ asset('storage/' . $newsItem->thumbnail) }}" alt="img">

                <form action="{{ route('admin.delete.news', $newsItem->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn">Hapus</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
