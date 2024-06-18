<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="bg-cover bg-no-repeat bg-fixed flex flex-col h-screen font-poppins pb-12" style="background-image: url('https://res.cloudinary.com/dnyrrcacd/image/upload/v1718548430/Laravel/Frame_3_b3cxje.png')">
    {{-- @include('component.navbar') --}}
    @include('component.navbar')
    <div class="flex flex-col justify-center items-center py-32">
        <div class="bg-transparent  p-8 rounded-lg w-2/5 max-w-xl">
        <form method="POST" action="{{ route('auth') }}">
            @csrf
            <div class="mb-6">
                <label for="name" class="block text-lg font-semibold mb-2">Username</label>
                <input id="name" type="text" placeholder="name" name="name" class="w-full h-12 p-4 rounded-lg border border-transparent shadow-md text-gray-700" />
            </div>
            <div class="mb-6">
                <label for="password" class="block text-lg font-semibold mb-2">Password</label>
                <input id="password" type="password" placeholder="Password" name="password" class="w-full h-12 p-4 rounded-lg border border-transparent shadow-md text-gray-700" />
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-white text-black font-bold py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 hover:text-white transition-colors">
                    Login →
                </button>
            </div>
        </form>
    </div>
    <div id="toast" class="fixed top-10 right-10 bg-gray-800 text-white p-4 rounded-md hidden">
        <p id="toast-message"></p>
    </div>
    </div>
    

    @include('component.footer')
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toast-message');

        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Hindari pengiriman form langsung

            // Ambil nilai input
            const name = document.getElementById('name').value;
            const password = document.getElementById('password').value;

            // Validasi field tidak boleh kosong
            if (name.trim() === '' || password.trim() === '') {
                showToast('Please fill in all fields');
                return;
            }

            // Kirim form jika validasi berhasil
            this.submit();
        });

        function showToast(message) {
            toastMessage.textContent = message;
            toast.classList.remove('hidden');
            setTimeout(function() {
                toast.classList.add('hidden');
            }, 3000); // Toast akan hilang setelah 3 detik
        }
    });

</script>
</html>
