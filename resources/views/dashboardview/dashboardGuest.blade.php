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

    <div class=" bg-cust-blue bg-opacity-70 flex-row flex items-center justify-center py-12">
        <img src="https://res.cloudinary.com/dnyrrcacd/image/upload/v1718557286/Laravel/Group_22_poxhqw.png" alt="Logo" class="w-32 h-auto" />
        <div class="text  pl-4">
            <h1 class="text-6xl font-bold">S.M.S</h1>
            <h2 class="text-xl font-normal">SISTEM MANAGEMENT SURAT</h2>
        </div>
    </div>

    <div class="content background-frame bg-cover bg-center pb-20 pt-10 text-center">
        <p class="text-2xl mb-4">LAYANAN SEKOLAH UNTUK MEMPERMUDAH TRACKING DAN PENGAJUAN SURAT</p>
        <div class="pt-8"><a href="#" class="button bg-cust-cream shadow-md hover:shadow-lg px-12 hover:bg-white  text-black text-2xl py-4 rounded-lg font-bold transition duration-300">
            Ajukan Surat Sekarang!
        </a></div>
        
        <p id="buram" class="text-xl opacity-50 mt-12">Ajukan surat yang perlu  </br> diperiksa oleh admin</p>
    </div>

    @include('component.footer')
</body>

</html>
