

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <a href="#" class="text-white text-xl">MyApp</a>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="{{ url('/') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="{{ url('/about') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About</a>
                        <a href="{{ url('/contact') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                        <a href="{{ url('/surats') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Surats</a>
                    </div>
                </div>
            </div>
            <div class="hidden sm:block sm:ml-6">
                <div class="flex space-x-4">
                        <a  class="text-gray-300 hover:text-black duration-300 hover:bg-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                        <a  class="text-gray-300 hover:text-black duration-300 hover:bg-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                </div>
            </div>
        </div>
    </div>
</nav>
</body>
</html>