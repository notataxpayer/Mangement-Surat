<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ajukan Surat</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    <style>
        body {
            background-image: url("images/frame 3.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: "Poppins", sans-serif;
            padding-bottom: 70px;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0);
            padding: 20px;
            border-radius: 10px;
            width: 40%;
            max-width: 700px;
            align-items: center;
        }

        .form-container p1 {
            color: #333;
            font-family: "Poppins", sans-serif;
            font-size: 12px;
            display: block;
            margin-right: 30%;
        }

        .form-container label {
            font-family: "Poppins", sans-serif;
            font-weight: 600;
            font-size: 20px;
            margin-bottom: 8px;
            display: block;
            text-align: left;
        }

        .form-container input{
            width: calc(100% - 30px);
            height: 50px;
            padding: 10px 15px;
            border-radius: 15px;
            border: 1px solid #cccccc00;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            margin-bottom: 50px;
            font-family: "Poppins", sans-serif;
            font-size: 20px;
            color: #333;
        }
        .form-container select {
            width: calc(100%);
            height: 50px;
            padding: 10px 15px;
            border-radius: 15px;
            border: 1px solid #cccccc00;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            margin-bottom: 50px;
            font-family: "Poppins", sans-serif;
            font-size: 20px;
            color: #333;
        }

        .form-container button {
            background-color: #cbe6ea;
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
            margin-top: 10px;
            margin-left: auto;
            margin-right: 0;
            margin-bottom: 50px;
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
        <form method="POST" action="{{ route('request.store') }}">
            @csrf
            <div class="mb-4">
                <label for="namaPengaju">Nama Pengaju</label>
                <input id="namaPengaju" type="text" placeholder="Nama Lengkap Pengaju" name="namaPengaju" />
            </div>
            <div class="mb-6">
                <label for="noSurat">Nomor Surat</label>
                <input id="noSurat" type="text" placeholder="Nomor Surat" name="noSurat">
            </div>
            <div class="mb-7">
                <label for="kategori">Kategori Surat</label>
                <select id="kategori" name="kategori">
                    <option value="" disabled selected hidden>Pilih</option>
                    <option value="undangan">Surat Undangan</option>
                    <option value="proposal">Surat Proposal</option>
                    <option value="keterangan">Surat Keterangan</option>
                </select>
            </div>
            <div class="mb-8">
                <label for="perihal">Perihal</label>
                <input id="perihal" type="text" placeholder="Perihal Surat" name="perihal" />
            </div>
            <div class="mb-9">
                <label for="penerima">Penerima Surat</label>
                <input id="penerima" type="text" placeholder="Surat Ditujukan Kepada" name="penerima">
            </div>
            <p1>Mohon cek kembali surat yang diajukan apakah sudah sesuai dan sudah benar!</p1>
            <div class="button-container">
                <button type="submit">
                    Ajukan →
                </button>
            </div>
        </form>
    </div>

    @include('components.footer')

</body>

</html>
