@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}"/>

    <input class="border border-gray-200 p-2 w-full rounded"
           name="{{ $name }}"
           id="{{ $name }}"
           {{ $attributes(['value' => old($name)]) }}{{-- to accept any type of attributes --}}
    >

    <x-form.error name="{{ $name }}"/>
</x-form.field>
