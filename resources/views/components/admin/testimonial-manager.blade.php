@props(['testimonials'])

<div class="admin-card">
    <h3>Testimonial Manager</h3>

    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" class="input" placeholder="Nama" required>
        <input type="text" name="role" class="input" placeholder="Peran / Asal (mis. Mahasiswa UMKT - Kalimantan Timur)" required>
        <textarea name="quote" class="input" placeholder="Kutipan testimoni" rows="4" required></textarea>
        <input type="file" name="image" class="input" accept="image/*">
        <button type="submit" class="btn-primary">Tambah Testimoni</button>
    </form>

    <h4>Testimoni Saat Ini:</h4>

    @if ($testimonials->isEmpty())
        <p>Belum ada testimoni.</p>
    @else
        <div class="testimonial-admin-list">
            @foreach ($testimonials as $testimonial)
                <div class="testimonial-admin-item">
                    <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="text" name="name" class="input" value="{{ $testimonial->name }}" required>
                        <input type="text" name="role" class="input" value="{{ $testimonial->role }}" required>
                        <textarea name="quote" class="input" rows="4" required>{{ $testimonial->quote }}</textarea>

                        @if ($testimonial->image)
                            <div class="testimonial-admin-preview">
                                <img src="{{ asset(str_starts_with($testimonial->image, 'images/testimonials/') ? 'storage/' . $testimonial->image : $testimonial->image) }}" alt="{{ $testimonial->name }}" style="max-width:120px;height:auto;">
                            </div>
                        @endif

                        <input type="file" name="image" class="input" accept="image/*">
                        <button type="submit" class="btn-primary">Simpan</button>
                    </form>

                    <div class="testimonial-admin-actions">
                        <form action="{{ route('admin.testimonials.up', $testimonial->id) }}" method="POST">
                            @csrf
                            <button class="btn-secondary">^</button>
                        </form>
                        <form action="{{ route('admin.testimonials.down', $testimonial->id) }}" method="POST">
                            @csrf
                            <button class="btn-secondary">v</button>
                        </form>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST">
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
