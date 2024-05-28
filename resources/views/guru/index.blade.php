@include('guru.create')
@include('guru.edit')

<title>Ketua Jurusan - Kelola Guru</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Instansi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                                <th>NIP / NUPTK</th>
                                <th>Nama Guru</th>
                                <th>Jenis Kelamin</th>
                                <th>No. Telp</th>

                                @hasrole('kajur')
                                    <th>Aksi</th>
                                @endhasrole

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

                                @hasrole('kajur')
                                    <td>
                                        <button tag="a" type="button" class="btn btn-outline-warning"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $data->id_guru }}">
                                            {{ __('🖍') }}
                                        </button>
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapusModal_{{ $data->id_guru }}">
                                            {{ __('🗑') }}
                                        </button>
                                    </td>
                                @endhasrole

                            </tr>
                        @endforeach
                    </x-table>

                    <div class="modal fade" id="hapusModal_{{ $data->id_guru }}" tabindex="-1"
                        aria-labelledby="hapusModalLabel_{{ $data->id_guru }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="hapusModalLabel_{{ $data->id_guru }}">Edit
                                        Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('guru.destroy', $data->id_guru) }}"
                                        enctype="multipart/form-data" class="mt-6 space-y-6">
                                        @csrf
                                        @method('delete')

                                        <p>Anda yakin ingin menghapus data {{ $data->nama_guru }} ?</p>

                                        <div class="modal-footer">
                                            <x-secondary-button tag="a"
                                                data-bs-dismiss="modal">Batal</x-secondary-button>
                                            <x-primary-button value="true">Hapus!</x-primary-button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
