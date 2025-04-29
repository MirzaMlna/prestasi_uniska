<x-guest-layout>
    <!-- Header dengan Judul dan Deskripsi -->
    <div class="text-center justify-center mb-8 flex flex-col items-center">
        <img src="{{ asset('images/uniska_logo.png') }}" alt="uniska_logo" class="w-16 h-16">
        <h1 class="mt-2 text-3xl font-bold text-gray-900">SIMKATMAWA UNISKA</h1>
        <p class="mt-2 text-gray-600">
            Silakan masukkan NIM dan Password untuk masuk.
        </p>
        <hr class="border-t border-gray-300 opacity-50 mt-5">
        <x-auth-session-status class="mb-4 text-center text-green-600" :status="session('status')" />
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- NIM -->
        <div>
            <x-input-label for="nim" :value="__('Nomor Induk Mahasiswa (NIM)')" />
            <x-text-input id="nim"
                class="block w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                type="number" name="nim" :value="old('nim')" required autofocus autocomplete="username"
                placeholder="Masukkan NIM Anda" />
            <x-input-error :messages="$errors->get('nim')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password"
                class="block w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                type="password" name="password" required autocomplete="current-password"
                placeholder="Masukkan Password Anda" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Register and Button -->
        <div class="flex items-center justify-between mt-6">
            <p class="text-sm text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500 underline">
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
