<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="bg-cover bg-no-repeat bg-fixed flex flex-col justify-center items-center h-screen font-poppins pb-12" style="background-image: url('images/frame 3.png');">
    {{-- @include('component.navbar') --}}

    <div class="bg-transparent p-8 rounded-lg w-2/5 max-w-xl">
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

    @include('component.footer')
</body>

</html>
