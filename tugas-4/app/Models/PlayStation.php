<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayStation extends Model
{
    use HasFactory;
    protected $table = 'playstation';
    protected $fillable = [
        'jenis_konsol',
        'nomor_unit',
        'harga',
        'status',
    ];

    public static function boot()
    {
        parent::boot();

        // Set harga otomatis saat konsol dibuat
        static::creating(function ($playstation) {
            if ($playstation->jenis_konsol == 'PS3') {
                $playstation->harga = 3000;  // Harga PS3
            } elseif ($playstation->jenis_konsol == 'PS4') {
                $playstation->harga = 5000;  // Harga PS4
            } elseif ($playstation->jenis_konsol == 'PS5') {
                $playstation->harga = 8000;  // Harga PS5
            }
        });

        // Set status konsol secara otomatis saat transaksi berubah
        static::updating(function ($playstation) {
            // Cek apakah ada transaksi yang sedang berjalan
            $transaksi = \App\Models\Transaksi::where('nomor_unit', $playstation->nomor_unit)
                                              ->whereNull('waktu_selesai') // Transaksi belum selesai
                                              ->first();

            if ($transaksi) {
                // Konsol sedang dipakai
                $playstation->status = 'Dipakai';
            } else {
                // Konsol tersedia (tidak ada transaksi yang belum selesai)
                $playstation->status = 'Tersedia';
            }
        });
    }
}
