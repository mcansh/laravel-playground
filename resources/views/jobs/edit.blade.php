<x-layout>
    <x-slot:heading>Edit Job Listing</x-slot>

    <div class="pt-6">
        <form
            method="POST"
            class="flex flex-col space-y-6"
            action="{{ route("jobs.update", $job) }}"
        >
            @csrf
            @method("PATCH")

            <x-form-field
                label="Position"
                name="position"
                value="{{ $job->position }}"
                required
            />

            <x-form-field
                label="Salary"
                name="salary"
                value="{{ $job->salary }}"
                required
            />

            <select name="tags" class="">
                <option value="">Select a tag</option>
                @foreach ($tags as $tag)
                    <pre>{{ $job->tags->contains($tag) }}</pre>
                    <option
                        value="{{ $tag->id }}"
                        {{ $job->tags->contains($tag) ? "selected" : "" }}
                    >
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>

            <div class="flex space-x-2">
                <x-button as="button" type="submit">Update</x-button>

                <x-button
                    as="button"
                    variant="destroy"
                    type="submit"
                    form="destroy-job-form"
                >
                    Delete
                </x-button>
            </div>
        </form>

        <form
            id="destroy-job-form"
            method="POST"
            action="{{ route("jobs.destroy", $job) }}"
        >
            @csrf
            @method("DELETE")
        </form>
    </div>
</x-layout>
