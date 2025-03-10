<x-layout>
    <x-slot name="heading">All Employers</x-slot>

    <div class="space-y-6 pt-6">
        <form method="GET">
            <x-form-field
                label="Search"
                name="search"
                placeholder="Search employers"
                value="{{ request('search') }}"
            />
        </form>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($employers as $employer)
                <div
                    class="rounded-lg bg-gray-50 ring-1 shadow-sm ring-gray-900/5"
                >
                    <dl class="flex flex-wrap">
                        <div class="flex-auto pt-6 pl-6">
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

                        <div class="flex-none self-end pt-4 px-6">
                            <dt class="sr-only">Status</dt>
                            @if ($employer->job->hiring)
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
                    </dl>
                    <div class="mt-6 border-t border-gray-900/5 py-6 px-6">
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
