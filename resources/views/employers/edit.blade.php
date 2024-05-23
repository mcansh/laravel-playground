<x-layout>
    <x-slot name="heading">Edit Employer</x-slot>

    <form
        method="POST"
        class="mt-2 flex flex-col space-y-2"
        action="/employers/{{ $employer->id }}"
    >
        @csrf
        @method("PUT")

        <label>
            <span class="block">Name</span>
            <input
                class="w-full rounded"
                type="text"
                name="name"
                value="{{ $employer->name }}"
            />
        </label>

        <x-button as="button" type="submit">Update</x-button>
    </form>
</x-layout>
