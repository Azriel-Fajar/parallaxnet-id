@props(['faqs'])

<div class="admin-card">
    <h3>FAQ Manager</h3>

    <form action="{{ route('admin.faqs.store') }}" method="POST">
        @csrf
        <input type="text" name="question" class="input" placeholder="Pertanyaan" required>
        <textarea name="answer" class="input" placeholder="Jawaban" rows="3" required></textarea>
        <button type="submit" class="btn-primary">Tambah FAQ</button>
    </form>

    <h4>FAQ Saat Ini:</h4>

    @if ($faqs->isEmpty())
        <p>Belum ada FAQ.</p>
    @else
        <div class="faq-admin-list">
            @foreach ($faqs as $faq)
                <div class="faq-admin-item">
                    <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" name="question" class="input" value="{{ $faq->question }}" required>
                        <textarea name="answer" class="input" rows="3" required>{{ $faq->answer }}</textarea>
                        <button type="submit" class="btn-primary">Simpan</button>
                    </form>

                    <div class="faq-admin-actions">
                        <form action="{{ route('admin.faqs.up', $faq->id) }}" method="POST">
                            @csrf
                            <button class="btn-secondary">↑</button>
                        </form>
                        <form action="{{ route('admin.faqs.down', $faq->id) }}" method="POST">
                            @csrf
                            <button class="btn-secondary">↓</button>
                        </form>
                        <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST">
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
