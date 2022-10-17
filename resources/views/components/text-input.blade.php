@props(['disabled' => false, "label"=> "Label"])

<div class="form-floating">
    <input {{ $disabled ? 'disabled' : ''}} {!!  $attributes->merge(['class' => 'form-control']) !!} >
    <label for="">{{$label}}</label>
</div>
{{--  <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>  --}}
