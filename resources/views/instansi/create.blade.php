<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('instansi.store') }}" enctype="multipart/form-data"
                    class="mt-6 space-y-6">
                    @csrf

                    <div class="max-w-xl">
                        <x-input-label for="kode_instansi" value="Kode Instansi" />
                        <x-text-input id="kode_instansi" type="text" name="kode_instansi" class="mt-1 block w-full"
                            required />
                        <x-input-error class="mt-2" :messages="$errors->get('kode_instansi')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="nama_instansi" value="Nama Instansi" />
                        <x-text-input id="nama_instansi" type="text" name="nama_instansi"
                            class="mt-1 block w-full" />
                        <x-input-error class="mt-2" :messages="$errors->get('nama_instansi')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="kuota" value="Kuota Siswa/i" />
                        <x-text-input id="kuota" type="text" name="kuota" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('kuota')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="alamat" value="Alamat Instansi" />
                        <x-text-input id="alamat" type="text" name="alamat" class="mt-1 block w-full" />
                        <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="id_kota" value="Kota" />
                        <x-select-input id="id_kota" name="id_kota" class="mt-1 block w-full" required>
                            <option value="">Pilih Kota</option>
                            <option value="1" {{ old('kota') === 'Cianjur' ? 'selected' : '' }}>Cianjur</option>
                            <option value="2" {{ old('kota') === 'Bandung' ? 'selected' : '' }}>Bandung</option>
                            <option value="3" {{ old('kota') === 'Sukabumi' ? 'selected' : '' }}>Sukabumi</option>
                            <option value="4" {{ old('kota') === 'Bogor' ? 'selected' : '' }}>Bogor</option>
                            <option value="5" {{ old('kota') === 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                        </x-select-input>
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="no_telp" value="Nomor Telepon" />
                        <x-text-input id="no_telp" type="text" name="no_telp" class="mt-1 block w-full" />
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
