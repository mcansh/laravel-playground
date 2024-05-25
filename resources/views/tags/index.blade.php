<x-layout>
    <x-slot name="heading">Tags</x-slot>

    <div class="space-y-6 pt-6">
        <form method="GET">
            <div class="flex flex-wrap gap-4">
                <x-input
                    label="Search"
                    name="search"
                    placeholder="Search tags"
                    value="{{ request('search') }}"
                />
            </div>
        </form>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($tags as $tag)
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
                                    {{ $tag->name }}
                                </dt>
                            </div>

                            <div class="flex-none">
                                <dt class="sr-only">Status</dt>
                                <dd
                                    class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20"
                                >
                                    {{ $tag->jobs_count }}
                                    job{{ $tag->jobs_count === 1 ? "" : "s" }}
                                </dd>
                            </div>
                        </div>
                    </dl>
                    <div class="mt-6 border-t border-gray-900/5 px-6 py-6">
                        <a
                            href="{{ route("tags.show", $tag) }}"
                            class="text-sm font-semibold leading-6 text-gray-900"
                        >
                            View Tagged Jobs
                            <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
