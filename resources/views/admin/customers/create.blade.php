@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pelanggan</h2>

    <form action="{{ route('admin.customers.store') }}" method="POST">
        @csrf

        <label>Nama</label>
        <input type="text" name="name" required>

        <label>No HP</label>
        <input type="text" name="phone" required>

        <label>Alamat</label>
        <textarea name="address" required></textarea>

        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
