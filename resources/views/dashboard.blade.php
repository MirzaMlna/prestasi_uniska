<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Beranda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Biodata User (Sebelah Kiri) -->
                <div class="w-full md:w-1/3">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="text-start mb-4">
                            <p class="text-gray-600 dark:text-gray-300 ">{{ $user->role }}</p>
                            <h3 class="text-xl font-bold dark:text-white">{{ $user->name }}</h3>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Nomor Induk Mahasiswa</p>
                                <p class="font-medium dark:text-white">{{ $user->nim }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Program Studi</p>
                                <p class="font-medium dark:text-white">{{ $user->study_program }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Nomor Telepon</p>
                                <p class="font-medium dark:text-white">{{ $user->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Konten Utama (Sebelah Kanan) -->
                <div class="w-full md:w-2/3">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <!-- Welcome Message -->
                            <div class="text-start mb-8">
                                <h1 class="text-3xl font-bold mb-2">Detail upload prestasi</h1>
                            </div>

                            <!-- Achievement Statistics -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                                <div class="bg-blue-50 dark:bg-blue-900 p-6 rounded-lg">
                                    <h3 class="text-xl font-semibold mb-2">Total Upload</h3>
                                    <p class="text-3xl font-bold">{{ $verifiedCount + $pendingCount }}</p>
                                </div>
                                <div class="bg-green-50 dark:bg-green-900 p-6 rounded-lg">
                                    <h3 class="text-xl font-semibold mb-2">Diterima</h3>
                                    <p class="text-3xl font-bold">{{ $verifiedCount }}</p>
                                </div>
                                <div class="bg-yellow-50 dark:bg-yellow-700 p-6 rounded-lg">
                                    <h3 class="text-xl font-semibold mb-2">Pending</h3>
                                    <p class="text-3xl font-bold">{{ $pendingCount }}</p>
                                </div>
                            </div>

                            <!-- Quick Actions -->
                            <div class="flex justify-center text-center">
                                <a href="{{ route('achievements.index') }}"
                                    class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition items-center w-full">
                                    Upload Prestasi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
