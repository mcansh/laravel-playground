<x-layout>
    <x-slot name="heading">Tags</x-slot>

    <div class="space-y-6 pt-6">
        <ul>
            @foreach ($tags as $tag)
                <li>
                    <a href="{{ route("tags.show", $tag) }}">
                        {{ $tag->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>
