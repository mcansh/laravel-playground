<x-layout>
    <x-slot:heading>New Job Listing</x-slot>
    <form
        method="POST"
        class="mt-2 flex flex-col space-y-2"
        action="{{ route("jobs.store") }}"
    >
        @csrf
        <input
            class="rounded"
            type="text"
            name="position"
            placeholder="Title"
        />
        <input
            class="rounded"
            type="text"
            name="location"
            placeholder="Location"
        />
        <input class="rounded" type="text" name="salary" placeholder="Salary" />
        <input
            class="rounded"
            type="text"
            name="tags"
            placeholder="Tags (comma separated)"
        />

        @if (request("employer"))
            <input
                type="hidden"
                name="employer_id"
                value="{{ request("employer") }}"
            />
        @else
            <input
                class="rounded"
                type="text"
                name="employer"
                placeholder="Employer Name"
            />
        @endif
        <button
            class="rounded bg-indigo-500 px-4 py-2 text-white transition duration-200 hover:bg-indigo-700"
            type="submit"
        >
            Create
        </button>
    </form>
</x-layout>
