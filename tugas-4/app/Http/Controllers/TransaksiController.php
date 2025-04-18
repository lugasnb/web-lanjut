<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\PlayStation;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('playstation')->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $playstations = PlayStation::where('status', 'tersedia')->get();
        return view('transaksi.create', compact('pelanggans', 'playstations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_pelanggan' => 'required|exists:pelanggan,kode_pelanggan',
            'nomor_unit'     => 'required|exists:playstation,nomor_unit',
            'waktu_mulai'    => 'required|date',
            'waktu_selesai'  => 'required|date|after:waktu_mulai',
        ]);

        $playstation = PlayStation::where('nomor_unit', $request->nomor_unit)->first();

        // Hitung durasi dan total bayar
        $start = Carbon::parse($request->waktu_mulai);
        $end = Carbon::parse($request->waktu_selesai);
        $durationInHours = ceil($start->floatDiffInHours($end)); // dibulatkan ke atas

        $total_bayar = $durationInHours * $playstation->harga;

        // Buat transaksi
        $transaksi = Transaksi::create([
            'kode_pelanggan' => $request->kode_pelanggan,
            'nomor_unit'     => $request->nomor_unit,
            'waktu_mulai'    => $request->waktu_mulai,
            'waktu_selesai'  => $request->waktu_selesai,
            'total_bayar'    => $total_bayar,
        ]);

        // Ubah status PS jadi "sedang dipakai"
        $playstation->status = 'sedang dipakai';
        $playstation->save();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dibuat');
    }

    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        $pelanggans = Pelanggan::all();
        $playstations = PlayStation::all();
        return view('transaksi.edit', compact('transaksi', 'pelanggans', 'playstations'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'kode_pelanggan' => 'required|exists:pelanggan,kode_pelanggan',
            'nomor_unit'     => 'required|exists:playstation,nomor_unit',
            'waktu_mulai'    => 'required|date',
            'waktu_selesai'  => 'required|date|after:waktu_mulai',
        ]);

        $playstation = PlayStation::where('nomor_unit', $request->nomor_unit)->first();
        $start = Carbon::parse($request->waktu_mulai);
        $end = Carbon::parse($request->waktu_selesai);
        $durationInHours = ceil($start->floatDiffInHours($end));

        $total_bayar = $durationInHours * $playstation->harga;

        $transaksi->update([
            'kode_pelanggan' => $request->kode_pelanggan,
            'nomor_unit'     => $request->nomor_unit,
            'waktu_mulai'    => $request->waktu_mulai,
            'waktu_selesai'  => $request->waktu_selesai,
            'total_bayar'    => $total_bayar,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui');
    }

    public function destroy(Transaksi $transaksi)
    {
        // Ubah status PS jadi tersedia
        $playstation = PlayStation::where('nomor_unit', $transaksi->nomor_unit)->first();
        if ($playstation) {
            $playstation->status = 'tersedia';
            $playstation->save();
        }

        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
