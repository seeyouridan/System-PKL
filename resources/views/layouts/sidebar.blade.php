<nav x-data="{ open: false }" class="d-flex flex-column bg-white h-full border-t min-h-screen">
    <div class="pt-8 pl-3">

        <!-- Navigation Links -->
        <div class="hidden pb-6 space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <i class="fa-solid fa-dashboard pr-2"></i>{{ __('Dashboard') }}
            </x-nav-link>
        </div>

        @hasrole('kajur')
            <div class="hidden pb-6 space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('guru.index')" :active="request()->routeIs('guru.index') || request()->routeIs('guru.create')">
                    <i class="fa-solid fa-user-graduate pr-2"></i>{{ __('Kelola Pembimbing') }}
                </x-nav-link>
            </div>

            <div class="hidden pb-6 space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('instansi.index')" :active="request()->routeIs('instansi.index') || request()->routeIs('instansi.create')">
                    <i class="fa-solid fa-industry pr-2"></i>{{ __('Kelola Instansi') }}
                </x-nav-link>
            </div>

            <div class="hidden pb-6 space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('siswa.index')" :active="request()->routeIs('siswa.index')">
                    <i class="fa-solid fa-users pr-2"></i>{{ __('Kelola Siswa') }}
                </x-nav-link>
            </div>

            <div class="hidden pb-6 space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('pengajuan.index')" :active="request()->routeIs('pengajuan.index')">
                    <i class="fa-solid fa-paper-plane pr-2"></i></i>{{ __('Pengajuan PKL') }}
                </x-nav-link>
            </div>

            <div class="hidden pb-6 space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('pkl.index')" :active="request()->routeIs('pkl.index')">
                    <i class="fa-solid fa-map pr-2"></i></i>{{ __('PKL') }}
                </x-nav-link>
            </div>
        @endhasrole

        @hasrole('guru')
            <div class="hidden pb-6 space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('instansi.index')" :active="request()->routeIs('instansi.index')">
                    <i class="fa-solid fa-industry pr-2"></i>{{ __('Data Instansi') }}
                </x-nav-link>
            </div>

            <div class="hidden pb-6 space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('siswa.index')" :active="request()->routeIs('siswa.index')">
                    <i class="fa-solid fa-users pr-2"></i>{{ __('Data Siswa') }}
                </x-nav-link>
            </div>

            <div class="hidden pb-6 space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('laporan.index')" :active="request()->routeIs('laporan.index')">
                    <i class="fa-solid fa-book-open pr-2"></i>{{ __('Laporan') }}
                </x-nav-link>
            </div>

            <div class="hidden pb-6 space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('presensi.index')" :active="request()->routeIs('presensi.index')">
                    <i class="fa-solid fa-calendar-days pr-2"></i>{{ __('Rekap Absensi') }}
                </x-nav-link>
            </div>
        @endhasrole

    </div>
</nav>
