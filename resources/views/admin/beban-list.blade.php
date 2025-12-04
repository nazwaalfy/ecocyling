@extends('admin.layouts.app')
@section('title','Data Beban')

@section('content')

<h3 class="mb-4">Daftar Beban / Pengeluaran</h3>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm border-success">
    <div class="card-header bg-success text-white">
        Semua Beban
    </div>
    <div class="card-body">
        <!-- Tombol Kembali dan Input Baru -->
        <div class="mb-3">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('admin.beban.input') }}" class="btn btn-success">Input Beban Baru</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="bg-success text-white">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Beban</th>
                        <th class="text-end">Jumlah (Rp)</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bebans as $index => $b)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($b->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $b->nama_beban }}</td>
                        <td class="text-end">Rp {{ number_format($b->jumlah,0,',','.') }}</td>
                        <td>{{ $b->keterangan }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data beban.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
