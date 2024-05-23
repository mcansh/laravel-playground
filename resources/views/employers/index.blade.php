<x-layout>
    <x-slot name="heading">All Employers</x-slot>

    <div class="space-y-6 pt-6">
        <ul class="space-y-2">
            @foreach ($employers as $employer)
                <li>
                    <a href="{{ route("employers.show", $employer) }}">
                        {{ $employer->name }} ({{ $employer->jobs->count() }})
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>
