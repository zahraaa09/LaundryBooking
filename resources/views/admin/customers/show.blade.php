@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Pelanggan</h2>

    <p><strong>Nama:</strong> {{ $customer->name }}</p>
    <p><strong>No HP:</strong> {{ $customer->phone }}</p>
    <p><strong>Alamat:</strong> {{ $customer->address }}</p>

    <a href="{{ route('admin.customers.index') }}">Kembali</a>
</div>
@endsection
