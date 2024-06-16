<!DOCTYPE html>
<html>
<head>
    <title>Daftar Surat</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .text-opacity {
            opacity: 0.7; /* Atur opacity sesuai kebutuhan (0.0 - 1.0) */
        }
    </style>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-poppins "style="background-image: url('https://res.cloudinary.com/dnyrrcacd/image/upload/v1718548430/Laravel/Frame_3_b3cxje.png');>
    @include('component.navbar')
    <div class="container mx-auto ">
    <div class="flex flex-row bg-cust-blue bg-opacity-70">
        <h1 class="text-3xl font-semibold mb-4 pl-48  py-12 w-full">List Surat {{ strtoupper(Auth::user()->name) }}</h1>
        <h1 class="text-xl text-center font-semibold mr-24 mb-4 pl-48  py-10 text-opacity">Ubah status surat yang diajukan!</h1>
    </div class="">
        <div class="overflow-x-auto items-center justify-center flex py-8">
            <table class="table-auto w-9/12 justify-items-center flex-col border-collapse border border-gray-200 bg-white bg-opacity-80">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">
                            Tanggal
                            <button onclick="sortTableBy('tanggal')" class="inline-block ml-2 pt-2 rounded-full  hover:text-white focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-4 h-4"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"/></svg>
                            </button>
                        </th>
                        <th class="px-4 py-2">Nama Pengaju</th>
                        <th class="px-4 py-2">Detail</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Arsipkan</th>
                    </tr>
                </thead>
                <tbody class="overflow-y-auto">
    @foreach ($surats as $surat)
    @php
        $semuaArsipTrue = true;
    @endphp
        @if (!$surat->arsip)
            @php
                $semuaArsipTrue = false;
            @endphp
            <tr>
                <td class="border px-4 py-2 text-center">{{ $surat->created_at }}</td>
                <td class="border px-4 py-2 text-center">{{ $surat->pengirim }}</td>
                <td class="border px-4 py-2 flex items-center justify-center">
                    <button class="bg-cust-cream p-1 px-4 text-sm rounded-xl font-bold hover:text-white hover:shadow-md hover:duration-300 transition duration-300 ease-in-out"
                            onclick="openModal('{{ $surat->idSurat }}', '{{ $surat->nomorsurat }}', '{{ $surat->pengirim }}', '{{ $surat->penerima }}', '{{ $surat->perihal }}', '{{ $surat->idUser }}', '{{ $surat->idKategori }}', '{{ $surat->created_at }}')">
                        Detail
                    </button>
                </td>
                <td class="border px-2 py-2 text-center items-center">
                    @if ($surat->status)
                        <button class="bg-cust-green text-sm p-1 px-4 rounded-xl font-bold hover:text-black hover:bg-cust-greenlight hover:shadow-md text-white hover:duration-300 transition duration-300 ease-in-out"
                                onclick="confirmAction('{{ $surat->idSurat }}', 'FALSE')">
                            Accepted
                        </button>
                    @else
                        <button class="bg-cust-red text-sm p-1 px-4 rounded-xl font-bold hover:text-black hover:bg-cust-redlight hover:shadow-md hover:duration-300 transition duration-300 ease-in-out text-white"
                                onclick="confirmAction('{{ $surat->idSurat }}', 'TRUE')">
                            Rejected
                        </button>
                    @endif
                </td>
                <td class="border px-4 py-2 text-center">
                    <button class="bg-cust-yellow p-1 px-4 rounded-xl text-sm font-bold hover:text-white hover:shadow-md hover:duration-300 transition duration-300 ease-in-out" onclick="confirmActionArsip('{{ $surat->idSurat }}', 'TRUE')">
                        Arsipkan
                    </button>
                </td>
            </tr>
           @if ($semuaArsipTrue | count($surats) === 0)
            <tr>
                <td colspan="5" class="border px-4 py-2 text-center">DATA KOSONG</td>
            </tr>
            @endif
        @endif
    @endforeach
