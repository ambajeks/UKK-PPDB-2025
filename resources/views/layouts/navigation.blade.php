<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="fw-bold text-dark text-decoration-none">
                        PPDB App
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>

                    {{-- Menu untuk admin --}}
                    @can('admin')
    <x-nav-link :href="route('admin.gelombang.index')" :active="request()->is('admin/gelombang*')">
    Gelombang
</x-nav-link>

<x-nav-link :href="route('admin.promo.index')" :active="request()->is('admin/promo*')">
    Promo
</x-nav-link>

<x-nav-link :href="route('admin.jurusan.index')" :active="request()->is('admin/jurusan*')">
    Jurusan
</x-nav-link>

<x-nav-link :href="route('admin.kelas.index')" :active="request()->is('admin/kelas*')">
    Kelas
</x-nav-link>

<x-nav-link :href="route('admin.users.index')" :active="request()->is('admin/users*')">
    Users
</x-nav-link>

@endcan

                    {{-- Menu untuk user biasa --}}
                    @cannot('admin')
                        <x-nav-link :href="route('formulir.index')" :active="request()->is('formulir*')">
                            Formulir
                        </x-nav-link>
                        <x-nav-link :href="route('dokumen.index')" :active="request()->is('dokumen*')">
                            Dokumen
                        </x-nav-link>
                        <x-nav-link :href="route('orangtua.index')" :active="request()->is('orangtua*')">
                            Orang Tua
                        </x-nav-link>
                        <x-nav-link :href="route('wali.index')" :active="request()->is('wali*')">
                            Wali
                        </x-nav-link>
                    @endcannot
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path d="M5.25 7.75L10 12.5l4.75-4.75"></path>
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
