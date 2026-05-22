@props(['video', 'videos' => collect()])

<div class="admin-card">
    <h3>Video Promosi</h3>

    <form action="{{ route('admin.upload.video') }}" method="POST">
        @csrf

        <label style="display:block;margin-top:0.5rem;font-size:0.85rem;font-weight:600;">
            Link YouTube atau Google Drive
        </label>
        <input type="url" name="video_url" class="input" required
               placeholder="https://www.youtube.com/watch?v=... atau Google Drive"
               value="{{ old('video_url') }}">

        @error('video_url')
            <p style="color:#e53e3e;font-size:0.8rem;margin-top:0.25rem;">{{ $message }}</p>
        @enderror

        <p style="font-size:0.8rem;color:#666;margin:0.5rem 0 0.75rem;line-height:1.4;">
            Pastikan link bersifat publik (Siapa saja yang punya link dapat menonton).
        </p>

        <button type="submit" class="btn-primary">Simpan Video</button>
    </form>

    <h4>Video Tersimpan ({{ $videos->count() }}):</h4>

    @if ($videos->isEmpty())
        <p>Belum ada video.</p>
    @else
        <div style="display:flex;flex-direction:column;gap:0.75rem;margin-top:0.5rem;">
            @foreach ($videos as $vid)
                <div style="border:1px solid {{ $vid->is_active ? '#38a169' : '#e5e7eb' }};border-radius:8px;padding:0.75rem;display:flex;justify-content:space-between;align-items:center;gap:1rem;{{ $vid->is_active ? 'background:#f0fff4;' : '' }}">
                    <div style="display:flex;flex-direction:column;gap:0.25rem;min-width:0;">
                        <div style="display:flex;align-items:center;gap:0.5rem;">
                            <span style="font-size:0.75rem;font-weight:600;text-transform:uppercase;
                                  color:{{ $vid->embed_type === 'youtube' ? '#e53e3e' : '#3182ce' }};">
                                {{ $vid->embed_type === 'youtube' ? 'YouTube' : 'Google Drive' }}
                            </span>
                            @if ($vid->is_active)
                                <span style="font-size:0.7rem;font-weight:700;color:#fff;background:#38a169;padding:1px 7px;border-radius:999px;">
                                    AKTIF
                                </span>
                            @endif
                        </div>
                        <span style="font-size:0.8rem;color:#555;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:320px;">
                            {{ $vid->video_url }}
                        </span>
                        <span style="font-size:0.75rem;color:#888;">
                            {{ $vid->created_at->format('d M Y') }}
                        </span>
                    </div>
                    <div style="display:flex;gap:0.5rem;flex-shrink:0;">
                        @if (!$vid->is_active)
                            <form action="{{ route('admin.activate.video', $vid->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-primary" style="font-size:0.8rem;padding:0.35rem 0.75rem;">
                                    Aktifkan
                                </button>
                            </form>
                        @endif
                        <form action="{{ route('admin.delete.video', $vid->id) }}" method="POST" class="delete-video-form">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn" type="button" onclick="confirmDeleteVideo(this)">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<script>
function confirmDeleteVideo(btn) {
    Swal.fire({
        title: 'Hapus video ini?',
        text: 'Tindakan ini tidak dapat dibatalkan.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e53e3e',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.isConfirmed) {
            btn.closest('form').submit();
        }
    });
}
</script>
