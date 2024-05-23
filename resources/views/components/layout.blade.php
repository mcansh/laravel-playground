@props([
    "title",
    "heading",
])

<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ $title ?? $heading }} | {{ config("app.name") }}</title>

        @vite("resources/css/app.css")
    </head>
    <body class="h-full">
        <div class="min-h-full">
            <nav class="border-b border-gray-200 bg-white">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 justify-between">
                        <div class="flex">
                            <div class="flex flex-shrink-0 items-center">
                                <img
                                    class="block h-8 w-auto lg:hidden"
                                    src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                                    alt="Your Company"
                                />
                                <img
                                    class="hidden h-8 w-auto lg:block"
                                    src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                                    alt="Your Company"
                                />
                            </div>
                            <div
                                class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8"
                            >
                                {{-- Current: "border-indigo-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" --}}
                                <x-nav-link
                                    :active="request()->is('/')"
                                    href="/"
                                    type="desktop"
                                >
                                    Home
                                </x-nav-link>
                                <x-nav-link
                                    :active="request()->is('jobs')"
                                    href="/jobs"
                                    type="desktop"
                                >
                                    Jobs
                                </x-nav-link>
                                <x-nav-link
                                    :active="request()->is('employers')"
                                    href="/employers"
                                    type="desktop"
                                >
                                    Employers
                                </x-nav-link>
                                <x-nav-link
                                    :active="request()->is('contact')"
                                    href="/contact"
                                    type="desktop"
                                >
                                    Contact
                                </x-nav-link>
                            </div>
                        </div>
                        <div class="hidden sm:ml-6 sm:flex sm:items-center">
                            <button
                                type="button"
                                class="relative rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">View notifications</span>
                                <svg
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"
                                    />
                                </svg>
                            </button>

                            {{-- Profile dropdown --}}
                            <div class="relative ml-3">
                                <div>
                                    <button
                                        type="button"
                                        class="relative flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                        id="user-menu-button"
                                        aria-expanded="false"
                                        aria-haspopup="true"
                                    >
                                        <span
                                            class="absolute -inset-1.5"
                                        ></span>
                                        <span class="sr-only">
                                            Open user menu
                                        </span>
                                        <img
                                            class="h-8 w-8 rounded-full"
                                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt=""
                                        />
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="-mr-2 flex items-center sm:hidden">
                            {{-- Mobile menu button --}}
                            <button
                                type="button"
                                class="relative inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                aria-controls="mobile-menu"
                                aria-expanded="false"
                            >
                                <span class="absolute -inset-0.5"></span>
                                <span class="sr-only">Open main menu</span>
                                {{--
                                    Menu open: "hidden", Menu closed: "block"
                                --}}
                                <svg
                                    class="block h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                    />
                                </svg>
                                {{--
                                    Menu open: "block", Menu closed: "hidden"
                                --}}
                                <svg
                                    class="hidden h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Mobile menu, show/hide based on menu state. --}}
                <div class="sm:hidden" id="mobile-menu">
                    <div class="space-y-1 pb-3 pt-2">
                        <x-nav-link
                            type="mobile"
                            :active="request()->is('/')"
                            href="#"
                        >
                            Home
                        </x-nav-link>
                        <x-nav-link
                            href="/jobs"
                            type="mobile"
                            :active="request()->is('jobs')"
                        >
                            Jobs
                        </x-nav-link>
                        <x-nav-link
                            href="/contact"
                            type="mobile"
                            :active="request()->is('contact')"
                        >
                            Contact
                        </x-nav-link>
                    </div>
                    <div class="border-t border-gray-200 pb-3 pt-4">
                        <div class="flex items-center px-4">
                            <div class="flex-shrink-0">
                                <img
                                    class="h-10 w-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt=""
                                />
                            </div>
                            <div class="ml-3">
                                <div
                                    class="text-base font-medium text-gray-800"
                                >
                                    Tom Cook
                                </div>
                                <div class="text-sm font-medium text-gray-500">
                                    tom@example.com
                                </div>
                            </div>
                            <button
                                type="button"
                                class="relative ml-auto flex-shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">View notifications</span>
                                <svg
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="py-10">
                <header>
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <h1
                            class="text-3xl font-bold leading-tight tracking-tight text-gray-900"
                        >
                            {{ $heading }}
                        </h1>
                    </div>
                </header>
                <main>
                    <div
                        {{ $attributes->merge(["class" => "mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"]) }}
                    >
                        {{-- Your content --}}
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
        <script type="module" src="{{ mix("resources/js/app.js") }}"></script>
    </body>
</html>
