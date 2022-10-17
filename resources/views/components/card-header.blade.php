@props(["cardTitle"=> ""])


<div {{ $attributes->merge(["class"=> "card-header"])}}>
    @if(strlen($cardTitle)> 0)
    <h4 class="card-title">{{ $cardTitle }}</h4>
    @endif
    {{ $slot }}
</div>