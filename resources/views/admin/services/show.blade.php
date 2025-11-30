@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Layanan</h3>

    <p><strong>Nama:</strong> {{ $service->name }}</p>
    <p><strong>Harga:</strong> Rp {{ number_format($service->price) }}</p>
    <p><strong>Durasi:</strong> {{ $service->duration_days }} hari</p>

    <a href="{{ route('services.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
