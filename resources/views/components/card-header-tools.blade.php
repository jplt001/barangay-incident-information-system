{{--  <div class="card-header-tool">
    {{$slot}}
</div>  --}}
<div {{ $attributes->merge(["class"=>"btn-group position-absolute top-50 end-0", "style"=> "transform: translate(-100%, -100%);"])}}>
    {{$slot}}
</div>