<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SI PKL</title>

    {{-- icon --}}
    <link rel="icon" type="png" href="{{ asset('img/logo-sekolah.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="flex flex-col sm:flex-row items-center">
            <div class="flex flex-col items-center mr-10">
                <img src="{{ asset('img/logo-jurusan.png') }}" alt="Logo Jurusan"
                    class="mb-4 hidden sm:block w-auto sm:h-52">
                <img src="{{ asset('img/logo-sekolah.png') }}" alt="Logo Sekolah"
                    class="hidden sm:block w-auto rounded-full sm:h-52">
            </div>

            <div class="w-96 sm:max-w-md px-12 py-12 bg-white shadow-md overflow-hidden sm:rounded-2xl"
                style="min-height: 430px;">
                <div class="flex">
                    <img src="{{ asset('img/logo-jurusan.png') }}" alt="Logo Jurusan"
                        class="mb-4 h-14 w-1h-14 sm:hidden">
                    <div class="text-center px-1">
                        <h1 class="text-sm sm:text-xl font-bold pb-10">SISTEM INFORMASI PRAKTEK KERJA LAPANGAN</h1>
                    </div>
                    <img src="{{ asset('img/logo-sekolah.png') }}" alt="Logo Sekolah"
                        class="h-14 w-1h-14 rounded-full sm:hidden">
                </div>
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
