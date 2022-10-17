@props(["data"=>[]])
<ul {{ $attributes->merge(["class"=> "list-group"])}}>
    @foreach ($data as $i=> $currentData)
    <li class="list-group-item">$currentData</li>
    @endforeach
    {{ $slot }}
</ul>