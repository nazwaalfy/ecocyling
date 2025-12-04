@extends('admin.layouts.app')
@section('title','Dashboard Admin')

@section('content')

<h3 class="mb-4">Dashboard Admin Ecocycle</h3>

<div class="row g-4">

    <!-- Total Sampah Masuk -->
    <div class="col-md-4">
        <div class="card shadow-sm border-success h-100">
            <div class="card-body text-center">
                <h5 class="mt-3 fw-bold">Total Sampah Masuk</h5>
                <h3 class="text-success">{{ $totalSampah ?? 0 }} kg</h3>
                <a href="{{ route('admin.sampah.list') }}" class="btn btn-success btn-sm mt-2">Lihat Data</a>
            </div>
        </div>
    </div>

    <!-- Total Warga Terdaftar -->
    <div class="col-md-4">
        <div class="card shadow-sm border-success h-100">
            <div class="card-body text-center">
                <h5 class="mt-3 fw-bold">Total Warga Terdaftar</h5>
                <h3 class="text-success">{{ $totalWarga ?? 0 }}</h3>
                <a href="{{ route('admin.sampah.list') }}" class="btn btn-success btn-sm mt-2">Lihat Data Warga</a>
            </div>
        </div>
    </div>

    <!-- Total Pendapatan -->
    <div class="col-md-4">
        <div class="card shadow-sm border-success h-100">
            <div class="card-body text-center">
                <h5 class="mt-3 fw-bold">Total Pendapatan</h5>
                <h3 class="text-success">Rp {{ number_format($totalPendapatan ?? 0,0,',','.') }}</h3>
                <a href="{{ route('admin.laparugi') }}" class="btn btn-success btn-sm mt-2">Lihat Laporan</a>
            </div>
        </div>
    </div>

</div>

<!-- Riwayat Aktivitas -->
<div class="card shadow-sm border-success mt-5">
    <div class="card-header bg-success text-white fw-bold">Riwayat Aktivitas Admin</div>
    <div class="card-body">
        @if(isset($riwayat) && count($riwayat) > 0)
        <ul class="list-group">
            @foreach($riwayat as $r)
            <li class="list-group-item">{{ $r }}</li>
            @endforeach
        </ul>
        @else
        <p class="text-center text-muted mb-0">Belum ada aktivitas.</p>
        @endif
    </div>
</div>

@endsection
