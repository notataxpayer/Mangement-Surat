<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    <!-- @vite('resources/css/app.css') -->
    <style>
        body {
            background-image: url("images/frame 3.png");
            /* Ganti dengan path yang benar */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: "Poppins", sans-serif;
            padding-bottom: 50px; /* Tambahkan padding bawah untuk ruang bagi footer */
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0);
            padding: 20px;
            border-radius: 10px;
            width: 40%;
            max-width: 700px;
        }

        .form-container label {
            font-family: "Poppins", sans-serif;
            font-weight: 600;
            font-size: 20px;
            margin-bottom: 8px;
            display: block;
            text-align: left;
        }

        .form-container input {
            width: calc(100% - 30px);
            height: 50px;
            padding: 10px 15px;
            border-radius: 15px;
            border: 1px solid #cccccc00;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            margin-bottom: 50px;
            font-family: "Poppins", sans-serif;
            font-size: 20px;
            color: #ffffff00;
        }

        .form-container button {
            background-color: #ffffff;
            color: rgb(0, 0, 0);
            font-family: "Poppins", sans-serif;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 30px;
            border-radius: 15px;
            border: none;
            cursor: pointer;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-left: auto;
            margin-right: 0;
            font-weight: 800;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
   {{-- @include('component.navbar') --}}

    <div class="form-container">
        <form method="POST" action="{{ route('auth') }}">
            <!-- @csrf -->
            <div class="mb-4">
                <label for="username">Username</label>
                <input id="username" type="text" placeholder="Username" name="username" />
            </div>
            <div class="mb-6">
                <label for="password">Password</label>
                <input id="password" type="password" placeholder="Password" name="password" />
            </div>
            <div class="button-container">
                <button type="submit">
                    Login →
                </button>
            </div>
        </form>
    </div>

    @include('components.footer')

</body>

</html>
