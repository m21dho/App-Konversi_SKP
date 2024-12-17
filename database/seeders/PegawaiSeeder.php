<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB ::table('pegawais')-> insert([
            'pegawai' => 'Surya Pramadani',
            'penilai' => 'Ramadhan Saputra',
            'jenis_kegiatan' => 'b',
            'file' => 'APPL_DFD.pdf',
            'catatan_koreksi' => 'test',
        ]);
    }
}
