<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sampah;
use App\Models\Warga;
use App\Models\Beban;

class DashboardController extends Controller
{
    public function index()
    {
        // Total sampah masuk (kg)
        $totalSampah = Sampah::sum('berat');

        // Total warga terdaftar
        $totalWarga = Warga::count();

        // Total pendapatan (laba = total sampah - total beban)
        $totalPendapatan = Sampah::sum('total') - Beban::sum('jumlah');

        // Bisa juga ditambahkan riwayat aktivitas admin terakhir (opsional)
        $riwayat = [
            'Input Data Sampah',
            'Input Beban',
            'Lihat Laporan Laba Rugi',
            'Reward & Poin Warga'
        ];

        return view('admin.dashboard', compact('totalSampah','totalWarga','totalPendapatan','riwayat'));
    }
}
