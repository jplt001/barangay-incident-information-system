@props(["id"=> "sidebar-nav"])

@php
$id = ($id != 'sidebar-nav') ? $id = $id: '';
@endphp

<ul class="sidebar-nav" {{ $attributes->merge([])}}>
    {{$slot}}
</ul>