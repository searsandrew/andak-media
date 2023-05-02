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
            @if (isset($header))
                {{ $header }}
            @endif

            <!-- Page Content -->
            <main class="w-full min-h-[50vh] bg-gradient-to-b from-slate-200 to-slate-400">
                {{ $slot }}
            </main>
        </div>

        <div class="w-full bg-black text-white text-xs text-center antialiased border-t-2 border-gray-500 py-1 -inset-y-7">
            {{ __('Copyright © :year • Andak Media is owned by JAMR, Inc.', ['year' => now()->year]) }} • <a href="https://github.com/searsandrew/andak-media" class="text-orange-50 hover:text-orange-300">{{ __('Powered by PowerArmor v:version', ['version' => config('app.version')]) }}</a>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
