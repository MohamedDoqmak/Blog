@props(['name'])


<x-form.section>
    <x-form.lable name="{{ $name }}" />

    <textarea class="w-full p-2 border border-gray-400 rounded" id="{{$name}}" name="{{$name}}" value="{{ old($name) }}"
        required></textarea>

    <x-form.error name="{{ $name }}" />
</x-form.section>
