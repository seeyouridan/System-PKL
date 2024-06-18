<x-app-layout>

    @include('pengajuan.create')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengajuan PKL') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @hasrole('siswa')
                        <div class="alert alert-danger" role="alert">
                            <div>
                                Pengajuan PKL SMK Negeri 1 Cilaku
                            </div>

                            {{-- <a href="{{ route('pengajuan.create') }}">
                                Tambah Pengajuan
                            </a> --}}

                            <button type="button" class="btn btn-outline-danger mt-4" data-bs-toggle="modal"
                                data-bs-target="#tambahModal">
                                Buat Pengajuan <i class="fa-solid fa-circle-plus"></i>
                            </button>
                        </div>
                    @endhasrole

                    <x-table :tableId="'myTable_' . uniqid()">
                        <x-slot name="header">
                            <tr>
                                <th>No.</th>
                                <th>Nis</th>
                                <th>Nama Siswa</th>
                                <th>Kota</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </x-slot>

                        @php $num = 1; @endphp
                        @foreach ($submissions as $data)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $data->siswa->nis }}</td>
                                <td>{{ $data->siswa->nama }}</td>
                                <td>{{ $data->kota->kota }}</td>
                                <td>{{ $data->status }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>