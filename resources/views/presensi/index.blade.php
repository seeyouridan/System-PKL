<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Presensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (Auth::user()->hasRole('guru'))
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            @elseif (Auth::user()->hasRole('siswa'))
                <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        @endif
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">

            @php
                $hari_indonesia = [
                    'Sunday' => 'Minggu',
                    'Monday' => 'Senin',
                    'Tuesday' => 'Selasa',
                    'Wednesday' => 'Rabu',
                    'Thursday' => 'Kamis',
                    'Friday' => 'Jumat',
                    'Saturday' => 'Sabtu',
                ];

                $bulan_indonesia = [
                    'January' => 'Januari',
                    'February' => 'Februari',
                    'March' => 'Maret',
                    'April' => 'April',
                    'May' => 'Mei',
                    'June' => 'Juni',
                    'July' => 'Juli',
                    'August' => 'Agustus',
                    'September' => 'September',
                    'October' => 'Oktober',
                    'November' => 'November',
                    'December' => 'Desember',
                ];

                $hari = date('l');
                $bulan = date('F');

                $hari_dalam_bahasa_indonesia = $hari_indonesia[$hari];
                $bulan_dalam_bahasa_indonesia = $bulan_indonesia[$bulan];
            @endphp

            @hasrole('siswa')
                <div class="card-header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Presensi Siswa PKL') }}
                    </h2>
                </div>

                <br>

                @if (Auth::check())
                    @php
                        $userId = Auth::id();
                        $student = \App\Models\Student::where('id_user', $userId)->first();
                        $studentPresence = \App\Models\Presence::where('id_siswa', $student->id_siswa)->first();
                    @endphp

                    @if ($studentPresence != null)
                        <div class="alert alert-success" role="alert">
                            <div class="absensi-layer text-center">
                                <span class="icon-check">&#10003;</span>
                                <span>Anda sudah mengisi absen hari ini!</span>
                                <p>
                                    Status Kehadiran : <strong>{{ $studentPresence->status }}</strong>
                                </p>
                            </div>
                        </div>
                    @elseif ($studentPresence == null)
                        <div class="alert alert-danger" role="alert">
                            <p>
                                Pengisian absensi dilakukan di tempat atau lokasi PKL masing-masing. <br>
                                <i class="fa-solid fa-clock p-2"></i>08.00 - 08.30 = Hadir <br>
                                <i class="fa-solid fa-clock p-2"></i>08.31 - 12.00 = Telat <br>
                                <i class="fa-solid fa-clock p-2"></i>12.01 - selesai = Tidak Hadir <br>
                            </p>
                            <p>
                                Untuk melakukan presensi, klik tombol <button class="btn btn-outline-danger"
                                    id="find-me">Generate<i class="fa-solid fa-compass pl-2"></i></button>
                                untuk mendapatkan kode lokasi latitude dan longitude.
                            </p>

                            <p id="status"></p>
                        </div>

                        <form method="POST" action="{{ route('presensi.store') }}" enctype="multipart/form-data"
                            class="mt-6 space-y-6">
                            @csrf

                            <div>
                                <div class="text-right">
                                    <p>
                                        <i class="fa-solid fa-calendar pr-2"></i>
                                        @php
                                            echo $hari_dalam_bahasa_indonesia .
                                                ', ' .
                                                date('d') .
                                                ' ' .
                                                $bulan_dalam_bahasa_indonesia .
                                                ' ' .
                                                date('Y');
                                        @endphp
                                    </p>
                                </div>
                                <label for="keterangan">Keterangan</label>
                                <div class="flex gap-4 pl-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="keterangan" id="hadir"
                                            value="Hadir" required>
                                        <label class="form-check-label" for="hadir">
                                            Hadir
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="keterangan" id="sakit"
                                            value="Sakit">
                                        <label class="form-check-label" for="sakit">
                                            Sakit
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="keterangan" id="izin"
                                            value="Izin">
                                        <label class="form-check-label" for="izin">
                                            Izin
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row gap-3 max-w-xl">
                                <div class="col">
                                    <x-input-label for="kode_latitude" value="Kode Latitude" />
                                    <x-text-input id="kode_latitude" type="text" name="kode_latitude"
                                        class="mt-1 block w-full cursor-not-allowed" required autocomplete
                                        placeholder="kode Latitude..." readonly />
                                    <x-input-error class="mt-2" :messages="$errors->get('kode_latitude')" />
                                </div>
                                <div class="col">
                                    <x-input-label for="kode_longitude" value="Kode Longitude" />
                                    <x-text-input id="kode_longitude" type="text" name="kode_longitude"
                                        class="mt-1 block w-full cursor-not-allowed" required autocomplete
                                        placeholder="Kode Longitude..." readonly />
                                    <x-input-error class="mt-2" :messages="$errors->get('kode_longitude')" />
                                </div>
                            </div>
                            <div class="w-auto">
                                <x-input-label for="jurnal_kegiatan" value="Jurnal Kegiatan" />
                                <x-text-input id="jurnal_kegiatan" type="text" name="jurnal_kegiatan"
                                    class="mt-1 block w-full" required autocomplete="off"
                                    placeholder="Masukan Jurnal Kegiatan..." />
                                <x-input-error class="mt-2" :messages="$errors->get('jurnal_kegiatan')" />
                            </div>
                            <div class="w-auto flex justify-content-md-end">
                                <button class="btn btn-outline-dark w-28" name="save" value="true">Absen</button>
                            </div>
                        </form>
                    @endif
                @endif
            @endhasrole

            @hasrole('guru')
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                            type="button" role="tab" aria-controls="home-tab-pane"
                            aria-selected="true">Agustus</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane" type="button" role="tab"
                            aria-controls="profile-tab-pane" aria-selected="false">September</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                            data-bs-target="#contact-tab-pane" type="button" role="tab"
                            aria-controls="contact-tab-pane" aria-selected="false">Oktober</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tester-tab" data-bs-toggle="tab" data-bs-target="#tester-tab-pane"
                            type="button" role="tab" aria-controls="tester-tab-pane"
                            aria-selected="false">November</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active pt-3" id="home-tab-pane" role="tabpanel"
                        aria-labelledby="home-tab" tabindex="0">
                        <table>
                            <thead>
                                <tr>
                                    @php
                                        for ($i = 1; $i < 32; $i++) {
                                            echo "<th class='border-1 py-1 px-2 bg-red-600 text-white text-center'> $i </th>";
                                        }
                                    @endphp
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @php
                                        $cek = "<i class='fa-solid fa-check text-black'></i>";

                                        for ($i = 1; $i < 32; $i++) {
                                            echo "<td class='border-1 py-1 px-2 text-white'>$cek</td>";
                                        }
                                    @endphp

                                    {{-- 
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                    <td class="py-1 px-2 border-1"></td>
                                     --}}
                                </tr>
                            </tbody>
                        </table>

                        <br>

                        <table>
                            <tr class="bg-blue-600 text-white text-center">
                                <th class="border-1 py-1 px-2">H</th>
                                <th class="border-1 py-1 px-2">S</th>
                                <th class="border-1 py-1 px-2">I</th>
                                <th class="border-1 py-1 px-2">A</th>
                            </tr>
                            <tr>
                                <td class="py-1 px-2 border-1">31</td>
                                <td class="py-1 px-2 border-1">0</td>
                                <td class="py-1 px-2 border-1">0</td>
                                <td class="py-1 px-2 border-1">0</td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane fade p-2" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="0">Tab 2</div>
                    <div class="tab-pane fade p-2" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                        tabindex="0">Tab 3</div>
                    <div class="tab-pane fade p-2" id="tester-tab-pane" role="tabpanel" aria-labelledby="tester-tab"
                        tabindex="0">Tab 4</div>
                </div>
            @endhasrole

        </div>
    </div>
    </div>
</x-app-layout>

<script>
    function geoFindMe() {
        const status = document.querySelector("#status");

        function success(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            status.textContent = "";

            const latitudeInput = document.querySelector("#kode_latitude");
            const longitudeInput = document.querySelector("#kode_longitude");

            latitudeInput.value = latitude;
            longitudeInput.value = longitude;

            latitudeInput.readonly = true;
            longitudeInput.readonly = true;
        }

        function error() {
            status.textContent = "Unable to retrieve your location";
        }

        if (!navigator.geolocation) {
            status.textContent = "Geolocation is not supported by your browser";
        } else {
            status.textContent = "Mencari lokasi...";
            navigator.geolocation.getCurrentPosition(success, error);
        }
    }

    document.querySelector("#find-me").addEventListener("click", geoFindMe);
</script>