</tbody>

            </table>
        </div>
         <!-- <div class="flex justify-center mt-4">
            {{ $surats->links() }} 
        </div> -->
        <div class="flex justify-center mt-4">
    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
        <!-- Previous Page Link -->
        @if ($surats->onFirstPage())
            <span aria-disabled="true" aria-label="Previous">
                <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5">Previous</span>
            </span>
        @else
            <a href="{{ $surats->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                Previous
            </a>
        @endif

        <!-- Pagination Elements -->
        @foreach ($surats->getUrlRange($surats->currentPage(), $surats->currentPage() + 2) as $page => $url)
            @if ($page == $surats->currentPage())
                <span aria-current="page">
                    <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $page }}</span>
                </span>
            @else
                <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">{{ $page }}</a>
            @endif
        @endforeach

        <!-- Next Page Link -->
        @if ($surats->hasMorePages())
            <a href="{{ $surats->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                Next
            </a>
        @else
            <span aria-disabled="true" aria-label="Next">
                <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5">Next</span>
            </span>
        @endif
    </nav>
</div>

    </div>
     <!-- Modal -->
    <div id="myModal" class="modal hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-3/12">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg text-center pb-6 leading-6 font-bold text-gray-900" id="modal-title">
                                DETAIL SURAT
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-black flex font-bold flex-col w-full pb-2">ID Surat: <span class="w-[300px] mt-1 font-normal rounded-md py-1 pl-2 border-2 shadow-sm" id="modal-idSurat"></span></p>
                                <p class="text-sm text-black flex font-bold flex-col w-full pb-2">Nomor Surat: <span class="w-[300px] mt-1 font-normal rounded-md py-1 pl-2 border-2 shadow-sm" id="modal-nomorsurat"></span></p>
                                <p class="text-sm text-black flex font-bold flex-col w-full pb-2">Pengirim: <span class="w-[300px] mt-1 font-normal rounded-md py-1 pl-2 border-2 shadow-sm" id="modal-pengirim"></span></p>
                                <p class="text-sm text-black flex font-bold flex-col w-full pb-2">Penerima: <span class="w-[300px] mt-1 font-normal rounded-md py-1 pl-2 border-2 shadow-sm" id="modal-penerima"></span></p>
                                <p class="text-sm text-black flex font-bold flex-col w-full pb-2">Perihal: <span class="w-[300px] mt-1 font-normal rounded-md py-1 pl-2 border-2 shadow-sm" id="modal-perihal"></span></p>
                                <p class="text-sm text-black flex font-bold flex-col w-full pb-2">User: <span class="w-[300px] mt-1 font-normal rounded-md py-1 pl-2 border-2 shadow-sm" id="modal-idUser"></span></p>
                                <p class="text-sm text-black flex font-bold flex-col w-full pb-2">Kategori: <span class="w-[300px] mt-1 font-normal rounded-md py-1 pl-2 border-2 shadow-sm" id="modal-idKategori"></span></p>
                                <p class="text-sm text-black flex font-bold flex-col w-full pb-2">Created At: <span class="w-[300px] mt-1 font-normal rounded-md py-1 pl-2 border-2 shadow-sm" id="modal-created_at"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-cust-cream text-base font-medium text-white hover:bg-cust-cream-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cust-cream-dark sm:ml-3 sm:w-auto sm:text-sm" onclick="closeModal()">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="{{ mix('js/app.js') }}"></script> -->
    <script>

    let users = {};
    let kategori = {};

// Fetch semua data pengguna
fetch('/getAllUser')
    .then(response => response.json())
    .then(data => {
        // Simpan data pengguna dalam variabel
        users = data;
        console.log(users);
    })
    .catch(error => console.error('Error:', error));

fetch('/getAllCategory')
    .then(response => response.json())
    .then(data => {
        // Simpan data kategori dalam variabel
        kategori = data;
        console.log(kategori);
    })
    .catch(error => console.error('Error:', error));

