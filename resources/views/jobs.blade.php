<x-layout>
    <x-slot:heading>Job Listings</x-slot>

    <ul class="list-disc space-y-2 pt-6">
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job["id"] }}">
                    <strong>
                        {{ $job["title"] }}: Pays ${{ $job["salary"] }} per
                        year.
                    </strong>
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
