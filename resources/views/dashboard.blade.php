<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-4">
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
                </style>
                <div class="flex flex-wrap pt-4 gap-4 responsive-margin">
                    <div style="width: 218.5px;" class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-auto">
                        <div class="p-3 text-gray-900">
                            <h2 class="font-bold text-xl text-gray-800 leading-tight">Data Guru</h2>
                            <small>Data guru yang terdata sebagai pembimbing PKL</small>
                            <p class="font-extrabold text-2xl text-right pt-2">{{ App\Models\Mentor::count() }}</p>
                        </div>
                    </div>

                    <div style="width: 218.5px;" class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-auto">
                        <div class="p-3 text-gray-900">
                            <h2 class="font-bold text-xl text-gray-800 leading-tight">Data Instansi</h2>
                            <small>Data instansi yang terdata sebagai lokasi tempat PKL</small>
                            <p class="font-extrabold text-2xl text-right pt-2">{{ App\Models\Instance::count() }}</p>
                        </div>
                    </div>

                    <div style="width: 218.5px;" class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-auto">
                        <div class="p-3 text-gray-900">
                            <h2 class="font-bold text-xl text-gray-800 leading-tight">Data Siswa/i</h2>
                            <small>Data siswa/siswi yang terdata sebagai pelaksana PKL</small>
                            <p class="font-extrabold text-2xl text-right pt-2">{{ App\Models\Student::count() }}</p>
                        </div>
                    </div>

                    <div style="width: 218.5px;" class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-auto">
                        <div class="p-3 text-gray-900">
                            <h2 class="font-bold text-xl text-gray-800 leading-tight">Pengajuan PKL</h2>
                            <small>Data pengajuan siswa/siswi yang belum dikonfirmasi</small>
                            <p class="font-extrabold text-2xl text-right pt-2">
                                {{ App\Models\Submission::where('status', 0)->count() }}</p>
                        </div>
                    </div>

                    <div style="width: 218.5px;" class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-auto">
                        <div class="p-3 text-gray-900">
                            <h2 class="font-bold text-xl text-gray-800 leading-tight">Konfirmasi PKL</h2>
                            <small>Data pengajuan siswa/siswi yang sudah dikonfirmasi</small>
                            <p class="font-extrabold text-2xl text-right pt-2">
                                {{ App\Models\Submission::where('status', 1)->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-4 pt-10 max-w-7xl">
                    <div class="maps">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.2909714056781!2d107.12694790229615!3d-6.8709574169048535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68518cc3458d57%3A0x720ebf757efb66f5!2sSMKN%201%20Cilaku%2C%20Cianjur!5e0!3m2!1sid!2sid!4v1723987264539!5m2!1sid!2sid"
                            height="300" width="640" style="border:1px solid white; border-radius: 8px;"
                            class="shadow-sm" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="border-1 border-white rounded-lg py-4 pr-4 bg-white shadow-sm">
                        <canvas id="myChart" style="height: 250px;"></canvas>
                    </div>
                </div>
            @endhasrole

        </div>
    </div>
</x-app-layout>

@php
    $laki_laki = DB::table('students')->where('jenis_kelamin', 'L')->count();
    $perempuan = DB::table('students')->where('jenis_kelamin', 'P')->count();
@endphp

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
