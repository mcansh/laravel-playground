<x-layout>
    <x-slot:heading>Job Listing</x-slot>

    <div class="space-y-2 pt-2">
        <h2 class="text-lg font-bold">Company: {{ $job->company }}</h2>
        <h3>Position: {{ $job->position }}</h3>
        <p>Location: {{ $job->location }}</p>
        <p>Salary: {{ $job->salary }}</p>

        <a
            href="/jobs/{{ $job->id }}/edit"
            class="mt-6 inline-block rounded bg-indigo-500 px-4 py-2 text-white transition duration-200 hover:bg-indigo-700"
        >
            Edit
        </a>
    </div>
</x-layout>
