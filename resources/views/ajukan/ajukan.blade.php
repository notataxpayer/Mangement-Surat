<?php
use Illuminate\Support\Facades\Auth;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ajukan Surat</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
@include('component.navbar')
<div class="min-h-screen flex py-2 font-poppins" style="background-image: url('https://res.cloudinary.com/dnyrrcacd/image/upload/v1718548430/Laravel/Frame_3_b3cxje.png')">
    <div class="form-container bg-white bg-opacity-80 p-6 rounded-lg shadow-lg max-w-md w-full mx-auto">
        <form method="POST" action="{{ route('request.store') }}" class="space-y-6" id="suratForm">
            @csrf
            <div class="mb-4">
                <label for="namaPengaju" class="block text-sm font-medium text-gray-700">Nama Pengaju</label>
                <input id="namaPengaju" type="text" placeholder="Nama Lengkap Pengaju" name="namaPengaju" class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            </div>
            <div class="mb-4">
                <label for="noSurat" class="block text-sm font-medium text-gray-700">Nomor Surat</label>
                <input id="noSurat" type="text" placeholder="Nomor Surat" name="noSurat" class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            </div>
            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori Surat</label>
                <select id="kategori" name="kategori" class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="" disabled selected hidden>Pilih</option>
                    <!-- Opsi kategori akan ditambahkan secara dinamis di sini -->
                </select>
            </div>
            <div class="mb-4">
                <label for="perihal" class="block text-sm font-medium text-gray-700">Perihal</label>
                <input id="perihal" type="text" placeholder="Perihal Surat" name="perihal" class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            </div>
            <div class="mb-4">
                <label for="penerima" class="block text-sm font-medium text-gray-700">Penerima Surat</label>
                <input id="penerima" type="text" placeholder="Surat Ditujukan Kepada" name="penerima" class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            </div>
            <p class="text-sm text-gray-700 mb-4">Mohon cek kembali surat yang diajukan apakah sudah sesuai dan sudah benar!</p>
            <div class="flex justify-end">
                <button type="submit" class="inline-flex justify-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Ajukan →
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Fetch kategori data
    fetch('/getAllCategory')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const kategoriSelect = document.getElementById('kategori');
            if (Array.isArray(data)) {
                data.forEach(kategori => {
                    const option = document.createElement('option');
                    option.value = kategori.value;
                    option.textContent = kategori.label;
                    kategoriSelect.appendChild(option);
                });
            } else if (typeof data === 'object') {
                Object.keys(data).forEach(key => {
                    const option = document.createElement('option');
                    option.value = key;
                    option.textContent = data[key];
                    kategoriSelect.appendChild(option);
                });
            } else {
                console.error('Data returned is not in the expected format:', data);
            }
        })
        .catch(error => console.error('Error:', error));

    // Handle form submission
    const form = document.getElementById('suratForm');
    const idUser = <?php echo json_encode(Auth::id()); ?>; // Mendapatkan idUser dari sisi server

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Mencegah pengiriman form secara default

        const namaPengaju = document.getElementById('namaPengaju').value;
        const noSurat = document.getElementById('noSurat').value;
        const kategori = document.getElementById('kategori').value;
        const perihal = document.getElementById('perihal').value;
        const penerima = document.getElementById('penerima').value;
        const timestamp = new Date().toISOString(); // Membuat timestamp

        // Data yang akan dikirim ke server
        const formData = {
            pengirim: namaPengaju,
            nomorsurat: noSurat,
            idKategori: kategori,
            perihal: perihal,
            penerima: penerima,
            idUser: idUser,
            timestamp: timestamp,
            _token: '{{ csrf_token() }}'
        };

        // Kirim permintaan POST menggunakan fetch API
        fetch('{{ route("request.store") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(formData)
        })
        .then(response => {
            if (!response.ok) {
                // Jika respons tidak OK, tampilkan pesan error
                return console.log(formData.idUser)
            }
            return response.json();
        })
        .then(data => {
            console.log('Response from server:', data);
            alert('Surat berhasil diajukan.'); // Redirect ke halaman lain setelah submit
            window.location.reload()
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengajukan surat.');
        });
    });
});
</script>


@include('component.footer')
</body>
</html>
