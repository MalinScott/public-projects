@props(['name', 'type' => 'text'])


<x-form.field>
    <x-form.label name="{{$name}}"/>
    <input class="border border-gray-300 rounded p-2 w-full" type="{{$type}}" name="{{$name}}" id="{{$name}}"
            {{$attributes(['value' => old($name)])}}>
    <x-form.error name="{{$name}}"/>
</x-form.field>

