<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://use.typekit.net/irl5hge.css">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles
        @stack('styles')
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-futura antialiased w-full text-white">
        <div class="min-h-screen bg-media-grey text-white">
            @livewire('navigation-dropdown')
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        @stack('scripts')
    </body>
</html>
