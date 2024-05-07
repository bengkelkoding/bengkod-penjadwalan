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
        Schema::create('presence_absences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->references('id')->on('mahasiswa')->onDelete('cascade');
            $table->foreignId('presence_id')->constrained()->onDelete('cascade');
            $table->enum('absence_type', ['IZIN', 'SAKIT']);
            $table->text('notes')->nullable();
            $table->string('image')->nullable();
            $table->enum('submitted_by', ['DOSEN', 'MAHASISWA']);
            $table->foreignId('dosen_id')->nullable()->references('id')->on('dosen');
            $table->boolean('is_approved')->default(false);
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presence_absences');
    }
};
