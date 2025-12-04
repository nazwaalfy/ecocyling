@extends('admin.layouts.app')

@section('title', 'Laporan Transaksi Warga')

@section('content')
<h2>Laporan Transaksi Warga</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Warga</th>
            <th>Jenis Sampah</th>
            <th>Jumlah (kg)</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Budi</td>
            <td>Plastik</td>
            <td>10</td>
            <td>2025-12-03</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Siti</td>
            <td>Kertas</td>
            <td>5</td>
            <td>2025-12-03</td>
        </tr>
    </tbody>
</table>
@endsection
