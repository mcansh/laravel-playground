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

        <div class="grid grid-cols-4 gap-4">
            @foreach ($jobs as $job)
                <div
                    class="rounded-lg bg-gray-50 shadow-sm ring-1 ring-gray-900/5"
                >
                    <dl class="flex flex-wrap">
                        <div class="flex-auto pl-6 pt-6">
                            <dt
                                class="text-sm font-semibold leading-6 text-gray-900"
                            >
                                {{ $job->position }}
                            </dt>
                            <dd
                                class="mt-1 text-base font-semibold leading-6 text-gray-900"
                            >
                                {{ $job->salary }}
                            </dd>
                        </div>
                        <div class="flex-none self-end px-6 pt-4">
                            <dt class="sr-only">Status</dt>
                            <dd
                                class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20"
                            >
                                Hiring
                            </dd>
                        </div>
                        <div
                            class="mt-6 flex w-full flex-none gap-x-4 border-t border-gray-900/5 px-6 pt-6"
                        >
                            <dt class="flex-none">
                                <span class="sr-only">Employer</span>
                            </dt>
                            <dd
                                class="text-sm font-medium leading-6 text-gray-900"
                            >
                                {{ $job->employer->name }}
                            </dd>
                        </div>
                        <div class="mt-4 flex w-full flex-none gap-x-4 px-6">
                            <dt class="flex-none">
                                <span class="sr-only">Location</span>
                            </dt>
                            <dd class="text-sm leading-6 text-gray-500">
                                {{ $job->location }}
                            </dd>
                        </div>
                    </dl>
                    <div class="mt-6 border-t border-gray-900/5 px-6 py-6">
                        <a
                            href="{{ route("jobs.show", $job) }}"
                            class="text-sm font-semibold leading-6 text-gray-900"
                        >
                            View Listing
                            <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $jobs->links() }}
    </div>
</x-layout>
