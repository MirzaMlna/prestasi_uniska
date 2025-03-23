@foreach ($achievements as $achievement)
    <div id="modal-{{ $achievement->id }}" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay -->
            <div class="fixed inset-0 transition-opacity bg-black bg-opacity-50" aria-hidden="true"></div>

            <!-- Modal Content -->
            <div
                class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                    <h3 class="text-lg font-bold leading-6 text-gray-900">Detail Prestasi</h3>
                    <br>
                    <hr>
                    <!-- Konten Detail Prestasi -->
                    <div class="mt-4 space-y-4">
                        <p>NIM: <span class="font-bold">{{ $achievement->nim }}</span></p>
                        <p>Nama: <span class="font-bold">{{ $achievement->name }}</span></p>
                        <p>Program Studi: <span class="font-bold">{{ $achievement->study_program }}</span></p>
                        <p>Jenis Prestasi: <span class="font-bold">{{ ucfirst($achievement->achievement_type) }}</span>
                        </p>
                        <p>Tingkat Prestasi: <span class="font-bold">{{ $achievement->achievement_level }}</span></p>
                        <p>Jenis Partisipasi: <span class="font-bold">{{ $achievement->participation_type }}</span></p>
                        <p>Dikti / Non Dikti: <span class="font-bold">{{ $achievement->program_by }}</span></p>
                        <p>Model Pelaksanaan: <span class="font-bold">{{ $achievement->execution_model }}</span></p>
                        <p>Nama Kegiatan: <span class="font-bold">{{ $achievement->event_name }}</span></p>
                        <p>Jumlah Peserta: <span class="font-bold">{{ $achievement->participant_count }}</span></p>
                        <p>Jumlah Universitas: <span class="font-bold">{{ $achievement->university_count }}</span></p>
                        <p>Judul Prestasi: <span class="font-bold">{{ $achievement->achievement_title }}</span></p>
                        <p>Tanggal Mulai: <span
                                class="font-bold">{{ \Carbon\Carbon::parse($achievement->start_date)->translatedFormat('j F Y') }}</span>
                        </p>
                        <p>Tanggal Selesai: <span
                                class="font-bold">{{ \Carbon\Carbon::parse($achievement->end_date)->translatedFormat('j F Y') }}</span>
                        </p>
                        <p>Link Berita: </strong>
                            @if ($achievement->news_link)
                                <a href="{{ $achievement->news_link }}" target="_blank"
                                    class="text-blue-500 hover:underline font-bold">Buka Link</a>
                            @else
                                <span class="font-bold">-</span>
                            @endif
                        </p>
                        <p>Status: <span class="font-bold">{{ ucfirst($achievement->status) }}</span></p>
                        <p>File Sertifikat: </strong>
                            @if ($achievement->certificate_file)
                                <a href="{{ asset('storage/' . $achievement->certificate_file) }}" target="_blank"
                                    class="text-blue-500 hover:underline font-bold">Tampilkan</a>
                            @else
                                <span class="font-bold">-</span>
                            @endif
                        </p>
                        <p>Foto Penghargaan: </strong>
                            @if ($achievement->award_photo_file)
                                <a href="{{ asset('storage/' . $achievement->award_photo_file) }}" target="_blank"
                                    class="text-blue-500 hover:underline font-bold">Tampilkan</a>
                            @else
                                <span class="font-bold">-</span>
                            @endif
                        </p>
                        <p>Surat Tugas Mahasiswa: </strong>
                            @if ($achievement->student_assignment_letter)
                                <a href="{{ asset('storage/' . $achievement->student_assignment_letter) }}"
                                    target="_blank" class="text-blue-500 hover:underline font-bold">Tampilkan</a>
                            @else
                                <span class="font-bold">-</span>
                            @endif
                        </p>
                        <p>NDIN Dosen Pembimbing: <span class="font-bold">{{ $achievement->nidn }}</span></p>
                        <p>Surat Tugas Pembimbing: </strong>
                            @if ($achievement->supervisor_assignment_letter)
                                <a href="{{ asset('storage/' . $achievement->supervisor_assignment_letter) }}"
                                    target="_blank" class="text-blue-500 hover:underline font-bold">Tampilkan</a>
                            @else
                                <span class="font-bold">-</span>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                    <!-- Action Buttons -->
                    <div class="flex justify-between items-center w-full">
                        @if (Auth::user()->role === 'admin')
                            <div class="flex space-x-2">
                                <!-- Tombol Hubungi -->
                                @php
                                    $phoneNumber = $achievement->phone;
                                    if (substr($phoneNumber, 0, 1) === '0') {
                                        $phoneNumber = '+62' . substr($phoneNumber, 1);
                                    }
                                @endphp
                                <a href="https://wa.me/{{ $phoneNumber }}" target="_blank"
                                    class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded">
                                    Hubungi
                                </a>
                                <!-- Tombol Verifikasi/Tunda -->
                                <form action="{{ route('achievements.updateStatus', $achievement->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    @if ($achievement->status === 'diterima')
                                        <input type="hidden" name="status" value="tunda">
                                        <button type="submit"
                                            class="bg-yellow-500 hover:bg-yellow-700 text-white px-3 rounded">
                                            Tunda
                                        </button>
                                    @else
                                        <input type="hidden" name="status" value="diterima">
                                        <button type="submit"
                                            class="bg-green-700 hover:bg-green-900 text-white px-3 rounded">
                                            Verifikasi
                                        </button>
                                    @endif
                                </form>
                                <!-- Tombol Tolak -->
                                <form action="{{ route('achievements.updateStatus', $achievement->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="ditolak">
                                    <button type="submit" class="bg-red-700 hover:bg-red-900 text-white px-3 rounded">
                                        Tolak
                                    </button>
                                </form>


                            </div>
                        @endif

                        <!-- Tombol di Kanan (Tutup) -->
                        <button type="button" onclick="closeModal('modal-{{ $achievement->id }}')"
                            class="px-4 py-2 text-base font-medium text-white bg-gray-600 rounded-md hover:bg-gray-700 focus:outline-none sm:text-sm">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
