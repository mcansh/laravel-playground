<x-layout>
    <x-slot:heading>Job Listings</x-slot>

    <div class="space-y-6 pt-6">
        <div class="flex items-center justify-between">
            <form method="GET">
                <input
                    type="search"
                    name="search"
                    placeholder="Search for a job"
                    class="rounded border border-gray-200 px-4 py-2"
                    value="{{ request("search") }}"
                />
            </form>

            <a
                href="{{ route("jobs.create") }}"
                class="inline-block rounded bg-indigo-500 px-4 py-2 text-white transition duration-200 hover:bg-indigo-700"
            >
                Create New Job Listing
            </a>
        </div>

        <ul class="list-disc space-y-2 pl-4">
            @foreach ($jobs as $job)
                <li>
                    <strong>{{ $job->position }}</strong>
                    <p>
                        Company:
                        <a
                            class="text-indigo-600"
                            href="{{ route("employers.show", $job->employer) }}"
                        >
                            {{ $job->employer->name }}
                        </a>
                    </p>

                    <p>Location: {{ $job->location }}</p>
                    <p>Salary: {{ $job->salary }}</p>
                    <a
                        class="text-blue-500"
                        href="{{ route("jobs.show", $job) }}"
                    >
                        View
                        <span aria-hidden="true">&rarr;</span>
                    </a>
                </li>
            @endforeach
        </ul>

        {{ $jobs->links() }}
    </div>
</x-layout>
