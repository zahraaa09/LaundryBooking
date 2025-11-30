@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Layanan</h3>

    <form action="{{ route('admin.services.update', $service) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Layanan</label>
            <input type="text" name="name" value="{{ $service->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Harga (Rp)</label>
            <input type="number" name="price" value="{{ $service->price }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Durasi (hari)</label>
            <input type="number" name="duration_days" value="{{ $service->duration_days }}" class="form-control" required>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
