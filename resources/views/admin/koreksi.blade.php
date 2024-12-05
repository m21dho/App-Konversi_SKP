<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Koreksi Data Pegawai
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <style>
                        h3 {
                            background-color: #f0f8ff; /* Warna isi di dalam border */
                            border: 2px solid #007bff; /* Warna dan ketebalan border */
                            color: #333; /* Warna teks */
                            padding: 10px 20px; /* Jarak isi elemen dari tepi */
                            border-radius: 5px; /* Sudut border melengkung */
                            margin-bottom: 30px; /* Jarak elemen dari elemen lain di bawahnya */
                            text-align: center; /* Posisikan teks di tengah */
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambahan bayangan untuk efek */
                        }
                        .btn {
                            background-color: #007bff;
                            color: white;
                            padding: 10px 20px;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                        }
                        .btn:hover {
                            background-color: #0056b3;
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
                                <form action="{{ route('koreksi.update', $data->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="border p-2 w-full">
                                        <option value="Diproses" {{ $data->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="Koreksi" {{ $data->status == 'Koreksi' ? 'selected' : '' }}>Koreksi</option>
                                        <option value="Selesai" {{ $data->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="border px-4 py-2">Catatan Koreksi</th>
                            <td class="border px-4 py-2">
                                    <textarea name="catatan_koreksi" class="w-full border p-2" rows="4" placeholder="Masukkan catatan">{{ $data->catatan_koreksi }}</textarea>
                                    <button type="submit" class="btn mt-2">Simpan</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
