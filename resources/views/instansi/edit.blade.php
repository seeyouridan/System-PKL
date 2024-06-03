@foreach ($instances as $instansi)
    <div class="modal fade" id="exampleModal_{{ $instansi->id_instansi }}" tabindex="-1"
        aria-labelledby="exampleModalLabel_{{ $instansi->id_instansi }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel_{{ $instansi->id_instansi }}">Edit Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('instansi.update', $instansi->id_instansi) }}"
                        enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')

                        <div class="max-w-xl">
                            <x-input-label for="kode_instansi" value="Kode Instansi" />
                            <x-text-input id="kode_instansi" type="text" name="kode_instansi"
                                class="mt-1 block w-full" value="{{ old('kode_instansi', $instansi->kode_instansi) }}"
                                required autocomplete />
                            <x-input-error class="mt-2" :messages="$errors->get('kode_instansi')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="nama_instansi" value="Nama Instansi" />
                            <x-text-input id="nama_instansi" type="text" name="nama_instansi"
                                class="mt-1 block w-full" value="{{ old('nama_instansi', $instansi->nama_instansi) }}"
                                required autocomplete />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_instansi')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="kuota" value="Kuota Siswa/i" />
                            <x-text-input id="kuota" type="text" name="kuota" class="mt-1 block w-full"
                                required value="{{ old('kuota', $instansi->kuota) }}" autocomplete />
                            <x-input-error class="mt-2" :messages="$errors->get('kuota')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="alamat" value="Alamat Instansi" />
                            <x-text-input id="alamat" type="text" name="alamat" class="mt-1 block w-full"
                                required autocomplete value="{{ old('alamat', $instansi->alamat) }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="id_kota" value="Kota" />
                            <x-select-input id="id_kota" name="id_kota" class="mt-1 block w-full" required
                                autocomplete>
                                <option value="">Pilih Kota</option>
                                <option value="1"
                                    {{ old('kota', $instansi->kota) === 'Cianjur' ? 'selected' : '' }}>Cianjur
                                </option>
                                <option value="2"
                                    {{ old('kota', $instansi->kota) === 'Bandung' ? 'selected' : '' }}>Bandung
                                </option>
                                <option value="3"
                                    {{ old('kota', $instansi->kota) === 'Sukabumi' ? 'selected' : '' }}>Sukabumi
                                </option>
                                <option value="4"
                                    {{ old('kota', $instansi->kota) === 'Bogor' ? 'selected' : '' }}>Bogor</option>
                                <option value="5"
                                    {{ old('kota', $instansi->kota) === 'Jakarta' ? 'selected' : '' }}>Jakarta
                                </option>
                            </x-select-input>
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="no_telp" value="Nomor Telepon" />
                            <x-text-input id="no_telp" type="text" name="no_telp" class="mt-1 block w-full"
                                value="{{ old('no_telp', $instansi->no_telp) }}" autocomplete />
                            <x-input-error class="mt-2" :messages="$errors->get('no_telp')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="id_guru" value="Guru Pembimbing" />
                            <x-select-input id="id_guru" name="id_guru" class="mt-1 block w-full" required
                                autocomplete>
                                <option value="">Pilih Guru</option>
                                <option value="2"
                                    {{ old('id_guru', $instansi->mentor->nama_guru) === 'Dessi Andriani, S. T.' ? 'selected' : '' }}>Dessi Andriani, S. T.</option>
                                <option value="3"
                                    {{ old('id_guru', $instansi->mentor->nama_guru) === 'Kani Muthmainnah, S. T., M. Ars.' ? 'selected' : '' }}>Kani
                                    Muthmainnah, S. T., M. Ars.</option>
                                <option value="4"
                                    {{ old('id_guru', $instansi->mentor->nama_guru) === 'Ikmal Bahrul Alam, S. Pd.' ? 'selected' : '' }}>Ikmal Bahrul
                                    Alam, S. Pd.</option>
                                <option value="5"
                                    {{ old('id_guru', $instansi->mentor->nama_guru) === 'R. Luki Muharam, S. ST.' ? 'selected' : '' }}>R. Luki
                                    Muharam, S. ST.</option>
                                <option value="6"
                                    {{ old('id_guru', $instansi->mentor->nama_guru) === 'Sri Mulyani, S. Pd.' ? 'selected' : '' }}>Sri Mulyani, S.
                                    Pd.</option>
                                <option value="7"
                                    {{ old('id_guru', $instansi->mentor->nama_guru) === 'Tatang Sudrajat, S. Pd.' ? 'selected' : '' }}>Tatang
                                    Sudrajat, S. Pd.</option>
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
@endforeach
