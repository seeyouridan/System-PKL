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

                <div class="py-4">
                    @if ($students)
                        <p>Halaman presensi {{ $students->nama }}</p>
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
                            <th>Keterangan</th>
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
                            <td class="text-center">{{ $data->keterangan }}</td>
                            <td><a href="https://maps.google.com/maps?q={{ $data->kode_latitude }},{{ $data->kode_longitude }}"
                                    target="_blank">
                                    <i class="fa fa-solid fa-location-dot p-2"></i> Cek Lokasi
                                </a></td>
                            <td>{{ $data->jurnal_kegiatan }}</td>
                            <td class="text-center">{{ $data->status }}</td>
                        </tr>
                    @endforeach
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>
