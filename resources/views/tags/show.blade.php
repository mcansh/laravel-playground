<x-layout>
    <x-slot name="heading">
        Jobs for Tag:
        <code>{{ $tag->name }}</code>
    </x-slot>

    <div class="space-y-6 pt-6">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($tag->jobs as $job)
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
                                    {{ Number::currency($job->salary / 100) }}
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
                                    {{ $job->employer->location }}
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
    </div>
</x-layout>
