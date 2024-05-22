<x-layout>
    <x-slot:heading>Job Listings</x-slot>

    <ul class="list-disc space-y-2 pl-4 pt-6">
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job->id }}" class="text-blue-500">
                    <strong>{{ $job->position }}</strong>
                    <p>Company: {{ $job->company }}</p>
                    <p>Location: {{ $job->location }}</p>
                    <p>Salary: {{ Number::currency($job->salary) }}</p>
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
