<x-layout>
    <x-slot name="heading">
        Edit Tag:
        <code>{{ $tag->name }}</code>
    </x-slot>

    <div class="space-y-6 pt-6">
        <form method="POST" action="{{ route("tags.update", $tag) }}">
            @csrf
            @method("PUT")

            <input type="text" name="name" value="{{ $tag->name }}" />

            <x-button as="button">Save</x-button>
        </form>
    </div>
</x-layout>
