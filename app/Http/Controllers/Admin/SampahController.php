<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sampah;
use App\Models\Warga;
use App\Models\Beban;

class SampahController extends Controller
{
    public function index()
    {
        return view('admin.sampah-input');
    }

    public function store(Request $request)
    {
        $warga = Warga::firstOrCreate([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
        ]);

        $hargaMap = [
            'Plastik'=>3000,
            'Kaca'=>1500,
            'Logam'=>10000,
            'Karet'=>2000,
            'Elektronik'=>50000,
            'Styrofoam'=>500
        ];

        $harga = $hargaMap[$request->jenis] ?? 0;
        $total = $harga * $request->berat;
        $poin = floor($request->berat); // bisa diganti rumus reward poin

        Sampah::create([
            'warga_id'=>$warga->id,
            'jenis'=>$request->jenis,
            'tgl_setor'=>now(),
            'harga'=>$harga,
            'berat'=>$request->berat,
            'total'=>$total,
            'poin'=>$poin,
            'tgl_kirim'=>$request->tgl_kirim,
            'status'=>$request->status
        ]);

        return redirect()->back()->with('success','Data berhasil disimpan');
    }

    public function list()
    {
        $sampahs = Sampah::with('warga')->get();
        return view('admin.sampah-list', compact('sampahs'));
    }

    public function laporanLabaRugi(Request $request)
    {
        $queryDate = $request->tanggal ?? null;

        $sampahs = Sampah::query();
        if($queryDate) $sampahs->whereDate('tgl_setor',$queryDate);
        $sampahs = $sampahs->get();
        $totalLaba = $sampahs->sum('total');

        $bebans = Beban::query();
        if($queryDate) $bebans->whereDate('tanggal',$queryDate);
        $bebans = $bebans->get();
        $totalRugi = $bebans->sum('jumlah');

        return view('admin.laporan-labarugi', compact('sampahs','bebans','totalLaba','totalRugi','queryDate'));
    }

    public function rewardPoin()
    {
        $wargas = Warga::with('sampahs')->get();
        return view('admin.reward-poin', compact('wargas'));
    }
}
