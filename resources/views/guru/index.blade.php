<x-app-layout>

    @include('guru.create')
    @include('guru.edit')
    @include('guru.delete')
    @include('guru.open')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (Auth::user()->hasRole('siswa'))
                {{ __('Data Guru') }}
            @elseif (Auth::user()->hasRole('kajur'))
                {{ __('Kelola Guru') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
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
                                <th>NIP / NUPTK</th>
                                <th>Nama Guru</th>
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
                                <td>{{ $data->no_telp }}</td>
                                <td>
                                    <button tag="a" type="button" class="btn btn-outline-success"
                                        data-bs-toggle="modal" data-bs-target="#openModel_{{ $data->id_guru }}">
                                        <i class="fa-solid fa-folder"></i>
                                    </button>

                                    @hasrole('kajur')
                                        <button tag="a" type="button" class="btn btn-outline-warning"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $data->id_guru }}">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapusModal_{{ $data->id_guru }}">
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
