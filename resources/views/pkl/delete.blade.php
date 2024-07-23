@foreach ($pkls as $data)
    <div class="modal fade" id="hapusModal_{{ $data->id_pkl }}" tabindex="-1"
        aria-labelledby="hapusModalLabel_{{ $data->id_pkl }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="hapusModalLabel_{{ $data->id_pkl }}">Hapus Data PKL Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="post" action="{{ route('pkl.destroy', $data->id_pkl) }}"
                        enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('delete')

                        <p>Anda yakin ingin menghapus data pkl {{ $data->student->nama }} ?</p>

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
