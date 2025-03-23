<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Beranda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="pt-2 space-y-1 flex justify-center">
            <a href="{{ route('achievements.index') }}"
                class="text-center w-full mx-10 px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out"
                :class="{ 'bg-blue-700': '{{ request()->routeIs('achievements.index') }}' }">
                Prestasi
            </a>
        </div>
    </div>
</x-app-layout>
