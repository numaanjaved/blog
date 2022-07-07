@props(['active' => false])

@php
    $classes = "block text-left text-sm leading-6 px-3 hover:bg-blue-500 hover:text-white focus:bg-blue-500";

    if($active) $classes .= 'text-white bg-blue-500';
@endphp
<a {{ $attributes(['class' => $classes])}}>
    {{$slot}}
</a>
