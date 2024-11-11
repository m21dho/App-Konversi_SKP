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
                        <th scope="col">No</th>
                        <th scope="col">Nama Pegawai</th>
                        <th scope="col">Nama Penilai</th>
                        <th scope="col">Periode Mulai</th>
                        <th scope="col">Periode Selesai</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $isi)
                        <tr>
                            <th scope="row"> {{ $isi->id }} </th>
                            <td>{{$isi ->pegawai}}</td>
                            <td>{{$isi ->penilai}}</td>
                            <td>{{$isi ->periodemulai}}</td>
                            <td>{{$isi ->periodeselesai}}</td>
                            <td>
                                Diproses
                            </td>
                            <td>
                                <a href ="/tampildata/{{ $isi->id }}" type="button" class="btn-upload" >Edit</a>
                                <a href ="/delet/{{ $isi->id }}" type="button" class="btn-delete">Delete</a>
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
