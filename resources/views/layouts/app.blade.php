@props(['cssFile' => '', 'cssKurikulum' => false])

<x-base-layout :$cssFile :$cssKurikulum>
    <x-navbar />
    {{ $slot }}
    <x-footer/>
</x-base-layout>
