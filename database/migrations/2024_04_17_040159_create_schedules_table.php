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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->nullable()->references('id')->on('dosen');
            $table->string('kode_matkul');
            $table->string('nama_matkul');
            $table->string('kode_kelompok');
            $table->tinyInteger('sks')->default(0);
            $table->integer('kuota')->default(0);
            $table->integer('jumlah_mahasiswa')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
