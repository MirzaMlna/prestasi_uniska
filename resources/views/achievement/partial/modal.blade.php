@foreach ($achievements as $achievement)
    <div id="modal-{{ $achievement->id }}" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay -->
            <div class="fixed inset-0 transition-opacity bg-black bg-opacity-50" aria-hidden="true"></div>

            <!-- Modal Content -->
            <div
                class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Detail Prestasi</h3>
                    <div class="mt-4 space-y-4">
                        <p><strong>NIM:</strong> {{ $achievement->nim }}</p>
                        <p><strong>Nama:</strong> {{ $achievement->name }}</p>
                        <p><strong>Program Studi:</strong> {{ $achievement->study_program }}</p>
                        <p><strong>Jenis Prestasi:</strong> {{ ucfirst($achievement->achievement_type) }}</p>
                        <p><strong>Tingkat Prestasi:</strong> {{ $achievement->achievement_level }}</p>
                        <p><strong>Jenis Partisipasi:</strong> {{ $achievement->participation_type }}</p>
                        <p><strong>Model Pelaksanaan:</strong> {{ $achievement->execution_model }}</p>
                        <p><strong>Nama Kegiatan:</strong> {{ $achievement->event_name }}</p>
                        <p><strong>Jumlah Peserta:</strong> {{ $achievement->participant_count }}</p>
                        <p><strong>Judul Prestasi:</strong> {{ $achievement->achievement_title }}</p>
                        <p><strong>Tanggal Mulai:</strong> {{ $achievement->start_date }}</p>
                        <p><strong>Tanggal Selesai:</strong> {{ $achievement->end_date }}</p>
                        <p><strong>Link Berita:</strong>
                            @if ($achievement->news_link)
                                <a href="{{ $achievement->news_link }}" target="_blank"
                                    class="text-blue-500 hover:underline">Buka Link</a>
                            @else
                                -
                            @endif
                        </p>
                        <p><strong>Status:</strong> {{ ucfirst($achievement->status) }}</p>
                        <p><strong>File Sertifikat:</strong>
                            @if ($achievement->certificate_file)
                                <a href="{{ asset('storage/' . $achievement->certificate_file) }}" target="_blank"
                                    class="text-blue-500 hover:underline">Tampilkan</a>
                            @else
                                -
                            @endif
                        </p>
                        <p><strong>Foto Penghargaan:</strong>
                            @if ($achievement->award_photo_file)
                                <a href="{{ asset('storage/' . $achievement->award_photo_file) }}" target="_blank"
                                    class="text-blue-500 hover:underline">Tampilkan</a>
                            @else
                                -
                            @endif
                        </p>
                        <p><strong>Surat Tugas Mahasiswa:</strong>
                            @if ($achievement->student_assignment_letter)
                                <a href="{{ asset('storage/' . $achievement->student_assignment_letter) }}"
                                    target="_blank" class="text-blue-500 hover:underline">Tampilkan</a>
                            @else
                                -
                            @endif
                        </p>
                        <p><strong>Surat Tugas Pembimbing:</strong>
                            @if ($achievement->supervisor_assignment_letter)
                                <a href="{{ asset('storage/' . $achievement->supervisor_assignment_letter) }}"
                                    target="_blank" class="text-blue-500 hover:underline">Tampilkan</a>
                            @else
                                -
                            @endif
                        </p>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" onclick="closeModal('modal-{{ $achievement->id }}')"
                        class="w-full px-4 py-2 text-base font-medium text-white bg-gray-600 rounded-md hover:bg-gray-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach
