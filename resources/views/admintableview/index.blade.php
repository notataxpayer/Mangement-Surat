<!DOCTYPE html>
<html>
<head>
    <title>Daftar Surat</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-poppins">
    @include('component.navbar')

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-4 pl-48">List Surat Admin</h1>
        <div class="overflow-x-auto items-center justify-center flex py-8">
            <table class="table-auto w-9/12 justify-items-center flex-col border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Tanggal <button class="text-xs bg-cust-cream" onclick="sortTableBy('tanggal')">
                            sort
                        </button></th>
                        <th class="px-4 py-2">Nama Pengaju</th>
                        <th class="px-4 py-2">Detail</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Arsipkan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surats as $surat)
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
                                <button class="mr-4 bg-cust-green hover:bg-cust-greenlight text-sm p-1 px-4 rounded-xl font-bold hover:text-black hover:shadow-md text-white hover:duration-300 transition duration-300 ease-in-out">
                                    Accept
                                </button> 
                                <button class="bg-cust-red text-sm p-1 px-4 rounded-xl font-bold hover:text-black hover:bg-cust-redlight hover:shadow-md hover:duration-300 transition duration-300 ease-in-out text-white">
                                    Reject
                                </button>
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <button class="bg-cust-yellow p-1 px-4 rounded-xl text-sm font-bold hover:text-white hover:shadow-md hover:duration-300 transition duration-300 ease-in-out">
                                    Arsipkan
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
</script>

</body>
</html>
