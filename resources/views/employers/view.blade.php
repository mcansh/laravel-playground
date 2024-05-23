<x-layout>
    <x-slot name="heading">{{ $employer->name }} Listings</x-slot>

    <div class="flex items-center justify-between">
        <p>
            <x-button as="a" href="{{ route('employers.edit', $employer) }}">
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

    <ul>
        @foreach ($employer->jobs as $job)
            <li>
                <a href="{{ route("jobs.show", $job) }}">
                    {{ $job->position }}
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
