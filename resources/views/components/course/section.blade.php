@props([
    'eyebrow' => null,
    'title' => null,
    'variant' => 'plain',
])

@php
    $classes = trim('course-section ' . ($variant === 'overview' ? 'course-section--overview' : ''));
@endphp

<section {{ $attributes->merge(['class' => $classes]) }}>
    @if($eyebrow || $title)
        <header class="course-section__head">
            @if($eyebrow)
                <span class="course-section__eyebrow">{{ $eyebrow }}</span>
            @endif
            @if($title)
                <h2 class="course-section__title">{{ $title }}</h2>
            @endif
        </header>
    @endif

    <div class="course-section__body">
        {{ $slot }}
    </div>
</section>
