@props([
    "active" => false,
    "href",
    "type",
])

{{-- check if mobile or desktop type --}}
@if ($type === "mobile")
    <a
        @class([
            $active
                ? "border-indigo-500 bg-indigo-50 text-indigo-700"
                : "border-transparent text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800",
        ])
        href="{{ $href }}"
        aria-current="{{ $active ? "page" : "false" }}"
    >
        {{ $slot }}
    </a>
@else
    <a
        @class([
            "inline-flex items-center border-b-2 pt-1 px-1 text-sm font-medium",
            $active
                ? "border-indigo-500 text-gray-900"
                : "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700",
        ])
        href="{{ $href }}"
        aria-current="{{ $active ? "page" : "false" }}"
    >
        {{ $slot }}
    </a>
@endif
