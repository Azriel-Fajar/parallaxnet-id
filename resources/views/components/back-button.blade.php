@props(['href' => null, 'label' => 'Kembali'])

@php
    $fallback = $href ?? route('kurikulum');
@endphp

<a href="{{ $fallback }}" class="back-button"
    onclick="if(document.referrer && !{{ $href ? 'true' : 'false' }}){event.preventDefault();history.back();}">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <path d="M19 12H5M12 19l-7-7 7-7" />
    </svg>
    <span>{{ $label }}</span>
</a>
