<x-app-layout>
    @include('laporan.create')
    @include('laporan.edit')
    @include('laporan.addNilai')
    @include('laporan.delete')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (Auth::user()->hasRole('siswa'))
                {{ __('Pengumpulan Laporan') }}
            @elseif (Auth::user()->hasRole('guru'))
                {{ __('Data Laporan') }}
            @endif
        </h2>
    </x-slot>

    <div class="pt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @hasrole('siswa')
                        <div class="alert alert-danger" role="alert">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Pengumpulan Laporan PKL') }}
                            </h2>

                            @if (Auth::check())
                                @php
                                    $userId = Auth::id();
                                    $siswa = \App\Models\Student::where('id_user', $userId)->first();
                                    $studentReport = $reports->where('id_siswa', $siswa->id_siswa)->first();
                                @endphp

                                @if ($studentReport)
                                    @if (
                                        ($studentReport->laporan != null && $studentReport->laporan_revisi != null && $studentReport->nilai != null) ||
                                            ($studentReport->laporan != null && $studentReport->laporan_revisi == null && $studentReport->nilai != null))
                                        <div>
                                            Anda telah menyelesaikan kegiatan PKL sepenuhnya, semoga sukses kedepannya!
                                        </div>
                                    @elseif ($studentReport->laporan != null && $studentReport->laporan_revisi != null && $studentReport->nilai == null)
                                        <div>
                                            Anda telah melakukan sidang PKL dan mengumpulkan laporan revisi, silakan
                                            menunggu nilai keluar!
                                        </div>
                                    @elseif ($studentReport->laporan != null && $studentReport->laporan_revisi == null && $studentReport->nilai == null)
                                        <div>
                                            Laporan sudah terkirim. Selamat melakukan sidang, semoga sukses.
                                            <br>
                                            <small>* untuk pengumpulan laporan revisi, ditentukan setelah sidang PKL</small>
                                        </div>
                                    @endif
                                @else
                                    <div>
                                        <div>
                                            Silahkan lampirkan Laporan PKL dengan format file .pdf!
                                        </div>
                                        <button type="button" class="btn btn-outline-danger mt-4" data-bs-toggle="modal"
                                            data-bs-target="#tambahModal">
                                            Kirim Laporan <i class="fa-solid fa-circle-plus"></i>
                                        </button>
                                    </div>
                                @endif

                            @endif
                        </div>
                    @endhasrole

                    <x-table :tableId="'myTable_' . uniqid()">
                        <x-slot name="header">
                            <tr>
                                <td>No.</td>
                                <td>Nama Siswa</td>
                                <td>Laporan</td>
                                <td>
                                    Laporan Revisi
                                    <br><small class="text-red-700">* tidak wajib diisi</small>
                                </td>
                                <td>Nilai</td>
                                @if (Auth::user()->hasRole('guru'))
                                    <td>Status</td>
                                @elseif (Auth::user()->hasRole('siswa'))
                                    @if (\App\Models\Laporan::where('nilai') == !null)
                                        <td>Aksi</td>
                                    @else
                                        <td>Status</td>
                                    @endif
                                @endif
                            </tr>
                        </x-slot>

                        @php $num = 1; @endphp
                        @foreach ($reports as $data)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $data->siswa->nama }}</td>
                                <td><a href="{{ Storage::url($data->laporan) }}"
                                        target="_blank">{{ $data->nama_file }}</a></td>
                                <td><a href="{{ Storage::url($data->laporan_revisi) }}"
                                        target="_blank">{{ $data->nama_file_revisi }}</a></td>
                                <td>
                                    @if ($data->nilai == 0)
                                        @hasrole('guru')
                                            <div>
                                                <button tag="a" type="button" class="btn btn-outline-info"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalNilai_{{ $data->id_laporan }}">
                                                    <i class="fa-solid fa-marker"></i>
                                                </button>
                                            </div>
                                        @endhasrole
                                    @else
                                        {{ $data->nilai }}
                                    @endif
                                </td>
                                <td>
                                    @if (Auth::user()->hasRole('guru'))
                                        @if ($data->nilai == 0)
                                            <div>
                                                <span class="badge badge-danger">Belum Dinilai!</span>
                                            </div>
                                        @else
                                            <div>
                                                <span class="badge badge-success">Sudah Dinilai!</span>
                                            </div>
                                        @endif
                                    @elseif (Auth::user()->hasRole('siswa'))
                                        @if ($data->laporan_revisi == null && $data->niliai == null)
                                            <div>
                                                <button tag="a" type="button" class="btn btn-outline-warning"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal_{{ $data->id_laporan }}">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </button>
                                            </div>
                                        @else
                                            <div>
                                                <button tag="a" type="button" class="btn btn-outline-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#hapusModal_{{ $data->id_laporan }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </x-table>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
