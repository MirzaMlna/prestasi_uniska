<!-- Tombol Hamburger untuk Mobile -->
<button id="sidebarToggle" class="md:hidden p-4 focus:outline-none">
    <i class="bi bi-list"></i>
</button>

<!-- Sidebar -->
<aside id="sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-full bg-white border-r border-gray-200 transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out">

    <!-- Tombol Close Sidebar untuk Mobile -->
    <div class="flex justify-end md:hidden px-4 pt-4">
        <button id="sidebarClose" class="text-gray-800 focus:outline-none">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <!-- Logo -->
    <div class="flex items-center justify-center h-20 border-b border-gray-200">
        <img src="{{ asset('images/uniska_logo.png') }}" alt="uniska_logo" class="w-8 h-8 mr-2">
        <span class="text-lg font-semibold text-gray-800">SIMKATMAWA UNISKA</span>
    </div>

    <!-- Navigation -->
    <nav class="space-y-2 mt-4">
        <div class="block px-3 text-sm leading-4 font-medium rounded-md text-gray-500">
            {{ Auth::user()->nim }} - {{ Auth::user()->role }}
        </div>

        <!-- Dropdown user mobile -->
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                    <div>{{ Auth::user()->name }}</div>
                    <div class="ms-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>

        <!-- Menu -->
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-200">
            <i class="bi bi-house-fill"></i> Beranda
        </a>
        <a href="{{ route('achievements.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200">
            <i class="bi bi-trophy-fill"></i> Prestasi
        </a>
        @if (Auth::user()->role === 'admin')
            <a href="{{ route('users.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200">
                <i class="bi bi-people-fill"></i> Akun
            </a>
        @endif

    </nav>
</aside>

<!-- Script Toggle Sidebar -->
<script>
    const sidebar = document.getElementById('sidebar');
    const toggleButton = document.getElementById('sidebarToggle');
    const closeButton = document.getElementById('sidebarClose');

    toggleButton.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
    });

    closeButton.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
    });
</script>
