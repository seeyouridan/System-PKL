@foreach ($mentors as $data)
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahModalLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('guru.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf

                        <div class="max-w-xl">
                            <x-input-label for="username" value="Buat Username" />
                            <x-text-input id="username" type="text" name="username" class="mt-1 block w-full" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('username')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="nip_guru" value="NIP / NUPTK" />
                            <x-text-input id="nip_guru" type="text" name="nip_guru" class="mt-1 block w-full"/>
                            <x-input-error class="mt-2" :messages="$errors->get('nip_guru')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="nama_guru" value="Nama Guru" />
                            <x-text-input id="nama_guru" type="text" name="nama_guru" class="mt-1 block w-full" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_guru')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="jenis_kelamin" value="Jenis Kelamin" />
                            <x-select-input id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan</option>
                                <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki-Laki</option>
                            </x-select-input>
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="no_telp" value="Nomor Telepon" />
                            <x-text-input id="no_telp" type="text" name="no_telp" class="mt-1 block w-full"/>
                            <x-input-error class="mt-2" :messages="$errors->get('no_telp')" />
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
