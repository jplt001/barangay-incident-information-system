@if($type !="checkbox")
<div class="form-group {{ isset($formGroupClass) ? $formGroupClass : '' }}">
    @if(isset($floatinglabel)  && $floatinglabel == true)
    <label for="{{ $id }}" class="floating-label">{{ $label}}</label>
    @else
    <label for="{{ $id }}">{{isset($label) ? $label: 'Label'}}</label>
    @endif
    <input {{ $attributes->except(["label", "formgroupclass", "floatinglabel"])->merge(["class"=> "form-control"]) }} >
    @error($name)
        <x-input-error :message="$message"/>
    @enderror
</div>
@elseif ($type === "checkbox")
<div class="custom-control custom-checkbox{{ isset($formgroupclass) ? ' '.$formgroupclass : '' }}">
    <input type="checkbox" {{ $attributes->except(["label", "formgroupclass", "floatinglabel"])->merge(["class"=>"custom-control-input"])}}>
   <label for="{{ $id }}" class="custom-control-label">{{ isset($label) ? $label : 'Label' }}</label>
    @error($name)
        <x-input-error :message="$message"/>
    @enderror

</div>
@endif