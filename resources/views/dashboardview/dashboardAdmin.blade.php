<!DOCTYPE html>
<html lang="id">

<head>
    <<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    @vite('resources/css/app.css')
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #b9d7da;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
            border-radius: 10px;
            margin: 0;
        }

        .header .left {
            display: flex;
            align-items: center;
            padding-left: 30px;
        }

        .header .left img {
            width: 140px;
            height: 50px;
            object-fit: contain;
            margin-right: 10px;
            padding-left: 30px;
        }

        .header .right {
            display: flex;
            align-items: center;
            padding-right: 30px;
        }

        .header .right a {
            display: flex;
            align-items: center;
            margin-left: 20px;
            text-decoration: none;
            color: #333;
            padding: 10px 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 4px rgba(0, 0, 0, 0.1);
            font-weight: bold;
        }

        .header .right a .icon {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }

        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .title-section {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            background-image: url("Frame.png");
            background-size: cover;
            background-position: center;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
            padding: 50px 0;
            box-sizing: border-box;
            border-radius: 10px;
            background-color: #94bdc3;
            margin: 0;
        }

        .title-section img {
            width: 120px;
            height: 120px;
            object-fit: contain;
            margin-right: 20px;
            margin-bottom: -25px;
        }

        .title-section .text {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            color: #000;
        }

        .title-section h1 {
            font-size: 64px;
            margin: 0;
            font-weight: bold;
        }

        .title-section h2 {
            font-size: 24px;
            margin: 0;
            font-weight: lighter;
            margin-top: -20px;
        }

        .Dashboard-section {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 100%;
            background-image: url("Frame.png");
            background-size: cover;
            background-position: flex;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
            padding: 50px 0;
            box-sizing: border-box;
            border-radius: 10px;
            background-color: #94bdc3;
            margin: 0;
            padding-left: 150px;
        }

        .Dashboard-section img {
            width: 120px;
            height: 120px;
            object-fit: contain;
            margin-right: 20px;
            margin-bottom: -25px;
        }

        .Dashboard-section .text {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            color: #000;
        }

        .Dashboard-section .text h1 {
            font-size: 50px;
            margin: 0 0 10px 0;
            font-weight: bold;
            margin-bottom: -10px;
        }

        .Dashboard-section .text p {
            margin: 0 0 10px 0;
            font-size: 20px;
        }

        .Dashboard-section .text h3 {
            font-size: 26px;
            margin: -5px 0 0 0;
            font-weight: normal;
        }

        .content p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .content {
            background-color: #fff;
            text-align: center;
            padding: 50px;
            background-image: url("Frame.png");
            background-size: cover;
            background-position: center;
            margin: 0;
        }

        .button-section {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 10px;
        }

        .button {
            display: inline-block;
            padding: 20px 30px;
            background-color: #e9e0d2;
            color: black;
            text-decoration: none;
            font-weight: bold;
            border-radius: 10px;
            transition: background-color 0.3s ease;
            width: 200px;
            text-align: center;
            font-weight: bold;
            font-size: 20px;
        }

        .button:hover {
            background-color: #d9c9b8;
        }

        .description {
            font-size: 10px;
            color: #333;
            opacity: 0.5;
            margin-top: 5px;
            max-width: 300px;
            text-align: center;
        }

        .footer {
            background-color: #b9d7da;
            padding: 20px;
            text-align: center;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
            margin: 0;
        }

        .footer img {
            width: 140px;
            height: 50px;
            object-fit: contain;
        }

        #buram {
            opacity: 0.5;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
            }

            .header .left,
            .header .right {
                flex-direction: column;
                align-items: center;
            }

            .header .right a {
                margin: 10px 0;
            }

            .title-section {
                padding: 20px 0;
            }

            .title-section h1 {
                font-size: 36px;
            }

            .title-section h2 {
                font-size: 18px;
            }

            .content {
                padding: 20px;
            }

            .content p {
                font-size: 16px;
            }

            .button {
                padding: 15px 10px;
            }

            .footer {
                padding: 10px;
            }
        }

        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>

<body>
    @include('component.navbar')

    <div class="Dashboard-section">
        <img src="C:\Users\RyanMFDR\Documents\VSCODE\Pemweb\Final\Image\DashboardIcon.png" alt="Logo" />
        <div class="text">
            <h1>Dashboard</h1>
            <p>Pilih layanan yang dibutuhkan</p>
            <h3>Halo <b>Admin!</b></h3>
        </div>
    </div>

    <div class="content">
        <div class="button-section">
            <div class="button-container">
                <a href="#" class="button">Lihat Surat</a>
                <p class="description">
                    Lihat daftar surat yang telah diajukan oleh pengguna
                </p>
            </div>
            <div class="button-container">
                <a href="#" class="button">Lihat Arsip</a>
                <p class="description">Lihat surat yang telah diarsipkan</p>
            </div>
        </div>
    </div>

    @include('component.footer')
    </div>
</body>

</html>
