@foreach ($instances as $instansi)
    <div class="modal fade" id="openModel_{{ $instansi->id_instansi }}" tabindex="-1"
        aria-labelledby="openModalLabel_{{ $instansi->id_instansi }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 font-bold" id="openModalLabel_{{ $instansi->id_instansi }}">Informasi
                        Instansi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="flex">
                        @if (Auth::user()->hasRole('kajur') || Auth::user()->hasRole('guru'))
                            <div class="flex-auto">
                                <div class="font-bold">
                                    <label>Kode Instansi</label>
                                </div>
                                <div>
                                    <p>{{ $instansi->kode_instansi }}</p>
                                </div>
                            </div>
                        @endif

                        <div class="flex-auto">
                            <div class="font-bold">
                                <label>Instansi</label>
                            </div>
                            <div>
                                <p>{{ $instansi->nama_instansi }}</p>
                            </div>
                        </div>

                        <div class="flex-auto">
                            <div class="font-bold">
                                <label>Guru Pembimbing</label>
                            </div>
                            <div>
                                <p>{{ $instansi->mentor->nama_guru }}</p>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="flex">
                        <div class="flex-auto">
                            <div class="font-bold">
                                <label>Alamat</label>
                            </div>
                            <div>
                                <p>{{ $instansi->alamat }}</p>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="flex">
                        <div class="w-32">
                            <div class="font-bold">
                                <label>Kuota</label>
                            </div>
                            <div>
                                <p>{{ $instansi->kuota }} Siswa/i</p>
                            </div>
                        </div>

                        <div class="w-32">
                            <div class="font-bold">
                                <label>Kota</label>
                            </div>
                            <div>
                                <p>{{ $instansi->kota->kota }}</p>
                            </div>
                        </div>

                        <div class="w-64">
                            <div class="font-bold">
                                <label>No. Telp</label>
                            </div>
                            <div>
                                <p>{{ $instansi->no_telp }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <x-secondary-button tag="a" data-bs-dismiss="modal">Close</x-secondary-button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endforeach
