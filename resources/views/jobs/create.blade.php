<x-layout>
    <x-slot:heading>Create Job Listing</x-slot>

    <div class="space-y-6 pt-6">
        <form
            method="POST"
            class="mt-2 flex flex-col space-y-2"
            action="{{ route("jobs.store") }}"
        >
            @csrf

            <x-form-field
                label="Position"
                name="position"
                placeholder="Shift Leader"
                required
            />

            <x-form-field
                label="Location"
                name="location"
                placeholder="Springfield, IL"
                required
            />

            <label
                for="salary"
                class="block text-sm font-medium leading-6 text-gray-900"
            >
                Salary
            </label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <div
                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                >
                    <span class="text-gray-500 sm:text-sm">$</span>
                </div>
                <input
                    type="text"
                    name="salary"
                    id="salary"
                    class="block w-full rounded-md border-0 py-1.5 pr-12 pl-7 text-gray-900 ring-1 ring-gray-300 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 focus:ring-inset sm:text-sm sm:leading-6"
                    placeholder="30000"
                    aria-describedby="salary-currency"
                    inputmode="numeric"
                    pattern="[0-9]*"
                />
            </div>

            @if (request("employer"))
                <input
                    type="hidden"
                    name="employer_id"
                    value="{{ request("employer") }}"
                />
            @else
                <x-form-field
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
