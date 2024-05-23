<x-layout>
    <x-slot name="heading">
        Tags
    </x-slot>

    <ul>
        @foreach ($tags as $tag)
            <li>
                <a href="{{ route("tags.show", $tag) }}">
                    {{ $tag->name }}
                </a>
            </li>
        @endforeach
</x-layout>
