@if (Auth::user()->role === 'admin')
    <div class="flex space-x-4 mb-6">
        <!-- Diverifikasi -->
        <a href="{{ route('achievements.index', ['status' => 'diterima']) }}"
            class="flex-1 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md text-center hover:bg-gray-100 dark:hover:bg-gray-700">
            <div class="text-green-600 text-lg font-semibold">Diverifikasi</div>
            <div class="text-gray-900 dark:text-gray-100 text-2xl font-bold">{{ $verifiedCount }}</div>
            <div class="text-gray-400 text-xs italic">Klik untuk menampilkan</div>
        </a>

        <!-- Pending -->
        <a href="{{ route('achievements.index', ['status' => 'tunda']) }}"
            class="flex-1 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md text-center hover:bg-gray-100 dark:hover:bg-gray-700">
            <div class="text-yellow-400 text-lg font-semibold">Pending</div>
            <div class="text-gray-900 dark:text-gray-100 text-2xl font-bold">{{ $pendingCount }}</div>
            <div class="text-gray-400 text-xs italic">Klik untuk menampilkan</div>
        </a>

        <!-- Ditolak -->
        <a href="{{ route('achievements.index', ['status' => 'ditolak']) }}"
            class="flex-1 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md text-center hover:bg-gray-100 dark:hover:bg-gray-700">
            <div class="text-red-600 text-lg font-semibold">Ditolak</div>
            <div class="text-gray-900 dark:text-gray-100 text-2xl font-bold">{{ $rejectedCount }}</div>
            <div class="text-gray-400 text-xs italic">Klik untuk menampilkan</div>
        </a>
    </div>
@endif
