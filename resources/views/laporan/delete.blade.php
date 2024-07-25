@foreach ($reports as $data)
    <div class="modal fade" id="hapusModal_{{ $data->id_laporan }}" tabindex="-1"
        aria-labelledby="hapusModalLabel_{{ $data->id_laporan }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="hapusModalLabel_{{ $data->id_laporan }}">Hapus Laporan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="post" action="{{ route('laporan.destroy', $data->id_laporan) }}"
                        enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('delete')

                        <p>Anda yakin ingin menghapus data laporan {{ $data->siswa->nama }} ?</p>

                        <div class="modal-footer">
                            <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
                            <x-primary-button value="true">Hapus!</x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endforeach
