<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Skp;

class AdminController extends Controller
{
    //
    public function index()
    {
          // Ambil semua data pegawai
          $data = Pegawai::all();

          // Kirim data ke view
          return view('admin.dashboard', compact('data'));
    }

    public function showKoreksi($id)
    {
        // Ambil data Pegawai berdasarkan ID
        $data = Pegawai::find($id);

        // Jika data tidak ditemukan
        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        // Kirim data ke view
        return view('admin.koreksi', compact('data'));
    }

    public function updateKoreksi(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'status' => 'required|string|in:Diproses,Koreksi,Selesai',
            'catatan_koreksi' => 'nullable|string|max:255',
        ]);

        // Cari data pegawai berdasarkan ID
        $pegawai = Pegawai::find($id);

        // Jika data tidak ditemukan
        if (!$pegawai) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        // Update status dan catatan koreksi
        $pegawai->status = $request->input('status');
        $pegawai->catatan_koreksi = $request->input('catatan_koreksi');
        $pegawai->save();

        return redirect()->route('admin.dashboard')->with('success', 'Koreksi berhasil disimpan');
    }


}
