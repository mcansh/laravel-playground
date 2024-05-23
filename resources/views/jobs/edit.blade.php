<x-layout>
    <x-slot:heading>Edit Job Listing</x-slot>

    <form
        method="POST"
        class="mt-2 flex flex-col space-y-2"
        action="{{ route("jobs.update", $job) }}"
    >
        @csrf
        @method("PATCH")
        <label>
            <span class="block">Position</span>
            <input
                class="w-full rounded"
                type="text"
                name="position"
                value="{{ $job->position }}"
            />
        </label>

        <label>
            <span class="block">Location</span>
            <input
                class="w-full rounded"
                type="text"
                name="location"
                value="{{ $job->location }}"
            />
        </label>

        <label>
            <span class="block">Salary</span>
            <input
                class="w-full rounded"
                type="text"
                name="salary"
                inputmode="numeric"
                value="{{ $job->salary }}"
            />
        </label>

        <label>
            <span class="block">Employer</span>
            <input
                class="w-full rounded"
                type="text"
                name="employer"
                value="{{ $job->employer->name }}"
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
