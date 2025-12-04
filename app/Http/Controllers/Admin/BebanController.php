<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Beban;

class BebanController extends Controller
{
    // Halaman input beban
    public function input()
    {
        return view('admin.beban-input');
    }

    // Simpan data beban
    public function store(Request $request)
    {
        // Bersihkan format Rp menjadi integer
        $jumlah = str_replace(['Rp', '.', ','], '', $request->jumlah);

        // Validasi input
        $request->validate([
            'kategori' => 'required',
            'nama_beban' => 'required',
            'jumlah' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        Beban::create([
            'kategori' => $request->kategori,       // Tetap / Variabel
            'nama_beban' => $request->nama_beban,   // Nama beban
            'jumlah' => $jumlah,                     // integer
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    // Lihat semua beban
    public function list()
    {
        $bebans = Beban::orderBy('tanggal', 'desc')->get();
        return view('admin.beban-list', compact('bebans'));
    }
}
