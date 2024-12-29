<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class SuperAdminController extends Controller
{
    //
    public function index()
    {
        // Ambil semua data pegawai
        $data = Pegawai::all();

        // Kirim data ke view
        return view('superadmin.dashboard', compact('data'));
    }

    public function dashboardSuperadmin()
    {
        $data = Pegawai::where('status', 'diverifikasi')->get();

        return view('superadmin.dashboard', compact('data'));
    }

    public function showVerifikasi($id)
    {
        $data = Pegawai::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        return view('superadmin.verifikasi', compact('data'));
    }

    public function updateVerifikasi(Request $request, $id)
    {
        $data = Pegawai::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $data->status = $request->input('status');
        $data->catatan_koreksi = $request->input('catatan_koreksi');
        $data->save();

        return redirect()->route('superadmin.dashboard', $id)->with('success', 'Data berhasil diperbarui');
    }
}
