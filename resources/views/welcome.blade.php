<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>wasa</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
{{--        <wireui:scripts />--}}
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif

                <div class="max-w-9xl mx-auto p-6 lg:p-8">
                    <!-- Existing code... -->

                    <div class="mt-8">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white text-center">
                            Welcome to Our Website!
                        </h1>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm text-center">
                            Thank you for visiting our website. We're delighted to have you here! Explore and discover all that our platform has to offer. If you have any questions or need assistance, feel free to reach out. Enjoy your stay!
                        </p>
                    </div>

                    <!-- Existing code... -->
                </div>

        </div>

        @livewireScripts
    </body>
</html>
