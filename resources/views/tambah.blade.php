
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Input Data SKP') }}
        </h2>
    </x-slot>
    <style>
        .custom-form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .custom-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #4a5568;
        }

        .custom-form input[type="email"],
        .custom-form input[type="password"],
        .custom-form input[type="date"],
        .custom-form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cbd5e0;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .custom-form input[type="email"]:focus,
        .custom-form input[type="password"]:focus,
        .custom-form input[type="date"]:focus,
        .custom-form input[type="text"]:focus {
            border-color: #3182ce;
            outline: none;
        }

        .custom-form .form-text {
            font-size: 12px;
            color: #a0aec0;
            margin-bottom: 15px;
        }

        .custom-form .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .custom-form .form-check input {
            margin-right: 10px;
        }

        .custom-form button {
            width: 100%;
            padding: 10px;
            background-color: #3182ce;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .custom-form button:hover {
            background-color: #2b6cb0;
        }
    </style>
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form action="/insert" method="POST" class="custom-form" enctype="multipart/form-data">
                        @csrf
                        <div class="custom-form">
                            <div class="mb-3">
                                <label for="namaPegawai" class="form-label">Nama Pegawai</label>
                                <input type="text" name="pegawai" class="form-control" id="namaPegawai" placeholder="Masukkan Nama Anda">
                            </div>

                            <div class="mb-3">
                                <label for="namaPegawai" class="form-label">Nama Penilai</label>
                                <input type="text" name="penilai" class="form-control" id="namaPegawai" placeholder="Masukkan Nama Penilai">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Periode Penilaian Mulai</label>
                                <input type="date" name="periodemulai" class="form-control" id="periodeStart" value="">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Periode Penilaian Selesai</label>
                                <input type="date" name="periodeselesai" class="form-control" id="periodeEnd" value="">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">File SKP</label>
                                <input type="file" name="file" class="form-control" id="file" value=""><br>
                                <small class="text-muted">Masukkan File Pendukung dengan format PDF. <br> Maksimal file 10MB</small>
                            </div>


                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
