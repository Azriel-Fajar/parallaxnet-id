<x-admin-layout title="Video Hero" breadcrumb="Konten">
    <div class="page-header">
        <div>
            <div class="ph-title">Kelola Video Hero</div>
            <div class="ph-sub">MP4 &amp; poster wajib, WebM opsional. Maksimal 20 MB per file.</div>
        </div>
    </div>

    <x-admin.video-upload :$video :$videos />
</x-admin-layout>
