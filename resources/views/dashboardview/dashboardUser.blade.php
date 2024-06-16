<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard User</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-poppins">
    @include('component.navbar')

    <div class="Dashboard-section bg-cover bg-center py-20">
        <img src="{{ asset('images/DashboardIcon.png') }}" alt="Logo" class="w-32 h-auto mx-auto" />
        <div class="text text-center mt-8">
            <h1 class="text-4xl font-bold">Dashboard</h1>
            <p class="text-lg">Pilih layanan yang dibutuhkan</p>
            <h3 class="text-xl font-normal">Halo <b>{{ Auth::user()->name }}</b>!</h3>
        </div>
    </div>

    <div class="content bg-white py-20 text-center">
        <div class="button-section flex justify-center gap-10">
            <div class="button-container">
                <a href="#" class="button bg-gray-300 hover:bg-gray-400 text-black px-8 py-4 rounded-lg font-bold transition duration-300">
                    Ajukan Surat
                </a>
                <p class="description text-sm text-gray-600 mt-2">Ajukan surat yang perlu ditandatangani oleh admin</p>
            </div>
            <div class="button-container">
                <a href="#" class="button bg-gray-300 hover:bg-gray-400 text-black px-8 py-4 rounded-lg font-bold transition duration-300">
                    Surat Saya
                </a>
                <p class="description text-sm text-gray-600 mt-2">Lihat daftar surat yang telah anda ajukan</p>
            </div>
        </div>
    </div>

    @include('component.footer')
</body>

</html>
