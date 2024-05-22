<x-layout>
    <x-slot name="heading">{{ $employer->name }} Listings</x-slot>

    <ul>
        @foreach ($employer->jobs as $job)
            <li>
                <a href="/jobs/{{ $job->id }}">{{ $job->position }}</a>
            </li>
        @endforeach
    </ul>
</x-layout>
