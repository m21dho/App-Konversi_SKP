<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Skp;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Ambil semua data pegawai, pastikan tidak ada duplikasi
        $data = Pegawai::distinct()->get();

        return view('admin.dashboard', compact('data'));
    }

    public function index()
    {
          // Ambil semua data pegawai
          $data = Pegawai::all();

          // Kirim data ke view
          return view('admin.dashboard', compact('data'));
    }


    public function showKoreksi($id)
    {
        $data = Pegawai::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        return view('admin.koreksi', compact('data'));
    }

    public function updateKoreksi(Request $request, $id)
    {
        $request->validate([
            'catatan_koreksi' => 'required|string|max:255',
            'status' => 'required|string|in:Diproses,Koreksi,Selesai',
        ]);

        $pegawai = Pegawai::find($id);

        if (!$pegawai) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $pegawai->catatan_koreksi = $request->catatan_koreksi;
        $pegawai->status = $request->status;
        $pegawai->save();

        return redirect()->route('admin.dashboard')->with('success', 'Koreksi berhasil disimpan');
    }

    public function verifikasi($id)
    {
        $pegawai = Pegawai::find($id);

        if (!$pegawai) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $pegawai->status = 'diverifikasi';
        $pegawai->save();

        return redirect()->route('admin.dashboard')->with('success', 'Verifikasi berhasil! Data telah dikirim untuk dinilai superadmin.           ');
    }

    public function dashboardAdmin()
    {
        // Ambil semua data pegawai atau filter sesuai kebutuhan
        $data = Pegawai::all();

        // Kirim data ke view
        return view('admin.dashboard', compact('data'));
    }
}
