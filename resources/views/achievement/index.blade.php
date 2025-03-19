<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Daftar Prestasi
            </h2>
            @if (Auth::user()->role === 'mahasiswa')
                <a href="{{ route('achievements.create') }}"
                    class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded text-center">
                    Tambahkan Prestasi
                </a>
            @endif
            @if (Auth::user()->role === 'admin')
                <!-- Form Filter untuk Cetak -->
                <form action="{{ route('achievements.print') }}" method="GET" class="mb-2">
                    <div class="flex space-x-4">
                        <!-- Filter Program Studi -->
                        <div class="flex-1">
                            <label for="study_program" class="block text-sm font-medium text-white">Program
                                Studi</label>
                            <input type="text" name="study_program" id="study_program"
                                value="{{ request('study_program') }}" class="w-full px-2 py-1 border rounded"
                                placeholder="Masukkan Program Studi">
                        </div>

                        <!-- Filter Tahun Mulai -->
                        <div class="flex-1">
                            <label for="start_year" class="block text-sm font-medium text-white">Tahun Mulai</label>
                            <input type="number" name="start_year" id="start_year" value="{{ request('start_year') }}"
                                class="w-full px-2 py-1 border rounded" placeholder="Masukkan Tahun Mulai"
                                min="2000" max="{{ date('Y') }}">
                        </div>

                        <!-- Tombol Cetak -->
                        <div class="flex items-end">
                            <button type="submit"
                                class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded">
                                Cetak
                            </button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            @if (Auth::user()->role === 'admin')
                <div class="flex space-x-4 mb-6">
                    <!-- Diverifikasi -->
                    <div class="flex-1 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md text-center">
                        <div class="text-green-600 text-lg font-semibold">Diverifikasi</div>
                        <div class="text-gray-900 dark:text-gray-100 text-2xl font-bold">{{ $verifiedCount }}</div>
                    </div>

                    <!-- Pending -->
                    <div class="flex-1 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md text-center">
                        <div class="text-yellow-400 text-lg font-semibold">Pending</div>
                        <div class="text-gray-900 dark:text-gray-100 text-2xl font-bold">{{ $pendingCount }}</div>
                    </div>

                    <!-- Ditolak -->
                    <div class="flex-1 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md text-center">
                        <div class="text-red-600 text-lg font-semibold">Ditolak</div>
                        <div class="text-gray-900 dark:text-gray-100 text-2xl font-bold">{{ $rejectedCount }}</div>
                    </div>
                </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Pesan Sukses -->
                @if (session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Tabel Prestasi -->
                <div class="overflow-x-auto">
                    <form action="{{ route('achievements.index') }}" method="GET">
                        <table class="w-full border-collapse border border-gray-300 dark:border-gray-700">
                            <thead class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-white">
                                <tr>
                                    <th class="border px-4 py-2">No</th>
                                    <th class="border px-4 py-2">NIM</th>
                                    <th class="border px-4 py-2">Nama</th>
                                    <th class="border px-4 py-2">Program Studi</th>
                                    <th class="border px-4 py-2">Jenis Prestasi</th>
                                    <th class="border px-4 py-2">Tingkat Prestasi</th>
                                    <th class="border px-4 py-2">Capaian Prestasi</th>
                                    <th class="border px-4 py-2">Tanggal Kegiatan</th>
                                    <th class="border px-4 py-2">Status</th>
                                    <th class="border px-4 py-2">Aksi</th>
                                </tr>

                                @include('achievement.partial.filter')

                            </thead>
                            <tbody>
                                @forelse ($achievements as $key => $achievement)
                                    <tr class="text-gray-900 dark:text-gray-100">
                                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $achievement->nim }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $achievement->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $achievement->study_program }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            {{ ucfirst($achievement->achievement_type) }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            {{ $achievement->achievement_level }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            {{ $achievement->achievement_title }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            {{ \Carbon\Carbon::parse($achievement->start_date)->translatedFormat('d F Y') }}
                                            <span class="text-gray-500">s/d</span><br>
                                            {{ \Carbon\Carbon::parse($achievement->end_date)->translatedFormat('d F Y') }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            @switch($achievement->status)
                                                @case('tunda')
                                                    <span
                                                        class="text-yellow-500 font-semibold">{{ ucfirst($achievement->status) }}</span>
                                                @break

                                                @case('diterima')
                                                    <span
                                                        class="text-green-500 font-semibold">{{ ucfirst($achievement->status) }}</span>
                                                @break

                                                @case('ditolak')
                                                    <span
                                                        class="text-red-500 font-semibold">{{ ucfirst($achievement->status) }}</span>
                                                @break

                                                @default
                                                    <span>{{ ucfirst($achievement->status) }}</span>
                                            @endswitch
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <div class="flex flex-col space-y-2 w-full">
                                                <!-- Tombol Selengkapnya -->
                                                <button onclick="openModal('modal-{{ $achievement->id }}', event)"
                                                    class="bg-blue-700 hover:bg-blue-900 text-white py-1 px-3 rounded w-full">
                                                    Selengkapnya
                                                </button>

                                                @if (Auth::user()->role === 'admin')
                                                    <!-- Tombol Verifikasi/Tunda -->
                                                    <form action=""></form>
                                                    <form
                                                        action="{{ route('achievements.updateStatus', $achievement->id) }}"
                                                        method="POST" class="w-full">
                                                        @csrf
                                                        @method('PATCH')
                                                        @if ($achievement->status === 'diterima')
                                                            <input type="hidden" name="status" value="tunda">
                                                            <button type="submit"
                                                                class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-3 rounded w-full">
                                                                Tunda
                                                            </button>
                                                        @else
                                                            <input type="hidden" name="status" value="diterima">
                                                            <button type="submit"
                                                                class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded w-full">
                                                                Verifikasi
                                                            </button>
                                                        @endif
                                                    </form>

                                                    <!-- Tombol Tolak -->
                                                    <form
                                                        action="{{ route('achievements.updateStatus', $achievement->id) }}"
                                                        method="POST" class="w-full">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="ditolak">
                                                        <button type="submit"
                                                            class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded w-full">
                                                            Tolak
                                                        </button>
                                                    </form>
                                                @elseif (Auth::user()->role === 'mahasiswa')
                                                    <!-- Tombol Edit -->
                                                    <a href="{{ route('achievements.edit', $achievement->id) }}"
                                                        class="bg-yellow-500 hover:bg-yellow-700 text-black py-1 px-3 rounded text-center w-full">
                                                        Edit
                                                    </a>

                                                    <!-- Tombol Hapus -->
                                                    <form action=""></form>
                                                    <form id="delete-form-{{ $achievement->id }}"
                                                        action="{{ route('achievements.destroy', $achievement->id) }}"
                                                        method="POST" class="w-full">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="button"
                                                            onclick="confirmDelete({{ $achievement->id }})"
                                                            class="bg-red-700 hover:bg-red-900 text-white py-1 px-3 rounded w-full">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>

                                    @include('achievement.partial.modal')

                                    @empty
                                        <tr>
                                            <td colspan="10"
                                                class="border border-gray-300 px-4 py-2 text-center text-gray-500 dark:text-gray-400">
                                                Tidak ada prestasi yang ditemukan.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </form>
                        <!-- Pagination -->
                        <div class="mt-5">
                            {{ $achievements->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SweetAlert2 Script -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // Fungsi untuk konfirmasi penghapusan
            function confirmDelete(userId) {
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + userId).submit();
                    }
                });
            }

            // Fungsi untuk membuka modal
            function openModal(modalId, event) {
                event.preventDefault(); // Mencegah perilaku default tombol
                document.getElementById(modalId).classList.remove('hidden');
            }

            // Fungsi untuk menutup modal
            function closeModal(modalId) {
                document.getElementById(modalId).classList.add('hidden');
            }

            // Tampilkan pesan sukses jika ada
            @if (session('success'))
                Swal.fire({
                    title: "Sukses!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            @endif

            // Tampilkan pesan error jika ada
            @if (session('error'))
                Swal.fire({
                    title: "Error!",
                    text: "{{ session('error') }}",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            @endif
        </script>

    </x-app-layout>
