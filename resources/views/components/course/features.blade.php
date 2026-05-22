@props([
    'items' => [],
])

@if(!empty($items))
    <ul class="course-features">
        @foreach($items as $item)
            <li class="course-feature">
                <span class="course-feature__icon" aria-hidden="true">✓</span>
                <p class="course-feature__text">{{ $item }}</p>
            </li>
        @endforeach
    </ul>
@endif
