<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pegawais', function (Blueprint $table) {
            $table->string('status')->default('Diproses'); // Default status
            $table->text('catatan')->nullable();          // Catatan koreksi
        });
    }

    public function down()
    {
        Schema::table('pegawais', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('catatan');
        });
    }

};
