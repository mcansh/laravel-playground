<x-layout>
    <x-slot name="heading">{{ $employer->name }} Listings</x-slot>

    <div class="space-y-6 pt-6">
        <div class="flex items-center justify-between">
            <p>
                <x-button
                    as="a"
                    href="{{ route('employers.edit', $employer) }}"
                >
                    Edit
                </x-button>
            </p>

            <p>
                <x-button
                    as="a"
                    href="{{ route('jobs.create', ['employer' => $employer->id]) }}"
                >
                    New Job Listing
                </x-button>
            </p>
        </div>

        <form method="GET">
            <x-input
                label="Search"
                name="search"
                placeholder="Search job listings"
                value="{{ request('search') }}"
            />
        </form>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
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
                                {{ $employer->name }}
                            </dd>
                        </div>
                        <div class="mt-4 flex w-full flex-none gap-x-4 px-6">
                            <dt class="flex-none">
                                <span class="sr-only">Location</span>
                            </dt>
                            <dd class="text-sm leading-6 text-gray-500">
                                {{ $employer->location }}
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
    </div>
</x-layout>
