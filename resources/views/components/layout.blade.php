<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Laravel</title>

        @vite("resources/css/app.css")
    </head>
    <body class="px-4 pt-4">
        <nav>
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
        </nav>
        <div class="pt-4">
            {{-- long form --}}
            {{-- <?php echo $slot; ?> --}}
            {{-- short form --}}
            {{ $slot }}
        </div>
    </body>
</html>
