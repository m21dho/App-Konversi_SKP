<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEnumInPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pegawais', function (Blueprint $table) {
            $table->dropColumn('jenis_kegiatan'); // Hapus kolom enum lama
        });

        Schema::table('pegawais', function (Blueprint $table) {
            $table->enum('jenis_kegiatan', ['a', 'b', 'c', 'd'])->nullable(); // Tambahkan enum baru
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pegawais', function (Blueprint $table) {
            $table->dropColumn('jenis_kegiatan'); // Hapus kolom enum baru
        });

        Schema::table('pegawais', function (Blueprint $table) {
            $table->enum('jenis_kegiatan', ['a', 'b', 'c'])->nullable(); // Kembalikan enum lama
        });
    }
}
