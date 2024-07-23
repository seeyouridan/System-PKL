<x-app-layout>

    @include('pkl.create')
    @include('pkl.delete')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Penempatan PKL') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @hasrole('kajur')
                    <button type="button" class="btn btn-outline-secondary m-4" data-bs-toggle="modal"
                        data-bs-target="#tambahModal">
                        Input Siswa PKL <i class="fa-solid fa-circle-plus"></i>
                    </button>
                @endhasrole

                <div class="p-6 text-gray-900">
                    <x-table :tableId="'myTable_' . uniqid()">
                        <x-slot name="header">
                            <tr>
                                <th>No.</th>
                                <th>Nis</th>
                                <th>Nama Siswa</th>
                                <th>Instansi</th>
                                <th>Guru Pembimbing</th>
                                @hasrole('kajur')
                                    <th>Aksi</th>
                                @endhasrole
                            </tr>
                        </x-slot>

                        @php $num = 1; @endphp
                        @foreach ($pkls as $row)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $row->student->nis }}</td>
                                <td>{{ $row->student->nama }}</td>
                                <td>{{ $row->instance->nama_instansi }}</td>
                                <td>{{ $row->instance->mentor->nama_guru }}</td>
                                @hasrole('kajur')
                                    <td>
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapusModal_{{ $row->id_pkl }}">
                                            <i class="fa-solid fa-trash"></i>
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
