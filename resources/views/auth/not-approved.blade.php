<x-guest-layout>
    <img src="{{ asset('images/startled_student.png') }}" alt="uniska_logo" class="w-32 h-32 mx-auto">
    <div class="p-8 rounded-lg text-center max-w-md">
        <h1 class="text-2xl font-bold text-white">Verifikasi Masih Pending!</h1>
        <p class="mt-4 text-white">Akun Anda <span class="font-extrabold text-red-400">belum diverifikasi oleh
                admin</span>. Mohon menunggu
            verifikasi atau hubungi pihak admin untuk bantuan lebih lanjut.</p>
        <div class="flex space-x-4 justify-center mt-8">
            <a href="https://wa.me/6285259004449"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Hubungi
                Admin</a>
            <a href="/" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Kembali</a>
        </div>
    </div>
</x-guest-layout>
