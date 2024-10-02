<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Presensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">

                <a type="button" class="btn btn-outline-danger p-2" href="{{ route('presensi.index') }}"><i
                        class="fa fa-solid fa-arrow-left pr-2"></i>Kembali</a>

                <div class="pt-4 pb-2">
                    @if ($students)
                        <div class="alert alert-danger" role="alert">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Halaman Presensi Siswa') }}
                            </h2>

                            <hr style="height: 1px; background-color: black;" class="rounded my-2">

                            <table>
                                <tr>
                                    <th>Nis</th>
                                    <th class="pl-8 pr-2">:</th>
                                    <td>{{ $students->nis }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <th class="pl-8 pr-2">:</th>
                                    <td>{{ $students->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Jurusan</th>
                                    <th class="pl-8 pr-2">:</th>
                                    <td>{{ $students->major->nama_jurusan }}</td>
                                </tr>
                            </table>

                            <div class="pt-4">
                                <a class="btn btn-outline-secondary"
                                    href="{{ route('presensi.komponen.print', $students->id_siswa) }}"
                                    target='_blank'>Cetak Absensi Siswa</a>
                            </div>
                        </div>
                    @else
                        <p>Data siswa tidak ditemukan.</p>
                    @endif
                </div>

                <x-table :tableId="'myTable_' . uniqid()">
                    <x-slot name="header">
                        <tr>
                            <th>No.</th>
                            <th>Siswa</th>
                            <th>Waktu Presensi</th>
                            <th>Lokasi</th>
                            <th>Jurnal</th>
                            <th>Status</th>
                        </tr>
                    </x-slot>

                    @php $num = 1; @endphp
                    @foreach ($presences as $data)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{ $data->siswa->nama }}</td>
                            <td>{{ $data->tanggal }} - {{ $data->waktu }}</td>
                            <td><a href="https://maps.google.com/maps?q={{ $data->kode_latitude }},{{ $data->kode_longitude }}"
                                    target="_blank">
                                    <i class="fa fa-solid fa-location-dot p-2"></i> Cek Lokasi
                                </a></td>
                            <td>{{ $data->jurnal_kegiatan }}</td>
                            @php
                                if ($data->status == 'Tidak Hadir') {
                                    $data->status = 'Melebihi waktu presensi';
                                }
                            @endphp
                            <td class="text-center">{{ $data->status }}</td>
                        </tr>
                    @endforeach
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>
