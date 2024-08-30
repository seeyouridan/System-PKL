<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-gray-900">
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

                        <strong>Selamat datang</strong>, {{ $sapaan }} {{ Auth::user()->name }}!
                    @endif
                </div>
            </div>

            @hasrole('kajur')
                <style>
                    @media (min-width: 640px) {
                        .responsive-margin>div {
                            margin: 0 !important;
                        }
                    }

                    a:hover {
                        transition-duration: 0.25s;
                        color: black;
                        text-decoration: none;
                    }
                </style>
                <div class="flex flex-wrap pt-4 gap-4 responsive-margin w-full">
                    <div style="width: 218.5px;" class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-auto">
                        <div class="p-3 text-gray-900">
                            <h2 class="font-bold text-xl text-gray-800 leading-tight">Data Guru</h2>

                            <hr style="height: 1px; background-color: black;" class="rounded">
                            <small>Data guru yang terdata sebagai pembimbing PKL</small>
                            <p class="font-extrabold text-2xl text-right pt-2">{{ App\Models\Mentor::count() }}</p>

                            <hr style="height: 1px; background-color: black;" class="rounded">
                            <a href="{{ route('guru.index') }}" class="text-gray-500">Lihat Data Guru ></a>
                        </div>
                    </div>

                    <div style="width: 218.5px;" class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-auto">
                        <div class="p-3 text-gray-900">
                            <h2 class="font-bold text-xl text-gray-800 leading-tight">Data Instansi</h2>

                            <hr style="height: 1px; background-color: black;" class="rounded">
                            <small>Data instansi yang terdata sebagai lokasi tempat PKL</small>
                            <p class="font-extrabold text-2xl text-right pt-2">{{ App\Models\Instance::count() }}</p>

                            <hr style="height: 1px; background-color: black;" class="rounded">
                            <a href="{{ route('instansi.index') }}" class="text-gray-500">Lihat Data Instansi ></a>
                        </div>
                    </div>

                    <div style="width: 218.5px;" class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-auto">
                        <div class="p-3 text-gray-900">
                            <h2 class="font-bold text-xl text-gray-800 leading-tight">Data Siswa/i</h2>

                            <hr style="height: 1px; background-color: black;" class="rounded">
                            <small>Data siswa/siswi yang terdata sebagai pelaksana PKL</small>
                            <p class="font-extrabold text-2xl text-right pt-2">{{ App\Models\Student::count() }}</p>

                            <hr style="height: 1px; background-color: black;" class="rounded">
                            <a href="{{ route('siswa.index') }}" class="text-gray-500">Lihat Data Siswa ></a>
                        </div>
                    </div>

                    <div style="width: 218.5px;" class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-auto">
                        <div class="p-3 text-gray-900">
                            <h2 class="font-bold text-xl text-gray-800 leading-tight">Pengajuan PKL</h2>

                            <hr style="height: 1px; background-color: black;" class="rounded">
                            <small>Data pengajuan siswa/siswi yang belum dikonfirmasi</small>
                            <p class="font-extrabold text-2xl text-right pt-2">
                                {{ App\Models\Submission::where('status', 0)->count() }}</p>
                        </div>
                    </div>

                    <div style="width: 218.5px;" class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-auto">
                        <div class="p-3 text-gray-900">
                            <h2 class="font-bold text-xl text-gray-800 leading-tight">Konfirmasi PKL</h2>

                            <hr style="height: 1px; background-color: black;" class="rounded">
                            <small>Data pengajuan siswa/siswi yang sudah dikonfirmasi</small>
                            <p class="font-extrabold text-2xl text-right pt-2">
                                {{ App\Models\Submission::where('status', 1)->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-4 pt-4 responsive-margin">
                    <div class="maps m-auto">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.2909714056781!2d107.12694790229615!3d-6.8709574169048535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68518cc3458d57%3A0x720ebf757efb66f5!2sSMKN%201%20Cilaku%2C%20Cianjur!5e0!3m2!1sid!2sid!4v1723987264539!5m2!1sid!2sid"
                            height="300" width="640" style="border:1px solid white; border-radius: 8px;"
                            class="shadow-sm" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="border-1 border-white rounded-lg py-4 pr-4 bg-white shadow-sm m-auto">
                        <canvas id="chartKjr" style="height: 250px;"></canvas>
                    </div>
                </div>
            @endhasrole

            @hasrole('guru')
                <style>
                    @media (min-width: 640px) {
                        .responsive-margin>div {
                            margin: 0 !important;
                        }
                    }

                    a:hover {
                        transition-duration: 0.25s;
                        color: black;
                        text-decoration: none;
                    }
                </style>

                @php
                    $userId = Auth::id();
                    $mentor = \App\Models\Mentor::where('id_user', $userId)->first();

                    if ($mentor) {
                        $mentorId = $mentor->id_guru;
                        $jumlahSiswa = \App\Models\Student::where('id_guru', $mentorId)->count();
                    } else {
                        $jumlahSiswa = 0;
                    }

                    $siswaId = \App\Models\Student::where('id_guru', $mentorId)->pluck('id_siswa');
                    $jumlahSiswaLaporan = \App\Models\Laporan::whereIn('id_siswa', $siswaId)->count();

                    $laki_laki = DB::table('students')
                        ->where('jenis_kelamin', 'L')
                        ->where('id_guru', $mentorId)
                        ->count();
                    $perempuan = DB::table('students')
                        ->where('jenis_kelamin', 'P')
                        ->where('id_guru', $mentorId)
                        ->count();
                @endphp

                <div class="flex flex-wrap pt-4 gap-4 responsive-margin">
                    <div style="width: 218.5px;" class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-auto">
                        <div class="p-3 text-gray-900">
                            <h2 class="font-bold text-xl text-gray-800 leading-tight">Data Instansi</h2>

                            <hr style="height: 1px; background-color: black;" class="rounded">
                            <small>Jumlah data instansi yang dibawah bimbingan</small>
                            <p class="font-extrabold text-2xl text-right pt-2">
                                {{ App\Models\Instance::where('id_guru', $mentorId)->count() }}
                            </p>

                            <hr style="height: 1px; background-color: black;" class="rounded">
                            <a href="{{ route('instansi.index') }}" class="text-gray-500">Lihat Data Instansi ></a>
                        </div>
                    </div>

                    <div style="width: 218.5px;" class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-auto">
                        <div class="p-3 text-gray-900">
                            <h2 class="font-bold text-xl text-gray-800 leading-tight">Data Siswa/i</h2>

                            <hr style="height: 1px; background-color: black;" class="rounded">
                            <small>Jumlah data siswa/siswi yang dibawah bimbingan</small>
                            <p class="font-extrabold text-2xl text-right pt-2">
                                {{ $jumlahSiswa }}
                            </p>

                            <hr style="height: 1px; background-color: black;" class="rounded">
                            <a href="{{ route('siswa.index') }}" class="text-gray-500">Lihat Data Siswa/i ></a>
                        </div>
                    </div>

                    <div style="width: 218.5px;" class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-auto">
                        <div class="p-3 text-gray-900">
                            <h2 class="font-bold text-xl text-gray-800 leading-tight">Data Laporan</h2>

                            <hr style="height: 1px; background-color: black;" class="rounded">
                            <small>Jumlah siswa/siswi yang sudah mengumpulkan laporan PKL</small>
                            <p class="font-extrabold text-2xl text-right pt-2">
                                {{ $jumlahSiswaLaporan }}
                            </p>

                            <hr style="height: 1px; background-color: black;" class="rounded">
                            <a href="{{ route('laporan.index') }}" class="text-gray-500">Lihat Data Laporan ></a>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-4 pt-10 max-w-7xl responsive-margin">
                    <div class="border-1 pt-10 border-white rounded-lg py-4 pr-4 bg-white shadow-sm m-auto">
                        <canvas id="myChart" style="width: 500px; height: 250px;"></canvas>
                    </div>
                </div>
            @endhasrole

            @hasrole('siswa')
                <style>
                    @media (min-width: 640px) {
                        .responsive-margin>div {
                            margin: 0 !important;
                        }
                    }
                </style>

                <div class="flex flex-wrap pt-4 gap-4 responsive-margin">
                    <div style="width: 500px;">
                        <div class="alert alert-danger h-60">
                            <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quos reprehenderit
                                obcaecati
                                totam deserunt tempora, atque amet labore quibusdam repellendus pariatur dolore eligendi
                                accusantium asperiores, vero molestiae corrupti mollitia impedit.</h1>
                        </div>
                    </div>

                    <div style="width: 214.5px; height: 160px;"
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-auto">
                        <div class="p-3 text-gray-900">
                            <h2 class="font-bold text-xl text-gray-800 leading-tight">Pengajuan PKL</h2>

                            <hr style="height: 1px; background-color: black;" class="rounded">
                            <small>Data pengajuan siswa/siswi yang belum dikonfirmasi</small>
                            <p class="font-extrabold text-2xl text-right pt-2">
                                1
                            </p>
                        </div>
                    </div>
                    <div style="width: 214.5px; height: 160px;"
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-auto">
                        <div class="p-3 text-gray-900">
                            <h2 class="font-bold text-xl text-gray-800 leading-tight">Pengajuan PKL</h2>

                            <hr style="height: 1px; background-color: black;" class="rounded">
                            <small>Data pengajuan siswa/siswi yang belum dikonfirmasi</small>
                            <p class="font-extrabold text-2xl text-right pt-2">
                                1
                            </p>
                        </div>
                    </div>
                    <div style="width: 214.5px; height: 160px;"
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-auto">
                        <div class="p-3 text-gray-900">
                            <h2 class="font-bold text-xl text-gray-800 leading-tight">Pengajuan PKL</h2>

                            <hr style="height: 1px; background-color: black;" class="rounded">
                            <small>Data pengajuan siswa/siswi yang belum dikonfirmasi</small>
                            <p class="font-extrabold text-2xl text-right pt-2">
                                1
                            </p>
                        </div>
                    </div>

                </div>
            @endhasrole

        </div>
    </div>
</x-app-layout>

@hasrole('kajur')
    @php
        $laki_laki = DB::table('students')->where('jenis_kelamin', 'L')->count();
        $perempuan = DB::table('students')->where('jenis_kelamin', 'P')->count();
    @endphp

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const kjr = document.getElementById('chartKjr');

        const chartKjr = new Chart(kjr, {
            type: 'pie',
            data: {
                labels: ['Laki-Laki', 'Perempuan'],
                datasets: [{
                    label: ' Jumlah Siswa ',
                    data: [{{ $laki_laki }}, {{ $perempuan }}],
                    backgroundColor: ['#2e31ff', '#ff2e5b'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Data Siswa PKL Berdasarkan Jenis Kelamin',
                        font: {
                            size: 18,
                            weight: 'bold',
                        },
                        padding: {
                            top: 10,
                            bottom: 30
                        },
                        align: 'center',
                    },

                    legend: {
                        position: 'right',
                    }
                }
            }
        });
    </script>
@endhasrole

@hasrole('guru')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Laki-Laki', 'Perempuan'],
                datasets: [{
                    label: ' Jumlah Siswa ',
                    data: [{{ $laki_laki }}, {{ $perempuan }}],
                    backgroundColor: ['#2e31ff', '#ff2e5b'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Data Siswa PKL Berdasarkan Jenis Kelamin',
                        font: {
                            size: 18,
                            weight: 'bold',
                        },
                        padding: {
                            top: 10,
                            bottom: 30
                        },
                        align: 'center',
                    },

                    legend: {
                        position: 'right',
                    }
                }
            }
        });
    </script>
@endhasrole
