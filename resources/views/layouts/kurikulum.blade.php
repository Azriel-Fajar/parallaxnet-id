@props(['cssFile' => '', 'title' => '', 'cssKurikulum' => false])

<x-app-layout :$cssFile :$cssKurikulum>
    <main class="course-page">
        {{ $slot }}
    </main>
</x-app-layout>
