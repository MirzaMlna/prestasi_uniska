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
</head>

<body
    class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 flex items-center justify-center min-h-screen p-6">
    <div class="w-full max-w-4xl flex flex-col items-center text-center space-y-6">
        <img src="{{ asset('images/uniska_logo.png') }}" alt="uniska_logo" class="w-32 h-32 mx-auto">
        <div class="w-full max-w-2xl">
            <header class="mb-8">
                @if (Route::has('login'))
                    <nav class="flex justify-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="px-5 py-2 bg-blue-600 text-white rounded-md shadow-md hover:bg-blue-700 transition-all">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="px-5 py-2 border border-gray-300 dark:border-gray-700 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition-all">
                                Masuk
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="px-5 py-2 bg-green-600 text-white rounded-md shadow-md hover:bg-green-700 transition-all">
                                    Registrasi
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>
            <main>
                <h1 class="text-4xl font-bold mb-4">Prestasi UNISKA</h1>
                <p class="text-lg text-gray-600 dark:text-gray-400">Laporkan Prestasimu di Sini!</p>
            </main>
        </div>
    </div>
</body>

</html>
