@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pb-1 border-t-2 border-indigo-400 text-sm font-medium leading-5 text-white focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pb-1 border-t-2 border-transparent text-sm font-medium leading-5 text-slate-100 hover:text-andakTeal focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
