<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ 'Login' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body class="font-sans text-gray-900">

        <div id="containerLogin">

            {{-- FORM --}}
            <div id="containerFormLogin">

                <!-- LOGO -->
                <div id="containerLogo">
                    <a href="/">
                        <x-application-logo />
                    </a>
                </div>

                <div id="containerFormLoginInputs">
                    {{ $slot }}
                </div>
            </div>

        </div>
    </body>
</html>
