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

        <button
            class="rounded bg-indigo-500 px-4 py-2 text-white transition duration-200 hover:bg-indigo-700"
            type="submit"
        >
            Update
        </button>
    </form>
</x-layout>
