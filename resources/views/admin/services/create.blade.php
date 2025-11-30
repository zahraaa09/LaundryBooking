@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Layanan</h3>

    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label>Nama Layanan</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Harga per KG (Rp)</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Durasi (hari)</label>
            <input type="number" name="duration_days" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
