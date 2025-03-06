<x-layout>
    <x-slot:heading>
        {{ $job->position }} for {{ $job->employer->name }}
    </x-slot>

    @can("update", $job)
        <x-slot:action>
            <x-button as="a" href="{{ route('jobs.edit', $job) }}">
                Edit
            </x-button>
        </x-slot>
    @endcan

    <div>
        <div class="mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
                <div class="py-6 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">
                        {{ __("Employer") }}
                    </dt>
                    <dd
                        class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                    >
                        <a
                            href="{{ route("employers.show", $job->employer) }}"
                        >
                            {{ $job->employer->name }}
                        </a>
                    </dd>
                </div>
                <div class="py-6 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">
                        {{ __("Position") }}
                    </dt>
                    <dd
                        class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                    >
                        <a
                            href="{{ route("jobs.index", ["search" => $job->position]) }}"
                        >
                            {{ $job->position }}
                        </a>
                    </dd>
                </div>
                <div class="py-6 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">
                        {{ __("Location") }}
                    </dt>
                    <dd
                        class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                    >
                        {{ $job->employer->location }}
                    </dd>
                </div>
                <div class="py-6 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">
                        Salary
                    </dt>
                    <dd
                        class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                    >
                        {{ Number::currency($job->salary / 100) }}
                    </dd>
                </div>
                <div class="py-6 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">
                        Tags
                    </dt>
                    <dd
                        class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                    >
                        <ul class="flex flex-wrap gap-2">
                            {{-- check if job has tags property --}}

                            {{--
                                @foreach ($job->tags as $tag)
                                <li>
                                <a
                                class="rounded-full bg-gray-200 py-1 px-2 text-xs font-semibold text-gray-800 transition duration-150 ease-in-out hover:bg-gray-300"
                                href="{{ route("tags.show", $tag) }}"
                                >
                                {{ $tag->name }}
                                </a>
                                </li>
                                @endforeach
                            --}}
                        </ul>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</x-layout>
