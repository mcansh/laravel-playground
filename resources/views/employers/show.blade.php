<x-layout>
    <x-slot name="heading">{{ $employer->name }} Listings</x-slot>

    <div class="space-y-6 pt-6">
        <div class="flex items-center justify-between">
            @can("update", $employer)
                <x-button
                    as="a"
                    href="{{ route('employers.edit', $employer) }}"
                >
                    Edit
                </x-button>
            @endcan

            <x-button
                as="a"
                href="{{ route('jobs.create', ['employer' => $employer->id]) }}"
            >
                New Job Listing
            </x-button>
        </div>

        <form method="GET">
            <x-form-field
                label="Search"
                name="search"
                placeholder="Search job listings"
                value="{{ request('search') }}"
            />
        </form>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($jobs as $job)
                <div
                    class="rounded-lg bg-gray-50 ring-1 shadow-sm ring-gray-900/5"
                >
                    <dl class="flex flex-wrap">
                        <div class="flex-auto pt-6 pl-6">
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
                        <div class="flex-none self-end pt-4 px-6">
                            <dt class="sr-only">Status</dt>
                            @if ($job->hiring)
                                <dd
                                    class="inline-flex items-center rounded-md bg-green-50 py-1 px-2 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset"
                                >
                                    Hiring
                                </dd>
                            @else
                                <dd
                                    class="inline-flex items-center rounded-md bg-red-50 py-1 px-2 text-xs font-medium text-red-700 ring-1 ring-red-600/20 ring-inset"
                                >
                                    Not Hiring
                                </dd>
                            @endif
                        </div>
                        <div
                            class="mt-6 flex w-full flex-none gap-x-4 border-t border-gray-900/5 pt-6 px-6"
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
    </div>
</x-layout>
