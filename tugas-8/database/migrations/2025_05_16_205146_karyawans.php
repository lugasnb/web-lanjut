<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_karyawan', 6)->unique();
            $table->string('nama_karyawan', 50);
            $table->string('email', 50)->nullable();
            $table->string('no_telp', 15)->nullable();
            $table->text('alamat')->nullable();
            $table->string('jabatan', 30)->nullable();
            $table->date('tanggal_masuk')->nullable(); // Minimal tambah ini
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
