@foreach ($mentors as $mentor)
    <div class="modal fade" id="openModel_{{ $mentor->id_guru }}" tabindex="-1"
        aria-labelledby="openModalLabel_{{ $mentor->id_guru }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 font-bold" id="openModalLabel_{{ $mentor->id_guru }}">Informasi
                        Guru Pembimbing</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="sm:flex block">
                        <div class="w-52">
                            <div class="font-bold">
                                <label>NIP / NUPTK</label>
                            </div>
                            <div>
                                @if ($mentor->nip_guru == null)
                                    <i>
                                        Tidak Diketahui
                                    </i>
                                @elseif ($mentor->nip_guru == !null)
                                    <p>{{ $mentor->nip_guru }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="flex-auto">
                            <div class="font-bold">
                                <label>Nama</label>
                            </div>
                            <div>
                                <p>{{ $mentor->nama_guru }}</p>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="sm:flex block">
                        @hasrole('kajur')
                            <div class="w-52">
                                <div class="font-bold">
                                    <label>Username</label>
                                </div>
                                <div>
                                    <p>{{ $mentor->user->username }}</p>
                                </div>
                            </div>
                        @endhasrole

                        <div class="w-56">
                            <div class="font-bold">
                                <label>Peran</label>
                            </div>
                            <div>
                                <p>
                                    @foreach ($mentor->user->roles as $role)
                                        @if ($role->name === 'kajur')
                                            {{ 'Ketua Jurusan' }}
                                        @elseif ($role->name === 'guru')
                                            {{ 'Pembimbing' }}
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                        </div>

                        <div class="flex-auto">
                            <div class="font-bold">
                                <label>Jenis Kelamin</label>
                            </div>
                            <div>
                                <p>
                                    @if ($mentor->jenis_kelamin === 'L')
                                        {{ 'Laki-Laki' }}
                                    @elseif ($mentor->jenis_kelamin === 'P')
                                        {{ 'Perempuan' }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <x-secondary-button tag="a" data-bs-dismiss="modal">Close</x-secondary-button>
                </div>
            </div>
        </div>
    </div>
@endforeach
