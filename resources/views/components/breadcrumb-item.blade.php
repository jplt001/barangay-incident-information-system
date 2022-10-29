@if(isset($iscurrent) && $iscurrent == true)
    <li class="breadcrumb-item">
        <a {{ $attributes->except(['icon', 'label', 'iscurrent'])->merge(['']) }}>
            @if(isset($icon))
            <x-icon name="{{$icon}}"/>
            @endif
            {{isset($label) ? $label : 'Label'}}
        </a>
    </li>
@else
    <li class="breadcrumb-item">
        <a {{$attributes->except(["label", 'iscurrent'])->merge([])}}>

            

            @if(isset($icon))

            <x-icon name="{{$icon}}"/>
            @else
            <x-icon name="icon-home"/>
            @endif
            
            {{ isset($label) ? $label : 'Label' }}
        </a>
    </li>
@endif