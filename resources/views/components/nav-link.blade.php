@props(['active'])

@php
$classes = $active ?? false ? 'hover:text-gray-800 hover:bg-gray-300 inline-flex items-center px-1 pt-1 text-sm font-bold leading-5 text-white transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-bold leading-5 text-white hover:text-gray-800 hover:bg-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
