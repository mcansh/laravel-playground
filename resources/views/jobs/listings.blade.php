<x-layout>
    <x-slot:heading>Job Listings</x-slot>

    <a
        href="/jobs/create"
        class="inline-block rounded bg-indigo-500 px-4 py-2 text-white transition duration-200 hover:bg-indigo-700"
    >
        Create New Job Listing
    </a>

    <ul class="list-disc space-y-2 pl-4 pt-6">
        @foreach ($jobs as $job)
            <li>
                <strong>{{ $job->position }}</strong>
                <p>
                    Company:
                    <a
                        class="text-indigo-600"
                        href="/companies/{{ $job->employer->id }}"
                    >
                        {{ $job->employer->name }}
                    </a>
                </p>

                <p>Location: {{ $job->location }}</p>
                <p>Salary: {{ $job->salary }}</p>
                <a href="/jobs/{{ $job->id }}" class="text-blue-500">
                    View
                    <span aria-hidden="true">&rarr;</span>
                </a>
            </li>
        @endforeach
    </ul>

    <div class="mt-6">
        @if ($page > 1)
            <a
                href="/jobs?page={{ $page - 1 }}"
                class="inline-block rounded bg-indigo-500 px-4 py-2 text-white transition duration-200 hover:bg-indigo-700"
            >
                Previous
            </a>
        @endif

        @if ($hasMore)
            <a
                class="inline-block rounded bg-indigo-500 px-4 py-2 text-white transition duration-200 hover:bg-indigo-700"
                href="/jobs?page={{ $page + 1 }}"
            >
                Next
            </a>
        @endif
    </div>
</x-layout>
