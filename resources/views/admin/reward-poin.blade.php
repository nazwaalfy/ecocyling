@extends('admin.layouts.app')
@section('title','Reward & Poin Warga')

@section('content')

<h3 class="mb-4">Reward & Poin Warga</h3>

<div class="card shadow-sm border-success">
    <div class="card-header bg-success text-white">Daftar Warga & Total Poin</div>
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="bg-success text-white">
                <tr>
                    <th>No</th>
                    <th>Nama Warga</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Total Poin</th>
                </tr>
            </thead>
            <tbody>
                @forelse($wargas as $i => $w)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $w->nama }}</td>
                    <td>{{ $w->alamat }}</td>
                    <td>{{ $w->telepon }}</td>
                    <td>{{ $w->sampahs->sum('poin') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data warga.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
