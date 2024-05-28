<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Presensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @hasrole('siswa')
                    <button class="btn btn-success m-4" onclick="getLocation()">
                        Get Lokasi
                    </button>
                @endhasrole

                <p class="m-4" id="demo"></p>

            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const x = document.getElementById("demo");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(showPosition);
        } else {
            x.innerHTML = "Browser tidak support untuk Geolokasi!";
        }
    }

    function showPosition(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;

        const locationButton = document.createElement("button");
        locationButton.textContent = "Lihat Lokasi";
        locationButton.style.color = "black";
        locationButton.style.backgroundColor = "transparent";
        locationButton.style.padding = "10px 20px";
        locationButton.style.border = "2px solid #4CAF50";
        locationButton.style.borderRadius = "5px";
        locationButton.style.cursor = "pointer";
        locationButton.style.transition = "background-color 0.25s";

        locationButton.addEventListener("mouseover", function() {
            locationButton.style.backgroundColor = "#7CB342";
        });

        locationButton.addEventListener("mouseout", function() {
            locationButton.style.backgroundColor = "transparent";
        });

        locationButton.onclick = function() {
            window.open(`https://maps.google.com/maps?q=${latitude},${longitude}`, "_blank");
        };

        x.innerHTML = "";
        x.appendChild(locationButton);
    }
</script>
