<x-layout>
    <x-slot:heading>Register</x-slot>

    <div class="space-y-6 pt-6">
        <form
            method="POST"
            class="mt-2 flex flex-col space-y-2"
            action="{{ route("login.store") }}"
        >
            @csrf

            <x-form-field
                label="Email"
                name="email"
                type="email"
                required
                :value="old('email')"
            />

            <x-form-field
                label="Password"
                name="password"
                type="password"
                required
            />

            <x-button as="button" type="submit">Log In</x-button>
        </form>
    </div>
</x-layout>
