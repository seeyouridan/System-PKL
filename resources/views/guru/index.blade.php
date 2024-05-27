@include('guru.create')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Instansi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah ➕
                </button>

                <div class="p-6 text-gray-900">
                    <x-table :tableId="'myTable_' . uniqid()">
                        <x-slot name="header">
                            <tr>
                                <th>No.</th>
                                <th>NIP / NUPTK</th>
                                <th>Nama Guru</th>
                                <th>Jenis Kelamin</th>
                                <th>No. Telp</th>
                                <th>Aksi</th>
                            </tr>
                        </x-slot>

                        @php $num = 1; @endphp
                        @foreach ($mentors as $data)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $data->nip_guru }}</td>
                                <td>{{ $data->nama_guru }}</td>
                                <td>
                                    @if ($data->jenis_kelamin == 'L')
                                        Laki-Laki
                                    @elseif($data->jenis_kelamin == 'P')
                                        Perempuan
                                    @endif
                                </td>
                                <td>{{ $data->no_telp }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
