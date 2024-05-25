<x-layout>
    <x-slot:heading>Register</x-slot>

    <div class="space-y-6 pt-6">
        <form
            method="POST"
            class="mt-2 flex flex-col space-y-2"
            action="{{ route("register.store") }}"
        >
            @csrf

            <x-form-field label="First Name" name="first_name" required />

            <x-form-field label="Last Name" name="last_name" required />

            <x-form-field label="Email" name="email" type="email" required />

            <x-form-field
                label="Password"
                name="password"
                type="password"
                required
            />

            <x-form-field
                label="Password Confirmation"
                name="password_confirmation"
                type="password"
                required
            />

            <x-button as="button" type="submit">Register</x-button>
        </form>
    </div>
</x-layout>
