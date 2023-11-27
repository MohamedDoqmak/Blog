@props(['name'])


<x-form.section>
    <x-form.lable name="{{ $name }}" />

    <textarea class="w-full p-2 border border-gray-400 rounded" id="{{$name}}" name="{{$name}}" required
        {{$attributes}}> {{ $slot?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />
</x-form.section>
