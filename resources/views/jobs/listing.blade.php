<x-layout>
    <x-slot:heading>Job Listing</x-slot>

    <div class="space-y-2 pt-2">
        <h2 class="text-lg font-bold">
            Company:
            <a
                class="text-indigo-600"
                href="/companies/{{ $job->employer->id }}"
            >
                {{ $job->employer->name }}
            </a>
        </h2>
        <h3>Position: {{ $job->position }}</h3>
        <p>Location: {{ $job->location }}</p>
        <p>Salary: {{ $job->salary }}</p>

        <div class="flex space-x-2 pt-6">
            <a
                href="/jobs/{{ $job->id }}/edit"
                class="block rounded bg-indigo-500 px-4 py-2 text-white transition duration-200 hover:bg-indigo-700"
            >
                Edit
            </a>

            <form method="POST">
                @csrf
                <button
                    type="submit"
                    class="block rounded bg-red-500 px-4 py-2 text-white transition duration-200 hover:bg-red-700"
                >
                    Delete
                </button>
            </form>
        </div>
    </div>
</x-layout>
