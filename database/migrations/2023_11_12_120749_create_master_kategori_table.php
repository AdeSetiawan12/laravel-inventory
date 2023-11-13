<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_kategori', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 7);
            $table->string('nama_kategori', 25);
            $table->string('deskripsi');
            $table->string('status')->nullable();
            $table->dateTime('dibuat_kapan');
            $table->integer('dibuat_oleh')->nullable();
            $table->dateTime('diperbarui_kapan')->nullable();
            $table->dateTime('diperbarui_oleh')->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_kategori');
    }
};
