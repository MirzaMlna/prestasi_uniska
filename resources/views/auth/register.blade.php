<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-center text-green-600" :status="session('status')" />

    <!-- Header dengan Judul dan Deskripsi -->
    <div class="text-center justify-center mb-8 flex flex-col items-center">
        <img src="{{ asset('images/uniska_logo.png') }}" alt="uniska_logo" class="w-16 h-16 mx-auto">
        <h1 class="mt-2 text-3xl font-bold text-gray-900">SIMKATMAWA UNISKA</h1>
        <p class="mt-2 text-gray-600">Silakan lengkapi data dibawah untuk membuat akun.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- NIM -->
        <div>
            <x-input-label for="nim" :value="__('NIM')" class="text-gray-700 mb-1" />
            <x-text-input id="nim"
                class="block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                type="number" name="nim" :value="old('nim')" required autocomplete="username"
                placeholder="Masukkan NIM Anda" />
            <x-input-error :messages="$errors->get('nim')" class="mt-2 text-red-600" />
        </div>

        <!-- Nama -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" class="text-gray-700 mb-1" />
            <x-text-input id="name"
                class="block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                placeholder="Masukkan Nama Lengkap Anda" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
        </div>

        <!-- Nomor Telepon -->
        <div>
            <x-input-label for="phone" :value="__('Nomor Telepon')" class="text-gray-700 mb-1" />
            <x-text-input id="phone"
                class="block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                type="text" name="phone" :value="old('phone')" required autocomplete="phone"
                placeholder="Masukkan Nomor Telepon Anda" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2 text-red-600" />
        </div>

        <!-- Program Studi -->
        <div>
            <x-input-label for="study_program" :value="__('Program Studi')" class="text-gray-700 mb-1" />
            <select id="study_program" name="study_program"
                class="block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Pilih Program Studi</option>
                <!-- isi opsi program studi tetap sama -->
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
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 mb-1" />
            <x-text-input id="password"
                class="block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                type="password" name="password" required autocomplete="new-password"
                placeholder="Masukkan Password Anda" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Konfirmasi Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-gray-700 mb-1" />
            <x-text-input id="password_confirmation"
                class="block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                type="password" name="password_confirmation" required autocomplete="new-password"
                placeholder="Konfirmasi Password Anda" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <!-- Tombol dan Link -->
        <div class="flex items-center justify-between mt-6">
            <p class="text-sm text-gray-600">Sudah Punya Akun?
                <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500 underline">Klik
                    Disini</a>
            </p>
            <x-primary-button
                class="px-6 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 text-white rounded-md transition-all">
                {{ __('Buat Akun') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
