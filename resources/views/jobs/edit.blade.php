<x-layout>
    <x-slot:heading>Edit Job Listing</x-slot>

    <div class="space-y-6 pt-6">
        <form
            method="POST"
            class="mt-2 flex flex-col space-y-2"
            action="{{ route("jobs.update", $job) }}"
        >
            @csrf
            @method("PATCH")
            <x-input
                label="Position"
                name="position"
                value="{{ $job->position }}"
                required
            />

            <x-input
                label="Location"
                name="location"
                value="{{ $job->location }}"
                required
            />

            <x-input
                label="Salary"
                name="salary"
                value="{{ $job->salary }}"
                required
            />

            <x-button as="button" type="submit">Update</x-button>
        </form>
    </div>
</x-layout>
