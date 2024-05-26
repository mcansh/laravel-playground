<x-layout>
    <x-slot name="heading">Edit Employer</x-slot>

    <div class="space-y-6 pt-6">
        <form
            method="POST"
            class="mt-2 flex flex-col space-y-2"
            action="{{ route("employers.update", $employer) }}"
        >
            @csrf
            @method("PUT")

            <x-form-field
                label="Name"
                name="name"
                value="{{ $employer->name }}"
                required
            />

            <x-button as="button" type="submit">Update</x-button>
        </form>
    </div>
</x-layout>
