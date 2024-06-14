@php
    $classes = [
        "default" => "block rounded-md bg-indigo-600 py-2.5 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600",

        "destroy" => "block rounded-md bg-red-600 py-2.5 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600",
    ];
@endphp

@props([
    "as",
    "variant" => "default",
])

@if ($as === "a")
    <a
        {{ $attributes->merge(["class" => $classes[$variant]]) }}
        {{ $attributes }}
    >
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes->merge(["class" => $classes[$variant]]) }}
        {{ $attributes }}
    >
        {{ $slot }}
    </button>
@endif
