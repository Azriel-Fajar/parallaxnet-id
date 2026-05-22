@props([
    'eyebrow' => 'Parallaxnet',
    'title' => '',
    'tagline' => null,
])

<section class="course-hero">
    <div class="course-hero__inner">
        <x-back-button />
        @if($eyebrow)
            <span class="course-hero__eyebrow">{{ $eyebrow }}</span>
        @endif
        <h1 class="course-hero__title">{{ $title }}</h1>
        @if($tagline)
            <p class="course-hero__tagline">{{ $tagline }}</p>
        @endif
    </div>
</section>
