@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pelanggan</h2>

    <form action="{{ route('admin.customers.update', $customer) }}" method="POST">
        @csrf @method('PUT')

        <label>Nama</label>
        <input type="text" name="name" value="{{ $customer->name }}" required>

        <label>No HP</label>
        <input type="text" name="phone" value="{{ $customer->phone }}" required>

        <label>Alamat</label>
        <textarea name="address" required>{{ $customer->address }}</textarea>

        <button type="submit">Update</button>
    </form>
</div>
@endsection
