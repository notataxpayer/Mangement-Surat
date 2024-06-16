<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyApp</title>
    <!-- Vite CSS Plugin -->
    <link rel="stylesheet" href="/resources/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="bg-[#cbe6ea] text-black pb-6 pt-6 text-xl">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="">
                        <img src="https://res.cloudinary.com/dnyrrcacd/image/upload/v1718548429/Laravel/logo_xvkhe5.png" href="{{ url('/dashboard') }}" alt="Logo" class="w-[240px] h-auto">
                    </div>
                    <div class="hidden sm:block sm:ml-6">
                    </div>
                </div>
                <!-- <div class="hidden sm:block sm:ml-6" id="loginSection">
                    <div class="flex space-x-4">
                        <a id="dashboardLink" href="{{ url('/dashboard') }}" class="hover:text-black duration-300 bg-white px-3 py-2 rounded-md font-bold text-2xl hidden">Dashboard</a>
                        <a id="loginLogoutButton" href="{{ url('/login') }}" class="hover:text-black duration-300 shadow-sm hover:shadow-lg bg-white px-4 py-2 rounded-md font-bold text-2xl">Login</a>
                    </div>
                </div> -->
                <div class="hidden sm:block sm:ml-6" id="loginSection">
                    <div class="flex space-x-4">
                        @auth
                            <a id="dashboardLink" href="{{ url('/dashboard') }}" class="hover:text-black duration-300 bg-white shadow-sm hover:shadow-lg hover:outline-black hover:outline-2 px-3 py-2 rounded-md font-bold text-2xl"> <i class="fa fa-sign-out"></i> Dashboard</a>
                            <button id="loginLogoutButton" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="hover:text-black duration-300 shadow-sm hover:shadow-lg bg-white px-4 py-2 rounded-md font-bold text-2xl">
                                <i class="fa fa-sign-out"></i> Logout
                            </button>                            
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <a id="loginLogoutButton" href="{{ url('/login') }}" class="hover:text-black duration-300 shadow-sm hover:shadow-lg bg-white px-4 py-2 rounded-md font-bold text-2xl">Login</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Script untuk mengelola status login dan mengubah tampilan tombol -->
    <script>
        // Fungsi untuk memeriksa status login
        function checkLoginStatus() {
            // Mendapatkan elemen tombol dan tautan yang perlu diperbarui
            const loginLogoutButton = document.getElementById('loginLogoutButton');
            const dashboardLink = document.getElementById('dashboardLink');

            // Menyembunyikan dashboardLink secara default
            dashboardLink.classList.add('hidden');

            // Mengubah tampilan berdasarkan status login
            @auth
                // Jika sudah login
                loginLogoutButton.innerText = 'Logout';
                dashboardLink.classList.remove('hidden');
            @else
                // Jika belum login
                loginLogoutButton.innerText = 'Login';
            @endauth
        }

        // Panggil fungsi untuk mengatur tampilan awal
        checkLoginStatus();

        function logout() {
            // Hapus cookies atau sesi yang diperlukan
            document.cookie = 'session=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
            // Redirect ke halaman login atau halaman lain setelah logout
            window.location.href = '{{ url('/login') }}'; // Ganti URL sesuai dengan kebutuhan Anda
        }
    </script>
</body>
</html>
