@extends('admin.layouts.app')
@section('title','Laporan Laba Rugi')

@section('content')

<h3 class="mb-4">Laporan Laba Rugi</h3>

<!-- Form Filter Tanggal -->
<form method="GET" action="{{ route('admin.laparugi') }}" class="row g-3 mb-4">
    <div class="col-md-3">
        <label>Mulai Tanggal</label>
        <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
    </div>
    <div class="col-md-3">
        <label>Sampai Tanggal</label>
        <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
    </div>
    <div class="col-md-3 align-self-end">
        <button type="submit" class="btn btn-success">Filter</button>
        <a href="{{ route('admin.laparugi') }}" class="btn btn-secondary">Reset</a>
    </div>
</form>

<!-- Tabel Laba Rugi -->
<div class="card shadow-sm border-success">
    <div class="card-header bg-success text-white">Laporan Laba Rugi</div>
    <div class="card-body table-responsive">
        <h5 class="mb-3">Transaksi Sampah (Pendapatan)</h5>
        <table class="table table-bordered table-striped table-hover">
            <thead class="bg-success text-white">
                <tr>
                    <th>No</th>
                    <th>Nama Warga</th>
                    <th>Jenis Sampah</th>
                    <th>Berat (kg)</th>
                    <th>Harga/Kg</th>
                    <th>Total</th>
                    <th>Tanggal Setor</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sampahs as $i => $s)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $s->warga->nama }}</td>
                    <td>{{ $s->jenis }}</td>
                    <td>{{ $s->berat }}</td>
                    <td>Rp {{ number_format($s->harga,0,',','.') }}</td>
                    <td>Rp {{ number_format($s->total,0,',','.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($s->tgl_setor)->format('d-m-Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <h5 class="mt-4 mb-3">Beban / Pengeluaran</h5>
        <table class="table table-bordered table-striped table-hover">
            <thead class="bg-success text-white">
                <tr>
                    <th>No</th>
                    <th>Nama Beban</th>
                    <th>Jumlah (Rp)</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bebans as $i => $b)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $b->nama_beban }}</td>
                    <td>Rp {{ number_format($b->jumlah,0,',','.') }}</td>
                    <td>{{ $b->keterangan }}</td>
                    <td>{{ \Carbon\Carbon::parse($b->tanggal)->format('d-m-Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <h5 class="mt-4">Total Laba: Rp {{ number_format($totalLaba,0,',','.') }}</h5>
        <h5>Total Rugi: Rp {{ number_format($totalRugi,0,',','.') }}</h5>
        <h5>Saldo Bersih: Rp {{ number_format($totalLaba - $totalRugi,0,',','.') }}</h5>
    </div>
</div>

@endsection
