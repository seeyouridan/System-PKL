<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('siswa.store') }}" enctype="multipart/form-data"
                    class="mt-6 space-y-6">
                    @csrf

                    <div class="max-w-xl">
                        <x-input-label for="nis" value="NIS" />
                        <x-text-input id="nis" type="text" name="nis" class="mt-1 block w-full" required
                            autocomplete  />
                        <x-input-error class="mt-2" :messages="$errors->get('nis')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="nama" value="Nama Siswa" />
                        <x-text-input id="nama" type="text" name="nama" class="mt-1 block w-full" required
                            autocomplete />
                        <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="jenis_kelamin" value="Jenis Kelamin" />
                        <x-select-input id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full" required
                            autocomplete>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan
                            </option>
                            <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki-Laki
                            </option>
                        </x-select-input>
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="id_jurusan" value="Jurusan" />
                        <x-select-input id="id_jurusan" name="id_jurusan" class="mt-1 block w-full" required
                            autocomplete>
                            <option value="">Pilih Jurusan</option>
                            <option value="1" {{ old('jurusan') === 'DPIB 1' ? 'selected' : '' }}>DPIB 1
                            </option>
                            <option value="2" {{ old('jurusan') === 'DPIB 2' ? 'selected' : '' }}>DPIB 2
                            </option>
                        </x-select-input>
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