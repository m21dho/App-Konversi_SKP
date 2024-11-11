<?php

namespace App\Http\Controllers;

use App\Models\Pegawai; // Impor model Pegawai
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = Pegawai::all();
        return view('dashboard', compact('data'));
    }

    public function tambah(){
        return view('tambah');
    }

    public function insert(Request $request)
    {
            // Validasi input jika diperlukan
        $validated = $request->validate([
            'pegawai' => 'required|string',
            'penilai' => 'required|string',
            'periodemulai' => 'required|date',
            'periodeselesai' => 'required|date',
        ]);

        // Simpan data ke dalam database
        Pegawai::create($validated);

        // Redirect ke dashboard pegawai
        return redirect()->route('dashboard');
    }

    public function tampildata($id){
        $data = Pegawai::find($id);
        return view('editdata', compact('data'));
    }

    public function updatedata(Request $request ,$id){
        $data = Pegawai::find($id);
        $data->update($request->all());
        return redirect()->route('dashboard');
    }

    public function delete($id){
        $data = Pegawai::find($id);
        $data->delete();
        return redirect()->route('dashboard');
    }

}
