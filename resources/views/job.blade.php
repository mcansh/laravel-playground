<x-layout>
    <x-slot:heading>Job Listing</x-slot>

    <div class="space-y-2 pt-2">
        <h2 class="text-lg font-bold">Company: {{ $job->company }}</h2>
        <h3>Position: {{ $job->position }}</h3>
        <p>Location: {{ $job->location }}</p>
        <p>Salary: {{ Number::currency($job->salary) }}</p>
    </div>
</x-layout>
