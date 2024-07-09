@props(['active' => false])

@php
    $classes = "block text-left px-3 text-md leading-6 hover:bg-blue-500 focus:bg-blue-500
    hover:text-white
    focus:text-white mx-1 rounded-md";

    if($active) $classes .= 'bg-blue-500 text-blue-500'
@endphp

<a {{ $attributes(['class'=>$classes]) }}
>
    {{ $slot }}
</a>
