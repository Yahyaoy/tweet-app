<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Tweet</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
{{--        <script src="https://unpkg.com/turbolinks"></script>--}}
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <style>
            /*.need-flex:not(:first-child){*/
            /*   justify-content: space-between ;*/
            /*}*/
            /* Optionally, you can style the textarea itself */
            /*textarea {*/
            /*    border: 1px solid #ccc;*/
            /*    padding: 10px;*/
            /*    font-size: 16px;*/
            /*}*/
        </style>
        <!-- Scripts -->
{{--                @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
    </head>
    <body class="font-sans antialiased">
    <div id="app">
        <section class="px-8 mt-3 mb-10">
            <header class="container mx-auto">
                <h1>
                    <img src="/images/logo.png"
                         height="25px"
                         width="170px"
                         alt="Tweety">
                </h1>
            </header>
        </section>

        {{ $slot }}
    </div>
    <x-flash/>
    </body>
</html>
