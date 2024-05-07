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
        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_session_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('week')->default(0);
            $table->boolean('is_enabled')->default(false);
            $table->boolean('qr_is_generated')->default(false);
            $table->string('qr_code')->nullable();
            $table->timestamp('qr_generated_at')->nullable();
            $table->integer('attendance_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presences');
    }
};
