<x-app-layout>

    @include('pengajuan.create')
    
    @foreach ($submissions as $data)
        @include('pengajuan.delete', ['data' => $data])
    @endforeach

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
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Pengajuan PKL jurusan DPIB') }}
                            </h2>

                            @if (Auth::check())
                                @php
                                    $userId = Auth::id();
                                    $student = \App\Models\Student::where('id_user', $userId)->first();
                                    $studentSubmission = $submissions->where('id_siswa', $student->id_siswa)->first();
                                @endphp

                                @if ($studentSubmission)
                                    @if ($studentSubmission->status == 0)
                                        <div>
                                            Terimakasih, pengajuan anda sudah terkirim, silahkan menunggu hingga
                                            terverifikasi!
                                        </div>
                                        <button type="button" class="btn btn-outline-danger mt-4" data-bs-toggle="modal"
                                            data-bs-target="#hapusModal_{{ $studentSubmission->id_pengajuan }}">
                                            Batalkan Pengajuan <i class="fa-solid fa-circle-minus"></i>
                                        </button>
                                    @elseif ($studentSubmission->status == 1)
                                        <div>
                                            Pengajuan telah diverifikasi, silahkan cek halaman <a class="text-blue-600"
                                                href="{{ route('pkl.index') }}">PKL</a>
                                        </div><br>
                                        <div>
                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                                Untuk membatalkan pengajuan yang telah di verifikasi, hubungi pihak jurusan
                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                        </div>
                                    @endif
                                @else
                                    <div>
                                        Silahkan buat pengajuan.
                                    </div>
                                    <button type="button" class="btn btn-outline-danger mt-4" data-bs-toggle="modal"
                                        data-bs-target="#tambahModal">
                                        Buat Pengajuan <i class="fa-solid fa-circle-plus"></i>
                                    </button>
                                @endif
                            @endif
                        </div>
                    @endhasrole

                    <x-table :tableId="'myTable_' . uniqid()">
                        <x-slot name="header">
                            <tr>
                                <th>No.</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Kota</th>
                                <th>Status</th>
                                @hasrole('kajur')
                                    <th>Aksi</th>
                                @endhasrole
                            </tr>
                        </x-slot>

                        @php $num = 1; @endphp
                        @foreach ($submissions as $data)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $data->student->nis }}</td>
                                <td>{{ $data->student->nama }}</td>
                                <td>{{ $data->city->kota }}</td>
                                <td class="text-center">
                                    @if ($data->status == 0)
                                        <span class="badge badge-warning">Proses</span>
                                    @elseif ($data->status == 1)
                                        <span class="badge badge-success">Terverifikasi</span>
                                    @endif
                                </td>
                                @hasrole('kajur')
                                    <td class="text-center">
                                        @if ($data->status == 0)
                                            <form action="{{ route('pengajuan.verify', $data->id_pengajuan) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-primary">Verifikasi</button>
                                            </form>
                                        @endif
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
