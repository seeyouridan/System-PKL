<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">Kirim Laporan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('laporan.store') }}" enctype="multipart/form-data"
                    class="mt-6 space-y-6">
                    @csrf

                    <div class="max-w-xl">
                        <x-input-label for="laporan" value="Laporan" />
                        <input type="file" id="laporan" name="laporan" require>
                        <br>
                        <small class="text-red-600">*Harap mengunggah dengan format .pdf</small>
                        <x-input-error class="mt-2" :messages="$errors->get('laporan')" />
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
