<!DOCTYPE html>
<htm>
    <head>
        <meta charset="utf-8">

        <title>Tweet</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

        <!-- Scripts -->
        {{--        @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
    </head>
    <body class="font-sans antialiased">
    <div id="app">
        <section class="px-8 mt-3 mb-10">
            <header class="container mx-auto">
                <h1>
                    <img src="/images/logo.svg"
                         alt="Tweety">
                </h1>
            </header>
        </section>

        {{ $slot }}
    </div>
    </body>
</htm>
