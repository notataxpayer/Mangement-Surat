<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ajukan Surat</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    <style>
        /* Anda bisa menghapus inline CSS yang tidak diperlukan karena Tailwind akan menangani stylingnya */
    </style>
    <!-- Tambahkan link ke file app.css yang telah di-compile dengan Tailwind -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body >
@include('component.navbar')
<div class=" min-h-screen flex py-2  font-poppins" style="background-image: url('https://res.cloudinary.com/dnyrrcacd/image/upload/v1718548430/Laravel/Frame_3_b3cxje.png')"><div class="form-container bg-white bg-opacity-80 p-6 rounded-lg shadow-lg max-w-md w-full mx-auto">
        <form method="POST" action="{{ route('request.store') }}" class="space-y-6">
            @csrf
            <div class="mb-4">
                <label for="namaPengaju" class="block text-sm font-medium text-gray-700">Nama Pengaju</label>
                <input id="namaPengaju" type="text" placeholder="Nama Lengkap Pengaju" name="namaPengaju"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            </div>
            <div class="mb-4">
                <label for="noSurat" class="block text-sm font-medium text-gray-700">Nomor Surat</label>
                <input id="noSurat" type="text" placeholder="Nomor Surat" name="noSurat"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            </div>
            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori Surat</label>
                <select id="kategori" name="kategori"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="" disabled selected hidden>Pilih</option>
                    <option value="undangan">Surat Undangan</option>
                    <option value="proposal">Surat Proposal</option>
                    <option value="keterangan">Surat Keterangan</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="perihal" class="block text-sm font-medium text-gray-700">Perihal</label>
                <input id="perihal" type="text" placeholder="Perihal Surat" name="perihal"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            </div>
            <div class="mb-4">
                <label for="penerima" class="block text-sm font-medium text-gray-700">Penerima Surat</label>
                <input id="penerima" type="text" placeholder="Surat Ditujukan Kepada" name="penerima"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            </div>
            <p class="text-sm text-gray-700 mb-4">Mohon cek kembali surat yang diajukan apakah sudah sesuai dan sudah benar!</p>
            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex justify-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Ajukan →
                </button>
            </div>
        </form>
    </div></div>
    

    <!-- Masukkan footer Anda di sini -->
@include('component.footer')
</body>

</html>
