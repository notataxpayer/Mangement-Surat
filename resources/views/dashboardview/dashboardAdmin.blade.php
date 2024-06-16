<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans" style="background-image: url('https://res.cloudinary.com/dnyrrcacd/image/upload/v1718548430/Laravel/Frame_3_b3cxje.png')">
     @include('component.navbar')

    <div class="Dashboard-section bg-cust-blue bg-opacity-70 px-4 py-12 rounded-md shadow-md flex pl-64">
        <img src="https://res.cloudinary.com/dnyrrcacd/image/upload/v1718558142/Laravel/image_3_khrstu.png" alt="Logo" class="w-24 h-24" />
        <div class="text ml-8">
            <h1 class="text-5xl font-bold text-black">Dashboard</h1>
            <p class="text-black">Pilih layanan yang dibutuhkan</p>
            <h3 class="text-black text-2xl">Halo, <b>Admin!</b></h3>
        </div>
    </div>

    <div class="content py-16 px-4">
        <div class="flex flex-col md:flex-row items-center justify-center space-y-8 md:space-y-0 md:space-x-8">
            <div class="button-container text-center ">
                <div class="pt-7">
                    <a href="#" class=" bg-cust-cream hover:bg-white font-semi text-black px-16  text-2xl font-bold py-3 hover:shadow-lg rounded-md shadow-md transition duration-300">
                    Lihat Surat
                    </a>
                </div>
                <p class=" text-gray-700 mt-8 text-xl opacity-50 font-semibold">
                    Lihat daftar surat yang telah </br> diajukan oleh pengguna
                </p>
            </div>
            <div class="ml-24 button-container text-center">
                <a href="#" class="button bg-cust-cream hover:bg-white text-black px-16  text-2xl font-bold py-3 hover:shadow-lg rounded-md shadow-md transition duration-300">
                    Lihat Arsip
                </a>
                <p class="ml-8 text-gray-700 mt-8 text-xl opacity-50 font-semibold">
                    Lihat surat yang telah diarsipkan
                </p>
            </div>
        </div>
    </div>

    @include('component.footer')
</body>

</html>
