<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 flex flex-col min-h-screen">
    <div class="flex-grow flex items-center justify-center">
        <div class="w-full max-w-4xl flex flex-col items-center text-center space-y-4">
            <img src="{{ asset('images/uniska_logo.png') }}" alt="uniska_logo" class="w-32 h-32">
            <div class="w-full max-w-2xl">
                <main class="mb-8">
                    <h1 class="text-4xl font-bold">UNISKA Achieve</h1>
                    <p class="text-md text-gray-600 dark:text-white mb-6 mt-3 text-light">Daripada upload story, mending
                        upload
                        prestasi!
                    </p>
                    @if (Route::has('login'))
                        <nav class="flex justify-center gap-4">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="px-5 py-2 bg-blue-600 text-white rounded-md shadow-md hover:bg-blue-700 transition-all">
                                    Beranda
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="px-5 py-2 bg-green-600 text-white rounded-md shadow-md hover:bg-green-700 transition-all ">
                                    Masuk
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="px-5 py-2 border border-gray-300 dark:border-gray-700 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition-all">
                                        Registrasi
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                    {{-- <hr class="border-t border-gray-300 dark:border-gray-300 opacity-20 mt-10"> --}}
                </main>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>

</html>
