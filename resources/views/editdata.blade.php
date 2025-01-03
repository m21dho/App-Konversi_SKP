@if($data->user_id === Auth::id())
    <!-- Tampilkan data -->
@else
    <p>Anda tidak memiliki akses untuk mengedit data ini.</p>
@endif

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data SKP') }}
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
                    <form action="/updatedata/{{$data->id}}" method="POST" class="custom-form" enctype="multipart/form-data">
                        @csrf
                        <div class="custom-form">
                            <div class="mb-3">
                                <label for="namaPegawai" class="form-label">Nama Pegawai</label>
                                <input type="text" value="{{$data->pegawai}}" name="pegawai" class="form-control" id="namaPegawai" placeholder="Masukkan Nama Anda">
                            </div>

                            <div class="mb-3">
                                <label for="namaPegawai" class="form-label">Nama Penilai</label>
                                <input type="text" value="{{$data->penilai}}" name="penilai" class="form-control" id="namaPegawai" placeholder="Masukkan Nama Anda">
                            </div>

                            <div class="mb-3">
                                <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan</label>
                                <select name="jenis_kegiatan" id="jenis_kegiatan" class="form-control" required>
                                    <option value="">-- Pilih Jenis Kegiatan --</option>
                                    <option value="a">Kegiatan A</option>
                                    <option value="b">Kegiatan B</option>
                                    <option value="c">Kegiatan C</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">File SKP</label>
                                <input type="file" value="{{$data->file}}" name="file" class="form-control" id="file" ><br>
                                <small class="text-muted">Jika File Tidak Salah Tidak Perlu Iupload Ulang.</small>
                            </div>

                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
