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
        Schema::create('playstation', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_konsol', ['PS3', 'PS4', 'PS5']);
            $table->string('nomor_unit')->unique(); // Misal: PS4-001
            $table->integer('harga');
            $table->enum('status', ['Tersedia', 'Dipakai', 'Rusak'])->default('Tersedia');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playstation');
    }
};