function openModal(idSurat, nomorsurat, pengirim, penerima, perihal, idUser, idKategori, created_at) {
    console.log('openModal called with:', idSurat, nomorsurat, pengirim, penerima, perihal, idUser, idKategori, created_at);
    document.getElementById("modal-idSurat").innerText = idSurat;
    document.getElementById("modal-nomorsurat").innerText = nomorsurat;
    document.getElementById("modal-pengirim").innerText = pengirim;
    document.getElementById("modal-penerima").innerText = penerima;
    document.getElementById("modal-perihal").innerText = perihal;
    document.getElementById("modal-created_at").innerText = created_at;
    document.getElementById("modal-idUser").innerText = users[idUser] ? users[idUser] : 'User not found';
    document.getElementById("modal-idKategori").innerText = kategori[idKategori] ? kategori[idKategori] : 'Category not found';

    document.getElementById("myModal").classList.remove("hidden");
}

function closeModal() {
    document.getElementById("myModal").classList.add("hidden");
}

// Menambahkan event listener untuk menutup modal saat latar belakang modal diklik
document.addEventListener("click", function(event) {
    var modal = document.getElementById("myModal");
    if (event.target === modal) {
        closeModal();
    }
});

//SORTING DATE
var ascending = true; // Inisialisasi status sorting sebagai ascending

function sortTableBy(type) {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector("table");
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("td")[0].textContent;
            y = rows[i + 1].getElementsByTagName("td")[0].textContent;
            // Ubah format tanggal menjadi format yang dapat dibandingkan (misalnya YYYY-MM-DD)
            x = new Date(x.split(' ').join('T'));
            y = new Date(y.split(' ').join('T'));
            if (!ascending) { // Jika descending, tukar x dan y
                var temp = x;
                x = y;
                y = temp;
            }
            if (type === 'jam') {
                x = x.getHours() * 3600 + x.getMinutes() * 60 + x.getSeconds();
                y = y.getHours() * 3600 + y.getMinutes() * 60 + y.getSeconds();
            } else if (type === 'tanggal') {
                x = x.getTime();
                y = y.getTime();
            }
            if (x > y) {
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
    // Toggle status sorting
    ascending = !ascending;
}

function confirmAction(idSurat, action) {
    if (confirm(`Apakah Anda yakin ingin ${action} surat ini?`)) {
        // Lakukan aksi sesuai konfirmasi
        updateStatus(idSurat, action);
    }
}
function confirmActionArsip(idSurat, action) {
    if (confirm(`Apakah Anda yakin ingin ${action} surat ini?`)) {
        updateStatusArsip(idSurat, action);
    }
}

function updateStatus(idSurat, action) {
    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
    if (!csrfTokenMeta) {
        console.error('Meta tag CSRF token not found');
        return;
    }
    const csrfToken = csrfTokenMeta.getAttribute('content');
    
    // Kirim permintaan ke server untuk mengubah status surat
    fetch(`/updateStatus/${idSurat}`, {
        method: 'PUT', // Atau sesuaikan dengan metode yang sesuai
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ status: action }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Handle respons dari server jika diperlukan
        console.log('Status surat diperbarui:', action);
        location.reload()
        // Misalnya, refresh halaman atau update UI secara dinamis
        // Di sini Anda bisa menambahkan logika untuk memperbarui UI setelah status berubah
    })
    .catch(error => {
        console.error('Error updating status:', error);
        // Handle error jika terjadi kesalahan saat mengirim permintaan
    });
}

// Update Arsip

function updateStatusArsip(idSurat, action) {
    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
    if (!csrfTokenMeta) {
        console.error('Meta tag CSRF token not found');
        return;
    }
    const csrfToken = csrfTokenMeta.getAttribute('content');
    
    // Kirim permintaan ke server untuk mengubah status surat
    fetch(`/updateStatusArsip/${idSurat}`, {
        method: 'PUT', // Atau sesuaikan dengan metode yang sesuai
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ arsip: action }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Handle respons dari server jika diperlukan
        console.log('Status arsip diperbarui:', action);
        location.reload()
        // Misalnya, refresh halaman atau update UI secara dinamis
        // Di sini Anda bisa menambahkan logika untuk memperbarui UI setelah status berubah
    })
    .catch(error => {
        console.error('Error updating status:', error);
        // Handle error jika terjadi kesalahan saat mengirim permintaan
    });
}

</script>
@include('component.footer')
</body>
</html>
