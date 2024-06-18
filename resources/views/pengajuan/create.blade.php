<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">Pengajuan PKL</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('pengajuan.store') }}" enctype="multipart/form-data"
                    class="mt-6 space-y-6">
                    @csrf

                    <div class="max-w-xl">
                        <x-input-label for="id_kota" value="Kota" />
                        <x-select-input id="id_kota" name="id_kota" class="mt-1 block w-full" required>
                            <option value="" selected>Pilih Kota</option>
                            @foreach (\App\Models\Kota::all() as $kota)
                                <option value="{{ $kota->id_kota }}">{{ $kota->kota }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-error class="mt-2" :messages="$errors->get('id_kota')" />
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
