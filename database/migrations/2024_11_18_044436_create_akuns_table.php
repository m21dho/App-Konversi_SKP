<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('akuns', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('nidn')->primary();
            $table->string('nama')->unique();
            $table->string('jabatan');
            $table->string('foto')->nullable();
            $table->timestamps();
        
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('akuns');
    }
};