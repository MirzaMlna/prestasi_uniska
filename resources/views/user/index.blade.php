<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Pengguna') }}
            </h2>
            <a href="{{ route('users.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">
                Tambahkan Admin
            </a>
        </div>
    </x-slot>

    <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

    <!-- Tambahkan padding left untuk sidebar -->
    <div class="py-6 pl-0 xl:pl-64">
        <div class="mx-auto sm:px-6 lg:px-8">
            <!-- Card Statistik Verifikasi -->
            <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0 mb-6">
                <div class="flex-1 bg-white p-4 rounded-lg shadow-md text-center">
                    <div class="text-green-600 text-lg font-semibold">Diverifikasi</div>
                    <div class="text-gray-900 text-2xl font-bold">{{ $verifiedCount }}</div>
                </div>
                <div class="flex-1 bg-white p-4 rounded-lg shadow-md text-center">
                    <div class="text-red-400 text-lg font-semibold">Belum Diverifikasi</div>
                    <div class="text-gray-900 text-2xl font-bold">{{ $unverifiedCount }}</div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mt-6">
                <div class="overflow-x-auto">

                    <form method="GET" action="{{ route('users.index') }}">
                        <table class="min-w-full border-collapse border border-gray-300">
                            <thead class="bg-gray-100 text-gray-700">
                                <tr>
                                    <th class="border px-4 py-2 text-start">NIM</th>
                                    <th class="border px-4 py-2 text-start">Nama</th>
                                    <th class="border px-4 py-2 text-start">Program Studi</th>
                                    <th class="border px-4 py-2 text-start">Sebagai</th>
                                    <th class="border px-4 py-2 text-start">No.Telp</th>
                                    <th class="border px-4 py-2 text-center">Verifikasi</th>
                                    <th class="border px-4 py-2 text-start">Mendaftar Pada</th>
                                    <th class="border px-4 py-2 text-start">Aksi</th>
                                </tr>
                                <!-- Baris Filter -->
                                <tr>
                                    <td class="border px-4 py-2">
                                        <input type="text" name="nim" placeholder="NIM"
                                            class="w-full px-2 py-1 border rounded" value="{{ request('nim') }}">
                                    </td>
                                    <td class="border px-4 py-2">
                                        <input type="text" name="name" placeholder="Nama"
                                            class="w-full px-2 py-1 border rounded" value="{{ request('name') }}">
                                    </td>
                                    <td class="border px-4 py-2">
                                        <input type="text" name="study_program" placeholder="Prodi"
                                            class="w-full px-2 py-1 border rounded"
                                            value="{{ request('study_program') }}">
                                    </td>
                                    <td class="border px-4 py-2">
                                        <select name="role" class="w-full px-2 py-1 border rounded">
                                            <option value="">Semua</option>
                                            <option value="Admin" {{ request('role') == 'Admin' ? 'selected' : '' }}>
                                                Admin</option>
                                            <option value="Mahasiswa"
                                                {{ request('role') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa
                                            </option>
                                        </select>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <input type="text" name="phone" placeholder="No.Telp"
                                            class="w-full px-2 py-1 border rounded" value="{{ request('phone') }}">
                                    </td>
                                    <td class="border px-4 py-2 text-center">
                                        <select name="is_approved" class="w-full px-2 py-1 border rounded">
                                            <option value="">Semua</option>
                                            <option value="1"
                                                {{ request('is_approved') == '1' ? 'selected' : '' }}>Sudah</option>
                                            <option value="0"
                                                {{ request('is_approved') == '0' ? 'selected' : '' }}>Belum</option>
                                        </select>
                                    </td>
                                    <td class="border px-4 py-2 text-center">
                                        <a href="{{ route('users.index', array_merge(request()->query(), ['sort' => request('sort') == 'asc' ? 'desc' : 'asc'])) }}"
                                            class="px-4 py-2 bg-white text-gray-700 rounded-lg hover:bg-gray-700 hover:text-white">
                                            @if (request('sort') == 'asc')
                                                Terbaru
                                            @else
                                                Terdahulu
                                            @endif
                                        </a>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <div class="flex flex-col space-y-1">
                                            <button type="submit"
                                                class="bg-gray-500 hover:bg-gray-700 text-white py-1 px-4 rounded">
                                                Filter
                                            </button>
                                            <a href="{{ route('users.index') }}"
                                                class="bg-gray-500 hover:bg-gray-700 text-white py-1 px-4 rounded text-center">
                                                Reset
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="text-gray-800">
                                        <td class="border px-4 py-2">{{ $user->nim }}</td>
                                        <td class="border px-4 py-2">{{ $user->name }}</td>
                                        <td class="border px-4 py-2">{{ $user->study_program }}</td>
                                        <td class="border px-4 py-2">{{ ucfirst($user->role) }}</td>
                                        <td class="border px-4 py-2">{{ $user->phone }}</td>
                                        <td class="border px-4 py-2 text-center">
                                            @if ($user->is_approved)
                                                <span class="text-green-600">Sudah</span>
                                            @else
                                                <span class="text-red-500">Belum</span>
                                            @endif
                                        </td>
                                        <td class="border px-4 py-2">{{ $user->created_at->translatedFormat('d F Y') }}
                                        </td>
                                        <td class="border px-4 py-2">
                                            <div class="flex flex-col space-y-2">
                                                <form action=""></form>
                                                <form action="{{ route('user.verify', $user->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="{{ $user->is_approved ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700' }} w-full text-white py-1 px-3 rounded-lg flex justify-center items-center">
                                                        @if ($user->is_approved)
                                                            <i class="bi bi-x-circle-fill text-lg"></i>
                                                        @else
                                                            <i class="bi bi-check-circle-fill text-lg"></i>
                                                        @endif
                                                    </button>

                                                </form>
                                                <form id="delete-form-{{ $user->id }}"
                                                    action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" onclick="confirmDelete({{ $user->id }})"
                                                    class="w-full px-3 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-700">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>

                @if ($users->isEmpty())
                    <p class="text-center text-gray-500 mt-4">Tidak ada pengguna yang terdaftar.</p>
                @endif

                <div class="mt-5">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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
    </script>
</x-app-layout>
