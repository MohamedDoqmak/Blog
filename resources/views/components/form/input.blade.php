@props(['name', 'type'=>'text'])


<x-form.section>
    <x-form.lable name="{{ $name }}" />

    <input class="w-full p-2 border border-gray-400 rounded" type="{{ $type }}" id="{{$name}}" name="{{$name}}"
        value="{{ old($name) }}" required>

    <x-form.error name="{{ $name }}" />
</x-form.section>
