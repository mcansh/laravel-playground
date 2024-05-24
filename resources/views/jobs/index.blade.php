<x-layout>
    <x-slot:heading>Job Listings</x-slot>
    <x-slot:action>
        <x-button as="a" href="{{ route('jobs.create') }}">
            <span class="hidden md:block">Create New Job Listing</span>
            <span class="block md:hidden">Add New</span>
        </x-button>
    </x-slot>

    <div class="space-y-6 pt-6">
        <form method="GET">
            <input
                type="search"
                name="search"
                placeholder="Search for a job"
                class="w-full rounded border border-gray-200 px-4 py-2"
                value="{{ request("search") }}"
            />
        </form>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($jobs as $job)
                <div
                    class="flex flex-col rounded-lg bg-gray-50 shadow-sm ring-1 ring-gray-900/5"
                >
                    <dl class="flex flex-auto flex-wrap">
                        <div
                            class="flex w-full justify-between space-x-6 px-6 pt-6"
                        >
                            <div class="flex-auto">
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
                            <div class="flex-none">
                                <dt class="sr-only">Status</dt>
                                <dd
                                    class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20"
                                >
                                    Hiring
                                </dd>
                            </div>
                        </div>
                        <div class="px-3">
                            <div
                                class="mt-6 flex w-full flex-none gap-x-4 border-t border-gray-900/5 pt-6"
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
                            <div class="mt-4 flex w-full flex-none gap-x-4">
                                <dt class="flex-none">
                                    <span class="sr-only">Location</span>
                                </dt>
                                <dd class="text-sm leading-6 text-gray-500">
                                    {{ $job->location }}
                                </dd>
                            </div>
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
