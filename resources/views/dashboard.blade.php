<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (Auth::check())
                    @php
                    $userId = Auth::id();

                    $mentor = \App\Models\Mentor::where('id_user', $userId)->first();

                    $sapaan = '';
                    if ($mentor) {
                    if ($mentor->jenis_kelamin == 'L') {
                    $sapaan = 'Pak';
                    } elseif ($mentor->jenis_kelamin == 'P') {
                    $sapaan = 'Ibu';
                    }
                    }
                    @endphp

                    Selamat datang, {{ $sapaan }} {{ Auth::user()->name }}!
                    @endif
                </div>
            </div>

            @hasrole('kajur')
            <div class="flex flex-wrap pt-4 gap-4">
                <div class="bg-white w-64 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-bold text-2xl text-gray-800 leading-tight">Data Guru</h2>
                        <small>Data guru yang terdata sebagai pembimbing PKL</small>
                        <p class="font-extrabold text-4xl text-right pt-2">{{ App\Models\Mentor::count() }}</p>
                    </div>
                </div>

                <div class="bg-white w-64 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-bold text-2xl text-gray-800 leading-tight">Data Instansi</h2>
                        <small>Data instansi yang terdata sebagai lokasi tempat PKL</small>
                        <p class="font-extrabold text-4xl text-right pt-2">{{ App\Models\Instance::count() }}</p>
                    </div>
                </div>

                <div class="bg-white w-64 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-bold text-2xl text-gray-800 leading-tight">Data Siswa/i</h2>
                        <small>Data siswa/siswi yang terdata sebagai pelaksana PKL</small>
                        <p class="font-extrabold text-4xl text-right pt-2">{{ App\Models\Student::count() }}</p>
                    </div>
                </div>

                <div class="bg-white w-64 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-bold text-2xl text-gray-800 leading-tight">Pengajuan PKL</h2>
                        <small>Data pengajuan siswa/siswi yang belum dikonfirmasi</small>
                        <p class="font-extrabold text-4xl text-right pt-2">{{ App\Models\Submission::where('status', 0)->count() }}</p>
                    </div>
                </div>

                <div class="bg-white w-64 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-bold text-2xl text-gray-800 leading-tight">Konfirmasi PKL</h2>
                        <small>Data pengajuan siswa/siswi yang sudah dikonfirmasi</small>
                        <p class="font-extrabold text-4xl text-right pt-2">{{ App\Models\Submission::where('status', 1)->count() }}</p>
                    </div>
                </div>
            </div>
            @endhasrole

        </div>
    </div>
</x-app-layout>