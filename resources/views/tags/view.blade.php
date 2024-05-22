<x-layout>
    <x-slot name="heading">
        Jobs for Tag:
        <code>{{ $tag->name }}</code>
    </x-slot>

    <ul>
        @foreach ($tag->jobs as $job)
            <li>
                <a href="/jobs/{{ $job->id }}">
                    {{ $job->position }}
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
