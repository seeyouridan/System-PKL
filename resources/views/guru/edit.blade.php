@foreach ($mentors as $mentor)
    <div class="modal fade" id="exampleModal_{{ $mentor->id_guru }}" tabindex="-1"
        aria-labelledby="exampleModalLabel_{{ $mentor->id_guru }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel_{{ $mentor->id_guru }}">Edit Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('guru.update', $mentor->id_guru) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')

                        <div class="max-w-xl">
                            <x-input-label for="username" value="Username" />
                            <x-text-input id="username" type="text" name="username" class="mt-1 block w-full"
                                value="{{ old('username', $mentor->user->username ?? '') }}" required autocomplete/>
                            <x-input-error class="mt-2" :messages="$errors->get('username')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="nip_guru" value="NIP / NUPTK" />
                            <x-text-input id="nip_guru" type="text" name="nip_guru" class="mt-1 block w-full"
                                value="{{ old('nip_guru', $mentor->nip_guru) }}" autocomplete/>
                            <x-input-error class="mt-2" :messages="$errors->get('nip_guru')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="nama_guru" value="Nama Guru" />
                            <x-text-input id="nama_guru" type="text" name="nama_guru" class="mt-1 block w-full"
                                value="{{ old('nama_guru', $mentor->nama_guru) }}" required autocomplete />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_guru')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="jenis_kelamin" value="Jenis Kelamin" />
                            <x-select-input id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full" required autocomplete>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="P"
                                    {{ old('jenis_kelamin', $mentor->jenis_kelamin) === 'P' ? 'selected' : '' }}>Perempuan
                                </option>
                                <option value="L"
                                    {{ old('jenis_kelamin', $mentor->jenis_kelamin) === 'L' ? 'selected' : '' }}>Laki-Laki
                                </option>
                            </x-select-input>
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="no_telp" value="Nomor Telepon" />
                            <x-text-input id="no_telp" type="text" name="no_telp" class="mt-1 block w-full"
                                value="{{ old('no_telp', $mentor->no_telp) }}" autocomplete/>
                            <x-input-error class="mt-2" :messages="$errors->get('no_telp')" />
                        </div>

                        <div class="modal-footer">
                            <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
                            <x-primary-button value="true">Simpan</x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endforeach
