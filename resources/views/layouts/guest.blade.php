<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />
        
        <div class="flex flex-col z-0 top-0">
            <!-- Header -->
            <header class="relative flex flex-col items-top justify-center h-[50vh] overflow-hidden">
                @livewire('site-menu')
                <!-- <div class="relative z-30 p-5 text-2xl text-white bg-purple-300 bg-opacity-50 rounded-xl">Welcome to my site!</div> -->
                <video autoplay loop muted class="absolute z-10 w-auto min-w-full min-h-full max-w-full">
                    <source src="media/header.mp4" type="video/mp4" />
                    {{ __('Your browser does not support the video tag.') }}
                </video>
            </header>

            <!-- Page Content -->
            <main class="w-full h-screen bg-gradient-to-b from-slate-200 to-slate-400">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
