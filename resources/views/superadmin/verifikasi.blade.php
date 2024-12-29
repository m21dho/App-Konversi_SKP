<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Verifikasi Data Pegawai
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <style>
                        h3 {
                            background-color: #060761;
                            border: 2px solid white;
                            color: white;
                            padding: 10px 20px;
                            border-radius: 5px;
                            margin-bottom: 30px;
                            text-align: center;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
                        .h5 {
                            color: red;
                            margin-right: 5px;
                        }
                        .flex-container {
                            display: flex;
                            align-items: center;
                        }
                    </style>
                    <h3>Detail Data</h3>
                    <table class="table-auto w-full border-collapse border border-gray-200">
                        <tr>
                            <th class="border px-4 py-2">Nama Pegawai</th>
                            <td class="border px-4 py-2">{{ $data->pegawai }}</td>
                        </tr>
                        <tr>
                            <th class="border px-4 py-2">Nama Penilai</th>
                            <td class="border px-4 py-2">{{ $data->penilai }}</td>
                        </tr>
                        <tr>
                            <th class="border px-4 py-2">Jenis Kegiatan</th>
                            <td class="border px-4 py-2">{{ $data->jenis_kegiatan }}</td>
                        </tr>
                        <tr>
                            <th class="border px-4 py-2">Status</th>
                            <td class="border px-4 py-2">
                                <form action="{{ route('verifikasi.update', $data->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="border p-2 w-full">
                                        <option value="Koreksi" {{ $data->status == 'Koreksi' ? 'selected' : '' }}>Koreksi</option>
                                        <option value="Selesai" {{ $data->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="border px-4 py-2">Catatan Koreksi</th>
                            <td class="border px-4 py-2">
                                <textarea name="catatan_koreksi" class="w-full border p-2" rows="4" placeholder="Masukkan catatan"></textarea>
                                <div class="flex-container">
                                    <h5 class="h5">*</h5>
                                    <small class="text-muted">Jika tidak ada catatan tambahan kosongkan saja.</small>
                                </div>
                                <button type="submit" class="btn mt-2">Simpan</button>
                                </form> <!-- Menutup form setelah tombol submit -->
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
