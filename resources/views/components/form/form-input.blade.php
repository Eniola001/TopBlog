@props(['name'])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => "mt-2 p-3 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500",
        'value' => old($name)
    ];
@endphp

<input {{ $attributes($defaults) }}>