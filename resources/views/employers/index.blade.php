<x-layout>
    <x-slot name="heading">All Employers</x-slot>

    <ul>
		@foreach ($employers as $employer)
			<li>
				<a href="/employers/{{ $employer->id }}">{{ $employer->name }} ({{$employer->jobs->count()}})</a>
			</li>
		@endforeach
</x-layout>
