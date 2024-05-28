@include('instansi.create')
@include('instansi.edit')
@include('instansi.delete')

<title>Ketua Jurusan - Kelola Instansi</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Instansi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-auto mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <button type="button" class="btn btn-outline-secondary m-4" data-bs-toggle="modal"
                    data-bs-target="#tambahModal">
                    Tambah ➕
                </button>

                <div class="p-6 text-gray-900">
                    <x-table :tableId="'myTable_' . uniqid()">
                        <x-slot name="header">
                            <tr>
                                <th>No.</th>
                                <th>Instansi</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>Nomor Telepon</th>

                                @hasrole('kajur')
                                    <th>Aksi</th>
                                @endhasrole

                            </tr>
                        </x-slot>

                        @php $num = 1; @endphp
                        @foreach ($instances as $data)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $data->kode_instansi }} - {{ $data->nama_instansi }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>
                                    {{ $data->kota->id_kota }} - {{ $data->kota->kota }}
                                </td>
                                <td>{{ $data->no_telp }}</td>

                                @hasrole('kajur')
                                    <td>
                                        <button tag="a" type="button" class="btn btn-outline-warning"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $data->id_instansi }}">
                                            {{ __('🖍') }}
                                        </button>
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapusModal_{{ $data->id_instansi }}">
                                            {{ __('🗑') }}
                                        </button>
                                    </td>
                                @endhasrole

                            </tr>
                        @endforeach
                    </x-table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
