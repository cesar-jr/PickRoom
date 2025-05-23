@props(['jsFile'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('svg/favicon.svg') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/layouts/navigation.js'])
    @isset($jsFile)
    @vite(["resources/js/pages/$jsFile"])
    @endisset
    @if(Session::has('message'))
    @vite(["resources/js/components/toast.js"])
    @endif
    @stack('scripts')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main class="text-gray-900 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            {{ $slot }}
        </main>
        @if(Session::has('message'))
        <x-toast :type="Session::get('message-type', 'info')">{{ Session::get('message') }}</x-toast>
        @endif
    </div>
</body>

</html>