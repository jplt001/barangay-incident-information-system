@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link collapsed'
            : 'nav-link collapsed';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
