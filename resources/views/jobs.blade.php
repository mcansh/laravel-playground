<x-layout>
    <x-slot:heading>Job Listings</x-slot>

    <ul class="list-disc space-y-2 pt-6">
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job->id }}" class="text-blue-500">
                    <strong>{{ $job->position }}</strong>
                    <br />
                    Company: {{ $job->company }}
                    <br />
                    Location: {{ $job->location }}
                    <br />
                    Salary: ${{ number_format($job->salary) }}
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
