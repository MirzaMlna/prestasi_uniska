@if (Auth::user()->role === 'admin')
    <!-- Baris Filter -->
    <tr>
        <td class="border border-gray-300 px-4 py-2 text-gray-800"></td>
        <td class="border border-gray-300 px-4 py-2 text-gray-800">
            <input type="text" name="filter[nim]" value="{{ request('filter.nim') }}"
                class="w-full px-2 py-1 border rounded" placeholder="NIM">
        </td>
        <td class="border border-gray-300 px-4 py-2 text-gray-800">
            <input type="text" name="filter[name]" value="{{ request('filter.name') }}"
                class="w-full px-2 py-1 border rounded" placeholder="Nama">
        </td>
        <td class="border border-gray-300 px-4 py-2 text-gray-800">
            <input type="text" name="filter[study_program]" value="{{ request('filter.study_program') }}"
                class="w-full px-2 py-1 border rounded" placeholder="Prodi">
        </td>
        <td class="border border-gray-300 px-4 py-2 text-gray-800">
            <select name="filter[achievement_type]" class="px-2 py-1 pr-8 border rounded appearance-none">
                <option value="">Semua</option>
                <option value="Akademik" {{ request('filter.achievement_type') == 'Akademik' ? 'selected' : '' }}>
                    Akademik</option>
                <option value="Non Akademik"
                    {{ request('filter.achievement_type') == 'Non Akademik' ? 'selected' : '' }}>
                    Non Akademik</option>
            </select>
        </td>
        <td class="border border-gray-300 px-4 py-2 text-gray-800">
            <select name="filter[achievement_level]" class="px-2 py-1 pr-8 border rounded appearance-none">
                <option value="">Semua</option>
                <option value="Internasional"
                    {{ request('filter.achievement_level') == 'Internasional' ? 'selected' : '' }}>
                    Internasional</option>
                <option value="Nasional" {{ request('filter.achievement_level') == 'Nasional' ? 'selected' : '' }}>
                    Nasional</option>
                <option value="Provinsi" {{ request('filter.achievement_level') == 'Provinsi' ? 'selected' : '' }}>
                    Provinsi</option>
                <option value="Wilayah" {{ request('filter.achievement_level') == 'Wilayah' ? 'selected' : '' }}>
                    Wilayah</option>
            </select>
        </td>
        <td class="border border-gray-300 px-4 py-2 text-gray-800">
            <select name="filter[achievement_title]" class="px-2 py-1 pr-8 border rounded appearance-none">
                <option value="">Semua</option>
                <option value="Juara 1" {{ request('filter.achievement_title') == 'Juara 1' ? 'selected' : '' }}>
                    Juara 1</option>
                <option value="Juara 2" {{ request('filter.achievement_title') == 'Juara 2' ? 'selected' : '' }}>
                    Juara 2</option>
                <option value="Juara 3" {{ request('filter.achievement_title') == 'Juara 3' ? 'selected' : '' }}>
                    Juara 3</option>
                <option value="Harapan 1" {{ request('filter.achievement_title') == 'Harapan 1' ? 'selected' : '' }}>
                    Harapan 1</option>
                <option value="Harapan 2" {{ request('filter.achievement_title') == 'Harapan 2' ? 'selected' : '' }}>
                    Harapan 2</option>
                <option value="Harapan 3" {{ request('filter.achievement_title') == 'Harapan 3' ? 'selected' : '' }}>
                    Harapan 3</option>
                <option value="Peserta" {{ request('filter.achievement_title') == 'Peserta' ? 'selected' : '' }}>
                    Peserta</option>
            </select>
        </td>
        <td class="border border-gray-300 px-4 py-2 text-gray-800">
            <input type="number" name="filter[start_year]" value="{{ request('filter.start_year') }}"
                class="w-full px-2 py-1 border rounded" placeholder="Tahun Mulai" min="2000"
                max="{{ date('Y') }}">
        </td>

        <td class="border border-gray-300 px-4 py-2 text-gray-800">
            <select name="filter[status]" class="px-2 py-1 pr-8 border rounded appearance-none">
                <option value="">Semua</option>
                <option value="pending" {{ request('filter.status') == 'pending' ? 'selected' : '' }}>
                    Pending
                </option>
                <option value="diterima" {{ request('filter.status') == 'diterima' ? 'selected' : '' }}>
                    Diverifikasi</option>
                <option value="ditolak" {{ request('filter.status') == 'ditolak' ? 'selected' : '' }}>
                    Ditolak
                </option>
            </select>
        </td>
        <td class="border border-gray-300 px-4 py-2 text-gray-800">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded w-full">
                Filter
            </button>
            <a href="{{ route('achievements.index') }}"
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-4 rounded w-full block mt-1 text-center">
                Reset
            </a>
        </td>
    </tr>
@endif
