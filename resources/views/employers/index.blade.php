<x-layout>
    <x-slot name="heading">All Employers</x-slot>

    <div class="space-y-6 pt-6">
        <form method="GET">
            <x-input
                label="Search"
                name="search"
                placeholder="Search employers"
                value="{{ request('search') }}"
            />
        </form>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($employers as $employer)
                <div
                    class="rounded-lg bg-gray-50 shadow-sm ring-1 ring-gray-900/5"
                >
                    <dl class="flex flex-wrap">
                        <div class="flex-auto pl-6 pt-6">
                            <dt
                                class="text-sm font-semibold leading-6 text-gray-900"
                            >
                                {{ $employer->name }}
                            </dt>

                            <dd
                                class="mt-1 text-base font-semibold leading-6 text-gray-900"
                            >
                                {{ $employer->jobs->count() }}
                                job{{ $employer->jobs->count() === 1 ? "" : "s" }}
                                available
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
                    </dl>
                    <div class="mt-6 border-t border-gray-900/5 px-6 py-6">
                        <a
                            href="{{ route("employers.show", $employer) }}"
                            class="text-sm font-semibold leading-6 text-gray-900"
                        >
                            View Employer
                            <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
