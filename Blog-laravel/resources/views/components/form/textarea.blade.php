@props(['name'])
<x-form.field>
    <x-form.label name="{{$name}}"/>
    <textarea class="border border-gray-300 rounded p-2 w-full" name="{{$name}}" id="{{$name}}"
              required>{{$slot ?? old($name)}}</textarea>
    <x-form.error name="{{$name}}"/>
</x-form.field>


