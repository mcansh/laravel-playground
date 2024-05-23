<x-layout>
    <x-slot:heading>Job Listing</x-slot>

    <div class="space-y-2 pt-2">
        <h2 class="text-lg font-bold">
            Employer:
            <a
                class="text-indigo-600"
                href="{{ route("employers.show", $job->employer) }}"
            >
                {{ $job->employer->name }}
            </a>
        </h2>
        <h3>Position: {{ $job->position }}</h3>
        <p>Location: {{ $job->location }}</p>
        <p>Salary: {{ $job->salary }}</p>

        <h3>Tags:</h3>
        <ul class="flex space-x-2">
            @foreach ($job->tags as $tag)
                <li>
                    <a
                        href="{{ route("tags.show", $tag) }}"
                        class="rounded-full bg-indigo-500 px-2 py-1 text-white"
                    >
                        {{ $tag->name }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="flex space-x-2 pt-6">
            <a
                href="{{ route("jobs.edit", $job) }}"
                class="block rounded bg-indigo-500 px-4 py-2 text-white transition duration-200 hover:bg-indigo-700"
            >
                Edit
            </a>

            <form method="POST" action="{{ route("jobs.destroy", $job) }}">
                @csrf
                @method("DELETE")
                <button
                    type="submit"
                    class="block rounded bg-red-500 px-4 py-2 text-white transition duration-200 hover:bg-red-700"
                >
                    Delete
                </button>
            </form>
        </div>
    </div>
</x-layout>
