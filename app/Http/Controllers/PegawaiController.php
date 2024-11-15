<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = Pegawai::where('user_id', Auth::id())->get();
        return view('dashboard', compact('data'));
    }

    public function tambah()
    {
        return view('tambah');
    }

    public function insert(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'pegawai' => 'required|string',
            'penilai' => 'required|string',
            'periodemulai' => 'required|date',
            'periodeselesai' => 'required|date',
            'file' => 'required|file|mimes:jpg,png,pdf|max:10240',
        ]);

        // Simpan file dan path-nya di database
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
            $validated['file'] = $filePath; // Tambahkan path file ke data yang divalidasi
        }

        $validated['user_id'] = Auth::id();

        // Simpan data ke dalam database
        Pegawai::create($validated);

        // Redirect ke dashboard pegawai
        return redirect()->route('dashboard');
    }

    public function tampildata($id)
    {
        $data = Pegawai::find($id);
        return view('editdata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'pegawai' => 'required|string',
            'penilai' => 'required|string',
            'periodemulai' => 'required|date',
            'periodeselesai' => 'required|date',
            'file' => 'nullable|file|mimes:jpg,png,pdf|max:10240',
        ]);

        $data = Pegawai::find($id);

        // Simpan file baru jika diunggah, dan hapus file lama
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
            $validated['file'] = $filePath;
        }

        // Update data
        $data->update($validated);

        return redirect()->route('dashboard');
    }

    public function delete($id)
    {
        $data = Pegawai::find($id);
        $data->delete();
        return redirect()->route('dashboard');
    }
}
