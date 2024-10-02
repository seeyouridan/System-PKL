<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rekap Absensi Siswa</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    {{-- icon logo --}}
    <link rel="icon" type="png" href="{{ asset('img/logo-sekolah.png') }}">
</head>

<body class="font-sans antialiased">
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
</body>

</html>
