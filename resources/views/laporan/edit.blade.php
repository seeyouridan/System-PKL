@foreach ($reports as $data)
    <div class="modal fade" id="editModal_{{ $data->id_laporan }}" tabindex="-1"
        aria-labelledby="editModalLabel_{{ $data->id_laporan }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel_{{ $data->id_laporan }}">Kirim Laporan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('laporan.update', $data->id_laporan) }}"
                        enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')

                        <div class="max-w-xl">
                            <x-input-label for="laporan" value="Laporan" />
                            @if ($data->laporan)
                                <p><a href="{{ Storage::url($data->laporan) }}" target="_blank"><i
                                            class="fa-solid fa-file p-2"></i>{{ $data->nama_file }}</a></p>
                            @else
                                <input type="file" id="laporan" name="laporan"
                                    value="old('laporan', $data->laporan)" require>
                            @endif
                            <x-input-error class="mt-2" :messages="$errors->get('laporan')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="laporan_revisi" value="Laporan Fix" />
                            @if ($data->laporan_revisi)
                                <p><a href="{{ Storage::url($data->laporan_revisi) }}" target="_blank"><i
                                            class="fa-solid fa-file p-2"></i>{{ $data->nama_file_revisi }}</a></p>
                            @else
                                <input type="file" id="laporan_revisi" name="laporan_revisi"
                                    value="old('laporan_revisi', $data->laporan_revisi)" require>
                            @endif
                            <x-input-error class="mt-2" :messages="$errors->get('laporan_revisi')" />
                        </div>

                        <div class="modal-footer">
                            <x-secondary-button tag="a" data-bs-dismiss="modal">Close</x-secondary-button>
                            <x-primary-button name="save" value="true" id="sipmanButton">Simpan</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('sipmanButton').addEventListener('click', function(event) {
        var fileInput = document.getElementById('laporan');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.pdf)$/i;

        if (!filePath) {
            event.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Tidak ada file',
                text: 'Mohon unggah file terlebih dahulu',
            });
        } else if (!allowedExtensions.exec(filePath)) {
            event.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Format tidak sesuai',
                text: 'Mohon mengunggah file dalam format .pdf',
            });
            fileInput.value = '';
        } else {
            document.getElementById('laporanForm').submit();
        }
    });
</script>
