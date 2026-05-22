<x-admin-layout title="Courses" breadcrumb="Academic">
    <div class="page-header">
        <div>
            <div class="ph-title">Manage Courses & Categories</div>
            <div class="ph-sub">Set categories and course order displayed in the catalog.</div>
        </div>
    </div>

    <x-admin.course-manager :$categories />
</x-admin-layout>
