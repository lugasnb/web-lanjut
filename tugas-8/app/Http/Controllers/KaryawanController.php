<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::oldest()->paginate(10);
        return view('karyawans.index', compact('karyawans'));
    }

    public function create()
    {
        return view('karyawans.create');
    }

    public function show(Karyawan $karyawan)
    {
        return view('karyawans.show', compact('karyawan'));
    }

    public function edit(Karyawan $karyawan)
    {
        return view('karyawans.edit', compact('karyawan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:50',
            'email' => 'nullable|email|unique:karyawans,email',
            'no_telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'jabatan' => 'nullable|string|max:30',
            'tanggal_masuk' => 'nullable|date'
        ]);

        Karyawan::create($request->all());
        
        return redirect()->route('karyawans.index')
            ->with('success', 'Karyawan berhasil ditambahkan');
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:50',
            'email' => 'nullable|email|unique:karyawans,email,'.$karyawan->id,
            'no_telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'jabatan' => 'nullable|string|max:30',
            'tanggal_masuk' => 'nullable|date'
        ]);

        $karyawan->update($request->all());
        
        return redirect()->route('karyawans.index')
            ->with('success', 'Karyawan berhasil diperbarui');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        
        return redirect()->route('karyawans.index')
            ->with('success', 'Karyawan berhasil dihapus');
    }
}