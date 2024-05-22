<x-layout>
    <x-slot:heading>Job Listings</x-slot>

    <a
        href="/jobs/create"
        class="mt-2 inline-block rounded bg-indigo-500 px-4 py-2 text-white transition duration-200 hover:bg-indigo-700"
    >
        Create New Job Listing
    </a>

    <ul class="list-disc space-y-2 pl-4 pt-6">
        @foreach ($jobs as $job)
            <li>
                <strong>{{ $job->position }}</strong>
                <p>Company: {{ $job->company }}</p>
                <p>Location: {{ $job->location }}</p>
                <p>Salary: {{ Number::currency($job->salary) }}</p>
                <a href="/jobs/{{ $job->id }}" class="text-blue-500">
                    View
                    <span aria-hidden="true">&rarr;</span>
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
