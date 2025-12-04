@extends('admin.layouts.app')
@section('title','Input Data Sampah')
@section('content')

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card border-success shadow-sm">
    <div class="card-header bg-success text-white">Input Data Sampah</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.sampah.store') }}">
            @csrf
            {{-- Data Warga --}}
            <h5>Data Warga</h5>
            <div class="row mb-2">
                <div class="col-md-4">
                    <label>Nama Warga</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label>No Telepon</label>
                    <input type="text" name="telepon" class="form-control" required>
                </div>
            </div>

            {{-- Detail Sampah --}}
            <h5>Detail Sampah</h5>
            <div class="row mb-2">
                <div class="col-md-3">
                    <label>Jenis Sampah</label>
                    <select name="jenis" id="jenis" class="form-control" required>
                        <option value="">Pilih</option>
                        <option value="Plastik">Plastik</option>
                        <option value="Kaca">Kaca</option>
                        <option value="Logam">Logam</option>
                        <option value="Karet">Karet</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Styrofoam">Styrofoam</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Harga/kg</label>
                    <input type="text" id="harga" class="form-control" readonly>
                </div>
                <div class="col-md-3">
                    <label>Berat (kg)</label>
                    <input type="number" name="berat" id="berat" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label>Total</label>
                    <input type="text" id="total" class="form-control" readonly>
                </div>
            </div>

            {{-- Poin --}}
            <div class="row mb-2">
                <div class="col-md-3">
                    <label>Poin</label>
                    <input type="text" id="poin" class="form-control" readonly>
                </div>
            </div>

            {{-- Tanggal & Status --}}
            <div class="row mb-2">
                <div class="col-md-4">
                    <label>Tanggal Setor</label>
                    <input type="text" class="form-control" value="{{ date('d-m-Y') }}" readonly>
                </div>
                <div class="col-md-4">
                    <label>Tanggal Kirim ke Bank</label>
                    <input type="date" name="tgl_kirim" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="Terkirim">Terkirim</option>
                        <option value="Belum Terkirim">Belum Terkirim</option>
                    </select>
                </div>
            </div>

            {{-- Tombol --}}
            <button type="submit" class="btn btn-success mt-2">Simpan</button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-2">Kembali</a>
            <a href="{{ route('admin.sampah.list') }}" class="btn btn-info mt-2">Lihat Data Sampah</a>
        </form>
    </div>
</div>

{{-- Script untuk otomatisasi harga, total dan poin --}}
<script>
    const hargaMap = {
        'Plastik': 3000,
        'Kaca': 1500,
        'Logam': 10000,
        'Karet': 2000,
        'Elektronik': 50000,
        'Styrofoam': 500
    };

    const jenis = document.getElementById('jenis');
    const hargaInput = document.getElementById('harga');
    const beratInput = document.getElementById('berat');
    const totalInput = document.getElementById('total');
    const poinInput = document.getElementById('poin');

    function updateValues() {
        const jenisVal = jenis.value;
        const berat = parseFloat(beratInput.value) || 0;
        const harga = hargaMap[jenisVal] || 0;
        const total = harga * berat;
        const poin = Math.floor(berat);

        hargaInput.value = harga ? 'Rp ' + harga.toLocaleString('id-ID') : '';
        totalInput.value = total ? 'Rp ' + total.toLocaleString('id-ID') : '';
        poinInput.value = poin;
    }

    jenis.addEventListener('change', updateValues);
    beratInput.addEventListener('input', updateValues);
</script>

@endsection
