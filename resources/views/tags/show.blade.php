<x-layout>
    <x-slot name="heading">
        Jobs for Tag:
        <code>{{ $tag->name }}</code>
    </x-slot>

    <div class="space-y-6 pt-6">
        <ul>
            @foreach ($tag->jobs as $job)
                <li>
                    <a href="{{ route("jobs.show", $job) }}">
                        {{ $job->position }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>
