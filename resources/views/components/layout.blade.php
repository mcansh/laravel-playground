<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap"
            rel="stylesheet"
        />

        <!-- Styles -->
        @vite("resources/css/app.css")
    </head>
    <body>
        <nav>
            <a class="text-blue-700 hover:underline visited:text-indigo-600 active:text-red-600" href="/">Home</a>
            <a class="text-blue-700 hover:underline visited:text-indigo-600 active:text-red-600" href="/about">About</a>
            <a class="text-blue-700 hover:underline visited:text-indigo-600 active:text-red-600" href="/contact">Contact</a>
        </nav>
        <div class="pt-4">
        	{{-- long form --}}
        	{{-- <?php echo $slot; ?> --}}
 			{{-- short form --}}
			{{ $slot }}
        </div>
    </body>
</html>
