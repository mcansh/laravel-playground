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

        <label>
            <span class="block">Tags</span>
            <input
                class="w-full rounded"
                type="text"
                name="tags"
                value="{{ $job->tags->pluck("name")->join(", ") }}"
            />
        </label>

        <x-button as="button" type="submit">Update</x-button>
    </form>
</x-layout>
