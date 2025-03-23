<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-center text-green-600" :status="session('status')" />

    <!-- Header dengan Judul dan Deskripsi -->
    <div class="text-start mb-4">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Selamat Datang Kembali!</h1>
        <p class="mt-2 text-gray-600 dark:text-gray-400">
            Silakan masukkan NIM dan Password untuk masuk.
        </p>
        <hr class="border-t border-gray-300 dark:border-gray-300 opacity-20 mt-5">
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- NIM -->
        <div>
            <x-input-label for="nim" :value="__('NIM')" class="text-gray-700 dark:text-gray-300" />
            <div class="relative mt-1">
                <x-text-input id="nim"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100"
                    type="number" name="nim" :value="old('nim')" required autofocus autocomplete="username"
                    placeholder="Masukkan NIM Anda" />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('nim')" class="mt-2 text-red-600 dark:text-red-400" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300" />
            <div class="relative mt-1">
                <x-text-input id="password"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100"
                    type="password" name="password" required autocomplete="current-password"
                    placeholder="Masukkan Password Anda" />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 dark:text-red-400" />
        </div>

        <!-- Register and Button -->
        <div class="flex items-center justify-between mt-6">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Belum Punya akun?
                <a href="{{ route('register') }}"
                    class="font-medium text-blue-600 dark:text-blue-400 hover:text-blue-500 dark:hover:text-blue-300 underline">
                    Klik disini
                </a>
            </p>
            <x-primary-button
                class="px-6 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 text-white rounded-md transition-all">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
