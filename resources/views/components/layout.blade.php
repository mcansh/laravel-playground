<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Laravel</title>

        @vite("resources/css/app.css")
    </head>
    <body>
        <nav>
            <x-nav-link href="/">Home</x-nav-link>
            <x-nav-link href="/about">About</x-nav-link>
            <x-nav-link href="/contact">Contact</x-nav-link>
        </nav>
        <div class="pt-4">
            {{-- long form --}}
            {{-- <?php echo $slot; ?> --}}
            {{-- short form --}}
            {{ $slot }}
        </div>
    </body>
</html>
