<x-app-layout>

    @include('instansi.create')
    @include('instansi.edit')
    @include('instansi.delete')
    @include('instansi.open')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (Auth::user()->hasRole('siswa'))
                {{ __('Data Instansi') }}
            @elseif (Auth::user()->hasRole('guru'))
                {{ __('Data Instansi') }}
            @elseif (Auth::user()->hasRole('kajur'))
                {{ __('Kelola Instansi') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @hasrole('kajur')
                    <button type="button" class="btn btn-outline-secondary m-4" data-bs-toggle="modal"
                        data-bs-target="#tambahModal">
                        Tambah <i class="fa-solid fa-circle-plus"></i>
                    </button>
                @endhasrole

                <div class="p-6 text-gray-900">
                    <x-table :tableId="'myTable_' . uniqid()">
                        <x-slot name="header">
                            <tr>
                                <th>No.</th>
                                <th>Instansi</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>Aksi</th>
                            </tr>
                        </x-slot>

                        @php $num = 1; @endphp
                        @foreach ($instances as $data)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $data->kode_instansi }} - {{ $data->nama_instansi }}</td>
                                <td>{{ Str::limit($data->alamat, 50) }}</td>
                                <td>
                                    {{ $data->kota->id_kota }} - {{ $data->kota->kota }}
                                </td>
                                <td>
                                    <button tag="a" type="button" class="btn btn-outline-success"
                                        data-bs-toggle="modal" data-bs-target="#openModel_{{ $data->id_instansi }}">
                                        <i class="fa-solid fa-folder"></i>
                                    </button>

                                    @hasrole('kajur')
                                        <button tag="a" type="button" class="btn btn-outline-warning"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $data->id_instansi }}">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapusModal_{{ $data->id_instansi }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    @endhasrole
                                </td>
                            </tr>
                        @endforeach
                    </x-table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
