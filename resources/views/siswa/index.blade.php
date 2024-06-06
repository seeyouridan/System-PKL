@include('siswa.create')
{{-- @include('siswa.edit') --}}
{{-- @include('siswa.delete') --}}
{{-- @include('siswa.open') --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-auto mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @hasrole('kajur')
                    <button type="button" class="btn btn-outline-secondary m-4" data-bs-toggle="modal"
                        data-bs-target="#tambahModal">
                        Tambah <i class="fa-solid fa-circle-plus"></i>
                    </button>
                @endhasrole

                <div class="p-6 text-gray-900">
                    @if ($students->isEmpty())
                        <p>No students assigned to you.</p>
                    @else
                        <x-table :tableId="'myTable_' . uniqid()">
                            <x-slot name="header">
                                <tr>
                                    <th>No.</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                                </tr>
                            </x-slot>

                            @php $num = 1; @endphp
                            @foreach ($students as $data)
                                <tr>
                                    <td>{{ $num++ }}</td>
                                    <td>{{ $data->nis }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>
                                        @if ($data->jenis_kelamin === 'L')
                                            {{ 'Laki-Laki' }}
                                        @elseif ($data->jenis_kelamin === 'P')
                                            {{ 'Perempuan' }}
                                        @endif
                                    </td>
                                    <td>{{ $data->major->nama_jurusan }}</td>
                                    <td>
                                        <button tag="a" type="button" class="btn btn-outline-success"
                                            data-bs-toggle="modal" data-bs-target="#openModel_{{ $data->id_instansi }}">
                                            <i class="fa-solid fa-folder"></i>
                                        </button>

                                        @hasrole('kajur')
                                            <button tag="a" type="button" class="btn btn-outline-warning"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModal_{{ $data->id_instansi }}">
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
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
