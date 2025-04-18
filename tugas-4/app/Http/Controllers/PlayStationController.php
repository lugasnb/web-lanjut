<?php

namespace App\Http\Controllers;

use App\Models\PlayStation;
use Illuminate\Http\Request;

class PlayStationController extends Controller
{
    public function index()
    {
        $playstations = PlayStation::all();
        return view('playstation.index', compact('playstations'));
    }

    public function create()
    {
        return view('playstation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_konsol' => 'required|in:PS3,PS4,PS5',
            'nomor_unit'   => 'required|unique:playstation',
            'status'       => 'nullable|string',
        ]);

        PlayStation::create($request->all());

        return redirect()->route('playstation.index')->with('success', 'Data PlayStation berhasil ditambahkan');
    }

    public function show(PlayStation $playstation)
    {
        return view('playstation.show', compact('playstation'));
    }

    public function edit(PlayStation $playstation)
    {
        return view('playstation.edit', compact('playstation'));
    }

    public function update(Request $request, PlayStation $playstation)
    {
        $request->validate([
            'jenis_konsol' => 'required|in:PS3,PS4,PS5',
            'nomor_unit'   => 'required|unique:playstation,nomor_unit,' . $playstation->id,
            'status'       => 'nullable|string',
        ]);

        $playstation->update($request->all());

        return redirect()->route('playstation.index')->with('success', 'Data PlayStation berhasil diperbarui');
    }

    public function destroy(PlayStation $playstation)
    {
        $playstation->delete();

        return redirect()->route('playstation.index')->with('success', 'Data PlayStation berhasil dihapus');
    }
}
