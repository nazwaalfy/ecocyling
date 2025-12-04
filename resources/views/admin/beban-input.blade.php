@extends('admin.layouts.app')
@section('title','Input Beban / Operasional')
@section('content')

<div class="card border-success shadow-sm">
    <div class="card-header bg-success text-white">Input Beban / Operasional</div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.beban.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama Beban</label>
                <select name="nama_beban" class="form-control" required>
                    <option value="">-- Pilih Beban --</option>
                    <option value="Gaji">Gaji</option>
                    <option value="Beli Sembako">Beli Sembako</option>
                    <option value="Listrik">Listrik</option>
                    <option value="Transport">Transport</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Jumlah</label>
                <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Rp 0" required>
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <option value="Tetap">Tetap</option>
                    <option value="Tidak Tetap">Tidak Tetap</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Keterangan (Opsional)</label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('admin.beban.list') }}" class="btn btn-primary">Lihat Semua Beban</a>
        </form>
    </div>
</div>

<script>
const jumlahInput = document.getElementById('jumlah');
jumlahInput.addEventListener('input', function(){
    let value = this.value.replace(/\D/g,'');
    if(value==='') return this.value='';
    this.value = 'Rp ' + value.replace(/\B(?=(\d{3})+(?!\d))/g,'.');
});
</script>
@endsection
