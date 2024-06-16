<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyApp</title>
    <!-- Vite CSS Plugin -->
    <link rel="stylesheet" href="/resources/css/app.css">
</head>
<body>
    <nav class="bg-[#cbe6ea] text-black pb-6 pt-6 text-xl ">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex">
                    <div class="">
                        <img src="https://res.cloudinary.com/dnyrrcacd/image/upload/v1718548429/Laravel/logo_xvkhe5.png" href="{{ url('/dashboard') }}" alt="Logo" class="w-[240px] h-auto">
                    </div>
                    <div class="hidden sm:block sm:ml-6">
                        <!-- <div class="flex space-x-4">
                            <a href="{{ url('/') }}" class=" hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md font-medium">Home</a>
                            <a href="{{ url('/about') }}" class=" hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md font-medium">About</a>
                            <a href="{{ url('/contact') }}" class=" hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md font-medium">Contact</a>
                            <a href="{{ url('/surats') }}" class=" hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md font-medium">Surats</a>
                        </div> -->
                    </div>
                </div>
                <div class="hidden sm:block sm:ml-6" id="loginSection">
                    <div class="flex space-x-4">
                        <!-- Tombol Dashboard (akan muncul ketika sudah login) -->
                        <a id="dashboardLink" href="{{ url('/dashboard') }}" class=" hover:text-black duration-300 bg-white px-3 py-2 rounded-md font-bold text-2xl hidden">Dashboard</a>
                        
                        <!-- Tombol Login/Logout -->
                        <a id="loginLogoutButton" href="{{ url('/login') }}" class=" hover:text-black duration-300 shadow-sm hover:shadow-lg bg-white px-4 py-2 rounded-md font-bold text-2xl">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Script untuk mengelola status login dan mengubah tampilan tombol -->
    <script>
        // Fungsi untuk memeriksa status login dan memperbarui tampilan
        function checkLoginStatus() {
            // Simulasi status login (ganti menjadi true jika pengguna sudah login)
            let isLoggedIn = false; // Anda harus mengganti ini dengan logika sesuai aplikasi Anda

            // Mendapatkan elemen tombol dan tautan yang perlu diperbarui
            const loginLogoutButton = document.getElementById('loginLogoutButton');
            const dashboardLink = document.getElementById('dashboardLink');

            // Mengubah tampilan berdasarkan status login
            if (isLoggedIn) {
                // Jika sudah login
                loginLogoutButton.innerText = 'Logout';
                loginLogoutButton.href = '#'; // Ganti dengan URL untuk proses logout
                dashboardLink.classList.remove('hidden');
            } else {
                // Jika belum login
                loginLogoutButton.innerText = 'Login';
                loginLogoutButton.href = '{{ url('/login') }}'; // URL untuk halaman login
                dashboardLink.classList.add('hidden');
            }
        }

        // Panggil fungsi untuk mengatur tampilan awal
        checkLoginStatus();
    </script>
</body>
</html>
