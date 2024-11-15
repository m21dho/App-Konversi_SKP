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
            'periodemulai' => '12 November sd 12 Desember',
            'periodeselesai' => '12 November sd 12 Desember',
            'file' => 'APPL_DFD.pdf',
        ]);
    }
}
