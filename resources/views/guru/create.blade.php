@foreach ($mentors as $data)
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahModalLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('guru.store') }}" enctype="multipart/form-data"
                        class="mt-6 space-y-6">
                        @csrf

                        <div class="input-group max-w-96">
                            <label for="username" class="form-label text-sm w-full">Buat Username</label>
                            <input id="username" type="text" name="username"
                                style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"
                                class="w-56 form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm block"
                                placeholder="Masukan username..." aria-describedby="basic-addon2" required
                                autocomplete="off">
                            <span class="input-group-text" id="basic-addon2">@gmail.com</span>
                            <x-input-error class="mt-2" :messages="$errors->get('username')" />
                        </div>

                        <div class="sm:flex block gap-3">
                            <div class="max-w-xl">
                                <x-input-label for="nip_guru" value="NIP / NUPTK" />
                                <x-text-input id="nip_guru" type="text" name="nip_guru" class="mt-1 block w-full"
                                    placeholder="Masukan nomor..." autocomplete="off" />
                                <x-input-error class="mt-2" :messages="$errors->get('nip_guru')" />
                            </div>

                            <div class="max-w-xl">
                                <x-input-label for="nama_guru" value="Nama Guru" />
                                <x-text-input id="nama_guru" type="text" name="nama_guru"
                                    class="mt-1 block sm:w-64 w-full" placeholder="Masukan nama guru..." required
                                    autocomplete="off" />
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
                                    <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                    <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>
                                        Laki-Laki
                                    </option>
                                </x-select-input>
                            </div>

                            <div class="max-w-xl">
                                <x-input-label for="no_telp" value="Nomor Telepon" />
                                <x-text-input id="no_telp" type="text" name="no_telp"
                                    class="mt-1 block sm:w-64 w-full" placeholder="Masukan no telp" required
                                    autocomplete="off" />
                                <x-input-error class="mt-2" :messages="$errors->get('no_telp')" />
                            </div>
                        </div>

                        <div class="modal-footer">
                            <x-secondary-button tag="a" data-bs-dismiss="modal">Close</x-secondary-button>
                            <x-primary-button name="save" value="true">Simpan</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
