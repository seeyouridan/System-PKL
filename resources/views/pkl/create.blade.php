{{-- <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">Input Siswa PKL</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('pkl.store') }}" enctype="multipart/form-data"
                    class="mt-6 space-y-6">
                    @csrf

                    <div class="max-w-xl">
                        <x-input-label for="id_siswa" value="Siswa" />
                        <x-select-input id="id_siswa" name="id_siswa" class="mt-1 block w-full text-black" required>
                            <option value="" selected>Pilih Siswa</option>
                            @foreach (App\Models\Submission::where('status', 1)->get() as $submission)
                                <option value="{{ $submission->student->id_siswa }}">{{ $submission->student->nama }}
                                </option>
                            @endforeach
                        </x-select-input>
                        <x-input-error class="mt-2" :messages="$errors->get('id_siswa')" />
                    </div>
                    
                    <div class="max-w-xl">
                        <x-input-label for="id_instansi" value="Instansi" />
                        <x-select-input id="id_instansi" name="id_instansi" class="mt-1 block w-full text-black" required>
                            <option value="" selected>Pilih Instansi</option>
                            @foreach (App\Models\Submission::where('status', 1)->get() as $submission)
                                <option value="{{ $submission->city->id_kota }}">{{ $submission->city->kota }}
                                </option>
                            @endforeach
                        </x-select-input>
                        <x-input-error class="mt-2" :messages="$errors->get('id_instansi')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="id_instansi" value="Instansi" />
                        <x-select-input id="id_instansi" name="id_instansi" class="mt-1 block w-full text-black" required>
                            <option value="" selected>Pilih Instansi</option>
                            @foreach (App\Models\Submission::where('status', 1)->get() as $submission)
                                @php
                                    // Ambil instansi yang memiliki kota yang sesuai dengan id_kota dari Submission
                                    $instances = \App\Models\Instance::where('id_kota', $submission->id_kota)->get();
                                @endphp
                                @foreach ($instances as $instance)
                                    <option value="{{ $instance->id_instansi }}">{{ $instance->nama_instansi }}</option>
                                @endforeach
                            @endforeach
                        </x-select-input>
                        <x-input-error class="mt-2" :messages="$errors->get('id_instansi')" />
                    </div>

                    <div class="modal-footer">
                        <x-secondary-button tag="a" data-bs-dismiss="modal">Close</x-secondary-button>
                        <x-primary-button name="save" value="true">Simpan</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">Input Siswa PKL</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('pkl.store') }}" enctype="multipart/form-data"
                      class="mt-6 space-y-6">
                    @csrf

                    <div class="max-w-xl">
                        <x-input-label for="id_siswa" value="Siswa" />
                        <x-select-input id="id_siswa" name="id_siswa" class="mt-1 block w-full text-black" required>
                            <option value="" selected>Pilih Siswa</option>
                            @foreach (App\Models\Submission::where('status', 1)->get() as $submission)
                                <option value="{{ $submission->student->id_siswa }}">{{ $submission->student->nama }}
                                </option>
                            @endforeach
                        </x-select-input>
                        <x-input-error class="mt-2" :messages="$errors->get('id_siswa')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="id_instansi" value="Instansi" />
                        <x-select-input id="id_instansi" name="id_instansi" class="mt-1 block w-full text-black" required>
                            <option value="" selected>Pilih Instansi</option>
                            {{-- Options akan di-generate secara dinamis menggunakan JavaScript --}}
                        </x-select-input>
                        <x-input-error class="mt-2" :messages="$errors->get('id_instansi')" />
                    </div>

                    <div class="modal-footer">
                        <x-secondary-button tag="a" data-bs-dismiss="modal">Close</x-secondary-button>
                        <x-primary-button name="save" value="true" id="btn-simpan">Simpan</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil elemen-elemen yang diperlukan dari DOM
        const selectSiswa = document.getElementById('id_siswa');
        const selectInstansi = document.getElementById('id_instansi');
        const btnSimpan = document.getElementById('btn-simpan');

        // Event listener untuk perubahan pada pilihan siswa
        selectSiswa.addEventListener('change', function() {
            const selectedSiswaId = this.value;

            // Hapus opsi yang ada di select instansi sebelumnya
            selectInstansi.innerHTML = '<option value="" selected>Pilih Instansi</option>';

            // Jika pilihan siswa tidak kosong, lakukan fetch untuk mengambil instansi berdasarkan siswa
            if (selectedSiswaId !== '') {
                fetch(`/api/instansi/${selectedSiswaId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(instansi => {
                            const option = document.createElement('option');
                            option.value = instansi.id_instansi;
                            option.textContent = instansi.nama_instansi;
                            selectInstansi.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        });

        // Event listener untuk tombol Simpan
        btnSimpan.addEventListener('click', function() {
            // Lakukan validasi sebelum submit form
            if (selectSiswa.value === '') {
                alert('Harap pilih siswa terlebih dahulu');
                return false;
            }
            if (selectInstansi.value === '') {
                alert('Harap pilih instansi terlebih dahulu');
                return false;
            }

            // Submit form
            document.querySelector('form').submit();
        });
    });
</script>
