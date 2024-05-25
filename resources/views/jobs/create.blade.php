<x-layout>
    <x-slot:heading>Create Job Listing</x-slot>

    <div class="space-y-6 pt-6">
        <form
            method="POST"
            class="mt-2 flex flex-col space-y-2"
            action="{{ route("jobs.store") }}"
        >
            @csrf

            <x-input
                label="Position"
                name="position"
                placeholder="Shift Leader"
                required
            />

            <x-input
                label="Location"
                name="location"
                placeholder="Springfield, IL"
                required
            />

            <x-input
                label="Salary"
                name="salary"
                placeholder="$30,000"
                required
            />

            @if (request("employer"))
                <input
                    type="hidden"
                    name="employer_id"
                    value="{{ request("employer") }}"
                />
            @else
                <x-input
                    label="Employer"
                    name="employer"
                    placeholder="Acme Corp."
                    required
                />
            @endif
            <x-button as="button" type="submit">Create</x-button>
        </form>
    </div>
</x-layout>
