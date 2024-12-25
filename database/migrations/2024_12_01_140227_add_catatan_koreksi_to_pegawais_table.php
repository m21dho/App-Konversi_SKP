<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCatatanKoreksiToPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pegawais', function (Blueprint $table) {
            $table->text('catatan_koreksi')->nullable()->after('jenis_kegiatan'); // Menambahkan kolom 'catatan_koreksi'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pegawais', function (Blueprint $table) {
            $table->dropColumn('catatan_koreksi'); // Menghapus kolom 'catatan_koreksi'
        });
    }
};
