<x-layout>
    <x-slot:heading>Job Listing</x-slot>

    <div class="space-y-2 pt-2">
        <h2 class="text-lg font-bold">Position: {{ $job["title"] }}</h2>
        <p>
            This position pays ${{ number_format($job["salary"]) }} per year.
        </p>
    </div>
</x-layout>
