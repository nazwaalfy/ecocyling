@extends('admin.layouts.app')
@section('title','Data Sampah Warga')
@section('content')

<h3 class="mb-3">Data Sampah Warga</h3>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm">
    <div class="card-header bg-success text-white">Daftar Sampah</div>
    <div class="card-body p-0">
        <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead class="table-success">
                <tr>
                    <th>Tanggal Setor</th>
                    <th>Nama Warga</th>
                    <th>Jenis Sampah</th>
                    <th class="text-end">Berat (kg)</th>
                    <th class="text-end">Harga/kg</th>
                    <th class="text-end">Total</th>
                    <th class="text-end">Poin</th>
                    <th>Tanggal Kirim</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sampahs as $s)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($s->tgl_setor)->format('d-m-Y') }}</td>
                    <td>{{ $s->warga->nama }}</td>
                    <td>{{ $s->jenis }}</td>
                    <td class="text-end">{{ $s->berat }}</td>
                    <td class="text-end">Rp {{ number_format($s->harga,0,',','.') }}</td>
                    <td class="text-end">Rp {{ number_format($s->total,0,',','.') }}</td>
                    <td class="text-end">{{ $s->poin }}</td>
                    <td>{{ \Carbon\Carbon::parse($s->tgl_kirim)->format('d-m-Y') }}</td>
                    <td>{{ $s->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>

<a href="{{ route('admin.sampah.input') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
