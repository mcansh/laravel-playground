<x-layout>
    <x-slot name="heading">{{ $employer->name }} Listings</x-slot>

    <a href="/employers/{{ $employer->id }}/edit">Edit</a>

    <a href="/jobs/create?employer={{ $employer->id }}">New Job Listing</a>

    <ul>
        @foreach ($employer->jobs as $job)
            <li>
                <a href="/jobs/{{ $job->id }}">{{ $job->position }}</a>
            </li>
        @endforeach
    </ul>
</x-layout>
