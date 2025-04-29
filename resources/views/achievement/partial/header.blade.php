<x-slot name="header">
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Prestasi
        </h2>

        @if (Auth::user()->role === 'mahasiswa')
            <a href="{{ route('achievements.create') }}"
                class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded text-center">
                Tambahkan Prestasi
            </a>
        @endif
    </div>
</x-slot>
