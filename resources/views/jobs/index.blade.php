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
            <div>
                <x-form-field
                    type="search"
                    label="Search"
                    name="search"
                    placeholder="Search job listings"
                    value="{{ request('search') }}"
                />
            </div>
        </form>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($jobs as $job)
                <div
                    class="flex flex-col rounded-lg bg-gray-50 ring-1 shadow-sm ring-gray-900/5"
                >
                    <dl class="flex flex-auto flex-wrap">
                        <div
                            class="flex w-full justify-between space-x-6 pt-6 px-6"
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
                                    {{ Number::currency($job->salary / 100) }}
                                </dd>
                            </div>
                            <div class="flex-none">
                                <dt class="sr-only">Status</dt>
                                <dd
                                    class="inline-flex items-center rounded-md bg-green-50 py-1 px-2 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset"
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
                                    {{ $job->employer->location }}
                                </dd>
                            </div>
                        </div>
                    </dl>
                    <div class="mt-6 border-t border-gray-900/5 py-6 px-6">
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
