<x-app-layout>

    @include('achievement.partial.header')

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            @include('achievement.partial.card')
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="overflow-x-auto">
                    @include('achievement.partial.table')
                    <div class=" italic text-gray-400 mt-5"> Jika data belum lengkap, simpan dulu dan lengkapi nanti.
                        Data
                        tidak
                        akan dikirim ke Admin sampai semua kolom wajib terisi!</div>
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
