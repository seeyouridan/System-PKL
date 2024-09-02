@foreach ($reports as $data)
    <div class="modal fade" id="modalNilai_{{ $data->id_laporan }}" tabindex="-1"
        aria-labelledby="modalNilai_{{ $data->id_laporan }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalNilai_{{ $data->id_laporan }}">Submit Nilai</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('laporan.updateNilai', $data->id_laporan) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="max-w-xl">
                            <x-input-label for="nilai" value="Input Nilai" />
                            <input type="number" id="nilai" name="nilai" value="{{ $data->nilai ?? '' }}"
                                class="form-control h-7 w-32 rounded" require>
                            <x-input-error class="mt-2" :messages="$errors->get('laporan')" />
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
