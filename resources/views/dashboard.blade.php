

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
                        overflow: hidden; /* Agar sudut tabel tidak terpotong */
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambahan bayangan untuk efek */
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
                        .btn-upload {
                            background-color: #007bff;
                            color: white;
                            padding: 10px 20px;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                        }
                        .btn-upload:hover {
                            background-color: #0056b3;

                        }
                        .btn-delete {
                            background-color: #cc0000;
                            color: white;
                            padding: 10px 20px;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                        }
                        .btn-delete:hover {
                            background-color: #7c0a02;

                        }
                        .btn-new {
                            background-color: #12760b;
                            color: white;
                            padding: 10px 20px;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                            margin-bottom: 60px;
                        }
                        .btn-new:hover {
                            background-color: #17b80c;
                        }
                </style>
                <a href="/tambah" class="btn-new" style="margin-bottom: 20px; display: inline-block;">Tambah +</a>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nama Pegawai</th>
                        <th scope="col">Nama Penilai</th>
                        <th scope="col">Jenis Kegiatan</th>
                        <th scope="col">Tanggal Submit</th>
                        <th scope="col">File</th>
                        <th scope="col">Status</th>
                        <th scope="col">Catatan</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $isi)
                        <tr>
                            <td>{{$isi ->pegawai}}</td>
                            <td>{{$isi ->penilai}}</td>
                            <td>
                                @if ($isi->jenis_kegiatan == 'a')
                                    Kegiatan A
                                @elseif ($isi->jenis_kegiatan == 'b')
                                    Kegiatan B
                                @elseif ($isi->jenis_kegiatan == 'c')
                                    Kegiatan C
                                @else
                                    Tidak Diketahui
                                @endif
                            </td>
                            <td>{{$isi ->created_at}}</td>
                            <td>
                            <a href="{{ asset('storage/' . $isi->file) }}" target="_blank">
                                {{ \Illuminate\Support\Str::limit($isi->file, 20) }} <!-- Batasi menjadi 20 karakter -->
                            </a>
                            </td>
                            <td>
                                {{ $isi->status ?? 'diproses' }}
                            </td>
                            <td>
                                {{ $isi->catatan_koreksi ?? 'Tidak ada catatan' }}
                            </td>
                            <td>
                                <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;">
                                    <a href="/tampildata/{{ $isi->id }}" type="button" class="btn-upload">Edit</a>
                                    <a href="/delet/{{ $isi->id }}" type="button" class="btn-delete">Delete</a>
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
