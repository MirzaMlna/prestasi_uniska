<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Data Prestasi') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-md">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m0 0l-2 2m0 0l-2-2"></path>
                </svg>
                <span class="font-semibold">Oops! Ada beberapa kesalahan:</span>
            </div>
            <ul class="mt-2 pl-6 list-disc text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Form Edit Prestasi --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('achievements.update', $achievement->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Jenis Lomba -->
                    <div class="mb-4">
                        <label for="achievement_type"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis
                            Lomba</label>
                        <select id="achievement_type" name="achievement_type"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                            <option value="">Pilih</option>
                            <option value="Akademik"
                                {{ $achievement->achievement_type == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                            <option value="Non Akademik"
                                {{ $achievement->achievement_type == 'Non Akademik' ? 'selected' : '' }}>Non Akademik
                            </option>
                        </select>
                    </div>

                    <!-- Tingkat -->
                    <div class="mb-4">
                        <label for="achievement_level"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tingkat</label>
                        <select id="achievement_level" name="achievement_level"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                            <option value="">Pilih</option>
                            <option value="Wilayah"
                                {{ $achievement->achievement_level == 'Wilayah' ? 'selected' : '' }}>Wilayah</option>
                            <option value="Provinsi"
                                {{ $achievement->achievement_level == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                            <option value="Nasional"
                                {{ $achievement->achievement_level == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                            <option value="Internasional"
                                {{ $achievement->achievement_level == 'Internasional' ? 'selected' : '' }}>Internasional
                            </option>
                        </select>
                    </div>

                    <!-- Jenis Kepesertaan -->
                    <div class="mb-4">
                        <label for="participation_type"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis
                            Kepesertaan</label>
                        <select id="participation_type" name="participation_type"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                            <option value="">Pilih</option>
                            <option value="Individu"
                                {{ $achievement->participation_type == 'Individu' ? 'selected' : '' }}>Individu</option>
                            <option value="Kelompok"
                                {{ $achievement->participation_type == 'Kelompok' ? 'selected' : '' }}>Kelompok
                            </option>
                        </select>
                    </div>

                    <!-- Program -->
                    <div class="mb-4">
                        <label for="program_by"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Program</label>
                        <select id="program_by" name="program_by"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                            <option value="">Pilih</option>
                            <option value="Dikti" {{ $achievement->program_by == 'Dikti' ? 'selected' : '' }}>Dikti
                            </option>
                            <option value="Non Dikti" {{ $achievement->program_by == 'Non Dikti' ? 'selected' : '' }}>
                                Non Dikti</option>
                        </select>
                    </div>

                    <!-- Model Pelaksanaan -->
                    <div class="mb-4">
                        <label for="execution_model"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Model
                            Pelaksanaan</label>
                        <select id="execution_model" name="execution_model"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                            <option value="">Pilih</option>
                            <option value="Daring" {{ $achievement->execution_model == 'Daring' ? 'selected' : '' }}>
                                Daring</option>
                            <option value="Luring" {{ $achievement->execution_model == 'Luring' ? 'selected' : '' }}>
                                Luring</option>
                        </select>
                    </div>

                    <!-- Nama Kegiatan -->
                    <div class="mb-4">
                        <label for="event_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                            Kegiatan</label>
                        <input type="text" id="event_name" name="event_name" value="{{ $achievement->event_name }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                    </div>

                    <!-- Jumlah Peserta -->
                    <div class="mb-4">
                        <label for="participant_count"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah
                            Peserta</label>
                        <input type="number" id="participant_count" name="participant_count"
                            value="{{ $achievement->participant_count }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                    </div>

                    <!-- Jumlah Universitas -->
                    <div class="mb-4">
                        <label for="university_count"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Universitas yang bergabung
                        </label>
                        <select id="university_count" name="university_count"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                            <option value="">Pilih</option>
                            <option value="<10" {{ $achievement->university_count == '<10' ? 'selected' : '' }}>
                                &lt;10</option>
                            <option value=">=10" {{ $achievement->university_count == '>=10' ? 'selected' : '' }}>≥10
                            </option>
                        </select>
                    </div>

                    <!-- Capaian Prestasi -->
                    <div class="mb-4">
                        <label for="achievement_title"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Capaian
                            Prestasi</label>
                        <select id="achievement_title" name="achievement_title"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                            <option value="">Pilih</option>
                            <option value="Juara 1"
                                {{ $achievement->achievement_title == 'Juara 1' ? 'selected' : '' }}>Juara 1</option>
                            <option value="Juara 2"
                                {{ $achievement->achievement_title == 'Juara 2' ? 'selected' : '' }}>Juara 2</option>
                            <option value="Juara 3"
                                {{ $achievement->achievement_title == 'Juara 3' ? 'selected' : '' }}>Juara 3</option>
                            <option value="Harapan 1"
                                {{ $achievement->achievement_title == 'Harapan 1' ? 'selected' : '' }}>Harapan 1
                            </option>
                            <option value="Harapan 2"
                                {{ $achievement->achievement_title == 'Harapan 2' ? 'selected' : '' }}>Harapan 2
                            </option>
                            <option value="Harapan 3"
                                {{ $achievement->achievement_title == 'Harapan 3' ? 'selected' : '' }}>Harapan 3
                            </option>
                            <option value="Peserta"
                                {{ $achievement->achievement_title == 'Peserta' ? 'selected' : '' }}>Peserta</option>
                        </select>
                    </div>

                    <!-- Tanggal Mulai Pelaksanaan -->
                    <div class="mb-4">
                        <label for="start_date"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal
                            Mulai
                            Pelaksanaan</label>
                        <input type="date" id="start_date" name="start_date"
                            value="{{ $achievement->start_date }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                    </div>

                    <!-- Tanggal Selesai Pelaksanaan -->
                    <div class="mb-4">
                        <label for="end_date"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal
                            Selesai
                            Pelaksanaan</label>
                        <input type="date" id="end_date" name="end_date" value="{{ $achievement->end_date }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                    </div>

                    <!-- Link Berita -->
                    <div class="mb-4">
                        <label for="news_link" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Link
                            Berita</label>
                        <input type="url" id="news_link" name="news_link" value="{{ $achievement->news_link }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                    </div>

                    <!-- Sertifikat (Upload) -->
                    <div class="mb-4">
                        <label for="certificate_file"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sertifikat
                            <span class="text-gray-500">.pdf</span></label>
                        <input type="file" id="certificate_file" name="certificate_file"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                        @if ($achievement->certificate_file)
                            <a href="{{ asset('storage/' . $achievement->certificate_file) }}" target="_blank"
                                class="text-blue-500">Lihat Sertifikat</a>
                        @endif
                    </div>

                    <!-- Foto Penyerahan Penghargaan (Upload) -->
                    <div class="mb-4">
                        <label for="award_photo_file"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Foto
                            Penyerahan
                            Penghargaan <span class="text-gray-500">.pdf (Maksimal 5 mb)</span></label>
                        <input type="file" id="award_photo_file" name="award_photo_file"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                        @if ($achievement->award_photo_file)
                            <a href="{{ asset('storage/' . $achievement->award_photo_file) }}" target="_blank"
                                class="text-blue-500">Lihat Foto</a>
                        @endif
                    </div>

                    <!-- Surat Tugas Mahasiswa (Upload) -->
                    <div class="mb-4">
                        <label for="student_assignment_letter"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Surat Tugas
                            Mahasiswa <span class="text-gray-500">.pdf (Maksimal 5 mb)</span></label>
                        <input type="file" id="student_assignment_letter" name="student_assignment_letter"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                        @if ($achievement->student_assignment_letter)
                            <a href="{{ asset('storage/' . $achievement->student_assignment_letter) }}"
                                target="_blank" class="text-blue-500">Lihat Surat Tugas</a>
                        @endif
                    </div>

                    <!-- NIDN -->
                    <div class="mb-4">
                        <label for="nidn" class="block text-sm font-medium text-gray-700 dark:text-gray-300">NIDN
                            Dosen Pembimbing</label>
                        <input type="number" id="nidn" name="nidn" value="{{ $achievement->nidn }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                    </div>

                    <!-- Surat Tugas Dospem (Upload) -->
                    <div class="mb-4">
                        <label for="supervisor_assignment_letter"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Surat Tugas
                            Dosen Pembimbing <span class="text-gray-500">.pdf (Maksimal 5 mb)</span></label>
                        <input type="file" id="supervisor_assignment_letter" name="supervisor_assignment_letter"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                        @if ($achievement->supervisor_assignment_letter)
                            <a href="{{ asset('storage/' . $achievement->supervisor_assignment_letter) }}"
                                target="_blank" class="text-blue-500">Lihat Surat Tugas</a>
                        @endif
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan
                            Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
