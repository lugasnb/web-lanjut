<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = [
        'kode_pelanggan',
        'nomor_unit',
        'waktu_mulai',
        'waktu_selesai',
        'total_bayar',
    ];

    // Set total_bayar otomatis
    public static function boot()
    {
        parent::boot();

        static::creating(function ($transaksi) {
            // Mengambil konsol berdasarkan nomor_unit (playstation)
            $playstation = \App\Models\Playstation::where('nomor_unit', $transaksi->nomor_unit)->first();

            if ($playstation) {
                // Hitung durasi waktu sewa
                $waktu_mulai = Carbon::parse($transaksi->waktu_mulai);
                $waktu_selesai = Carbon::parse($transaksi->waktu_selesai);
                $durasi_jam = $waktu_mulai->diffInHours($waktu_selesai);

                // Hitung total bayar berdasarkan durasi dan harga konsol
                $transaksi->total_bayar = $durasi_jam * $playstation->harga;
            }
        });
    }
}
