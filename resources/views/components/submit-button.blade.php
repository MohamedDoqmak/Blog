@props(['name'])
<x-form.section>
    <button type="submit"
        class="bg-blue-400 text-white uppercase font-semibold text-sm rounded-2xl py-2 px-4 hover:bg-blue-600">
        {{ $name }}
    </button>
</x-form.section>
