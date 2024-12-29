<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <style>
                        table {
                            border-collapse: collapse;
                            width: 100%;
                            border-radius: 10px;
                            overflow: hidden;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                        }
                        th, td {
                            border: 1px solid #ddd;
                            padding: 12px;
                            text-align: left;
                        }
                        th {
                            background-color: #f4f4f4;
                        }
                        tr:nth-child(even) {
                            background-color: #f9f9f9;
                        }
                        .btn {
                            background-color: #060761;
                            color: white;
                            padding: 10px 20px;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                        }
                        .btn:hover {
                            background-color: rgb(22, 8, 219);
                        }
                        .btn-file {
                            background-color: #007bff;
                            color: white;
                            padding: 10px 20px;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                            margin-bottom: 60px;
                        }
                        .btn-file:hover {
                            background-color: #0056b3;
                        }
                        h1 {
                            background-color: #060761;
                            border: 2px solid white;
                            color: white;
                            padding: 10px 20px;
                            border-radius: 5px;
                            margin-bottom: 30px;
                            text-align: center;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                        }
                    </style>
                    <h1>Penilaian</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Nama Penilai</th>
                                <th scope="col">Jenis Kegiatan</th>
                                <th scope="col">Tanggal Submit</th>
                                <th scope="col">File</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $isi)
                            <tr>
                                <td>{{ $isi->pegawai }}</td>
                                <td>{{ $isi->penilai }}</td>
                                <td>{{ $isi->jenis_kegiatan }}</td>
                                <td>{{ $isi->created_at }}</td>
                                <td>
                                    <a href="{{ asset('storage/' . $isi->file) }}" target="_blank" class="btn-file">
                                        FILE
                                    </a>
                                </td>
                                <td>
                                    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;">
                                        <a href="{{ route('verifikasi.show', $isi->id) }}" type="button" class="btn">Verifikasi</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
