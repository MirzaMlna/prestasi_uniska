<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-center text-green-600" :status="session('status')" />

    <!-- Header dengan Judul dan Deskripsi -->
    <div class="text-start mb-8">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Buat Akun Baru</h1>
        <p class="mt-2 text-gray-600 dark:text-gray-400">
            Silakan lengkapi data dibawah untuk membuat akun.
        </p>
        <hr class="border-t border-gray-300 dark:border-gray-300 opacity-20 mt-5">
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- NIM -->
        <div>
            <x-input-label for="nim" :value="__('NIM')" class="text-gray-700 dark:text-gray-300" />
            <div class="relative mt-1">
                <x-text-input id="nim"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100"
                    type="number" name="nim" :value="old('nim')" required autocomplete="username"
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

        <!-- Nama -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" class="text-gray-700 dark:text-gray-300" />
            <div class="relative mt-1">
                <x-text-input id="name"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100"
                    type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                    placeholder="Masukkan Nama Lengkap Anda" />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600 dark:text-red-400" />
        </div>

        <!-- Nomor Telepon -->
        <div>
            <x-input-label for="phone" :value="__('Nomor Telepon')" class="text-gray-700 dark:text-gray-300" />
            <div class="relative mt-1">
                <x-text-input id="phone"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100"
                    type="text" name="phone" :value="old('phone')" required autocomplete="phone"
                    placeholder="Masukkan Nomor Telepon Anda" />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('phone')" class="mt-2 text-red-600 dark:text-red-400" />
        </div>

        <!-- Program Studi -->
        <div>
            <x-input-label for="study_program" :value="__('Program Studi')" class="text-gray-700 dark:text-gray-300" />
            <div class="relative mt-1">
                <select id="study_program" name="study_program"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100">
                    <option value="">Pilih Program Studi</option>
                    <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                    <option value="Ilmu Administrasi Publik">Ilmu Administrasi Publik</option>
                    <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                    <option value="Bimbingan dan Konseling">Bimbingan dan Konseling</option>
                    <option value="Pendidikan Kimia">Pendidikan Kimia</option>
                    <option value="Pendidikan Olahraga">Pendidikan Olahraga</option>
                    <option value="Manajemen">Manajemen</option>
                    <option value="Peternakan">Peternakan</option>
                    <option value="Agribisnis">Agribisnis</option>
                    <option value="Hukum Ekonomi Syari’ah">Hukum Ekonomi Syari’ah</option>
                    <option value="Ekonomi Syari’ah">Ekonomi Syari’ah</option>
                    <option value="Pendidikan Guru Madrasah Ibtidaiyah">Pendidikan Guru Madrasah Ibtidaiyah</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Teknik Sipil">Teknik Sipil</option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Teknik Industri">Teknik Industri</option>
                    <option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
                    <option value="Ilmu Hukum">Ilmu Hukum</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Farmasi">Farmasi</option>
                </select>
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300" />
            <div class="relative mt-1">
                <x-text-input id="password"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100"
                    type="password" name="password" required autocomplete="new-password"
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

        <!-- Konfirmasi Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-gray-700 dark:text-gray-300" />
            <div class="relative mt-1">
                <x-text-input id="password_confirmation"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-gray-100"
                    type="password" name="password_confirmation" required autocomplete="new-password"
                    placeholder="Konfirmasi Password Anda" />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600 dark:text-red-400" />
        </div>

        <!-- Tombol dan Link -->
        <div class="flex items-center justify-between mt-6">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Sudah Punya Akun?
                <a href="{{ route('login') }}"
                    class="font-medium text-blue-600 dark:text-blue-400 hover:text-blue-500 dark:hover:text-blue-300 underline">
                    Klik Disini
                </a>
            </p>
            <x-primary-button
                class="px-6 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 text-white rounded-md transition-all">
                {{ __('Buat Akun') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
