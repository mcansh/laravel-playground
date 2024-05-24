<x-layout>
    <x-slot name="heading">All Employers</x-slot>

    <div class="space-y-6 pt-6">
        <form method="GET">
            <input
                type="search"
                name="search"
                placeholder="Search for an employer"
                class="w-full rounded border border-gray-200 px-4 py-2"
                value="{{ request("search") }}"
            />
        </form>

        <ul class="space-y-2">
            @foreach ($employers as $employer)
                <li>
                    <a href="{{ route("employers.show", $employer) }}">
                        {{ $employer->name }} ({{ $employer->jobs->count() }})
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>
