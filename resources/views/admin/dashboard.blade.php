<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div style="position: fixed; top: 20px; right: 20px; background-color: #28a745; color: white; padding: 10px 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); z-index: 1000;">
                            <span onclick="this.parentElement.style.display='none';" style="cursor:pointer; float:right;">&times;</span>
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
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
                            background-color: #0d0fd9;
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
                        .notif {
                            padding: 20px;
                            color: white;
                        }
                        .status-label {
                            padding: 5px 10px;
                            border-radius: 5px;
                            color: white;
                            display: inline-block;
                        }
                        .status-diproses {
                            background-color: yellow;
                        }
                        .status-koreksi {
                            background-color: red;
                        }
                        .status-selesai {
                            background-color: green;
                        }
                    </style>
                    <h1 class="h1">Data SKP</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Nama Penilai</th>
                                <th scope="col">Jenis Kegiatan</th>
                                <th scope="col">Tanggal Submit</th>
                                <th scope="col">File</th>
                                <th scope="col">Koreksi</th>
                                <th scope="col">Status</th>
                                <th scope="col">Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $isi)
                            <tr>
                                <td>{{ $isi->pegawai }}</td>
                                <td>{{ $isi->penilai }}</td>
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
                                <td>{{ $isi->created_at }}</td>
                                <td>
                                    <?php $filePath = asset('storage/' . $isi->file); ?>
                                    <a href="{{ $filePath }}" target="_blank" class="btn-file">
                                        FILE
                                    </a>
                                </td>
                                <td>
                                    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;">
                                        <a href="{{ route('koreksi.show', $isi->id) }}" type="button" class="btn">Koreksi</a>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-label
                                        @if($isi->status == 'Diproses') status-diproses
                                        @elseif($isi->status == 'Koreksi') status-koreksi
                                        @elseif($isi->status == 'Selesai') status-selesai
                                        @else status-default
                                        @endif
                                        ">
                                        {{ $isi->status ?? 'Diproses' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="notif" style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;">
                                        <form action="{{ route('admin.verifikasi', $isi->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn">Verifikasi</button>
                                        </form>
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
