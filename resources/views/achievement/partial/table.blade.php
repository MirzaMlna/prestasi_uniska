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
                        @switch($achievement->status)
                            @case('tunda')
                                <span class="text-yellow-500 font-semibold">{{ ucfirst($achievement->status) }}</span>
                            @break

                            @case('diterima')
                                <span class="text-green-500 font-semibold">{{ ucfirst($achievement->status) }}</span>
                            @break

                            @case('ditolak')
                                <span class="text-red-500 font-semibold">{{ ucfirst($achievement->status) }}</span>
                            @break

                            @default
                                <span>{{ ucfirst($achievement->status) }}</span>
                        @endswitch
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <div class="flex flex-col space-y-2 w-full">
                            @if (Auth::user()->role === 'admin')
                                <form action=""></form>
                                <button onclick="openModal('modal-{{ $achievement->id }}', event)"
                                    class="bg-gray-500 hover:bg-gray-700 text-white py-1 px-3 rounded w-full">
                                    Tampilkan
                                </button>
                            @elseif (Auth::user()->role === 'mahasiswa')
                                <!-- Tombol Edit -->
                                <a href="{{ route('achievements.edit', $achievement->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-700 text-black py-1 px-3 rounded text-center w-full">
                                    Edit
                                </a>

                                <!-- Tombol Hapus -->
                                <form action=""></form>
                                <form id="delete-form-{{ $achievement->id }}"
                                    action="{{ route('achievements.destroy', $achievement->id) }}" method="POST"
                                    class="w-full">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="button" onclick="confirmDelete({{ $achievement->id }})"
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
