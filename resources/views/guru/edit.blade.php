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
                    <form method="post" action="{{ route('guru.update', $mentor->id_guru) }}"
                        enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')

                        <div class="input-group max-w-96">
                            <label for="username" class="form-label text-sm w-full">Buat Username</label>
                            <input id="username" type="text" name="username"
                                style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"
                                class="w-56 form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm block"
                                placeholder="Masukan username..." aria-describedby="basic-addon2"
                                value="{{ old('username', str_replace('@gmail.com', '', $mentor->user->username ?? '')) }}"
                                required autocomplete="off">
                            <span class="input-group-text" id="basic-addon2">@gmail.com</span>
                            <x-input-error class="mt-2" :messages="$errors->get('username')" />
                        </div>

                        <div class="sm:flex block gap-3">
                            <div class="max-w-xl">
                                <x-input-label for="nip_guru" value="NIP / NUPTK" />
                                <x-text-input id="nip_guru" type="text" name="nip_guru" class="mt-1 block w-full"
                                    placeholder="Masukan nomor..." value="{{ old('nip_guru', $mentor->nip_guru) }}"
                                    autocomplete="off" />
                                <x-input-error class="mt-2" :messages="$errors->get('nip_guru')" />
                            </div>

                            <div class="max-w-xl">
                                <x-input-label for="nama_guru" value="Nama Guru" />
                                <x-text-input id="nama_guru" type="text" name="nama_guru"
                                    class="mt-1 block sm:w-64 w-full" placeholder="Masukan nama guru..."
                                    value="{{ old('nama_guru', $mentor->nama_guru) }}" required autocomplete="off" />
                                <x-input-error class="mt-2" :messages="$errors->get('nama_guru')" />
                            </div>
                        </div>

                        <div class="sm:flex block gap-3">
                            <div class="max-w-xl">
                                <x-input-label for="jenis_kelamin" value="Jenis Kelamin" />
                                <x-select-input id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block"
                                    style="width: 194.4px;" placeholder="Pilih jenis kelamin..." required
                                    autocomplete="off">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="P"
                                        {{ old('jenis_kelamin', $mentor->jenis_kelamin) === 'P' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                    <option value="L"
                                        {{ old('jenis_kelamin', $mentor->jenis_kelamin) === 'L' ? 'selected' : '' }}>
                                        Laki-Laki
                                    </option>
                                </x-select-input>
                            </div>

                            <div class="max-w-xl">
                                <x-input-label for="no_telp" value="Nomor Telepon" />
                                <x-text-input id="no_telp" type="text" name="no_telp"
                                    class="mt-1 block sm:w-64 w-full" placeholder="Masukan no telp"
                                    value="{{ old('no_telp', $mentor->no_telp) }}" required autocomplete="off" />
                                <x-input-error class="mt-2" :messages="$errors->get('no_telp')" />
                            </div>
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
