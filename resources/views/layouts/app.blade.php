<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        <!-- Page Heading App name-->
        <header class="bg-white shadow">
            <a href='{{ route('admin.dashboard') }}'>
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{-- {{ $header }} --}}
                    <h2 class="font-semibold text-2xl text-gray-800 leading-tight font-Itim">
                        ShortcutKey-Matome
                </div>
            </a>
        </header>

        <!-- Page Heading menu -->
        @if (auth('admin')->user())
            @include('layouts.admin-navigation')
        @elseif(auth('users')->user())
            @include('layouts.user-navigation')
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        <footer class="bg-black shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="text-xs text-white  leading-tight font-Itim text-center">
                    ©2022 Shuto Ando
            </div>
        </footer>
    </div>
</body>

</html>
