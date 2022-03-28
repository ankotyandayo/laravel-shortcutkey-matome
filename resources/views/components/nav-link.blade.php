@props(['active'])

@php
$classes = $active ?? false ? 'hover:text-gray-800 hover:bg-gray-300 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-4 border-gray-300 text-sm font-bold leading-5 text-white focus:border-gray-300 transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-bold leading-5 text-gray-500 hover:text-gray-800 hover:bg-gray-300 hover:border-gray-300 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
