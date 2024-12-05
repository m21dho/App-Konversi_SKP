<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;

class DatadiriController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nidn' => 'required|unique:akuns,nidn,' . $request->user()->id,
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle upload foto
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('profile_photos', 'public');
        }

        // Update or insert data
        Akun::updateOrCreate(
            ['id' => auth()->id()], // Kondisi: id user harus unik
            [
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'foto' => $fotoPath,
            ]
        );

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }


}

