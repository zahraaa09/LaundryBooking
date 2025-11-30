@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pelanggan</h2>

    <form method="GET" class="mb-3">
        <input type="text" name="search" placeholder="Cari nama/nomor..." value="{{ $search }}">
        <button type="submit">Search</button>
    </form>

    <a href="{{ route('admin.customers.create') }}">+ Tambah Pelanggan</a>

    <table class="table mt-3">
        <tr>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>

        @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->phone }}</td>
            <td>
                <a href="{{ route('admin.customers.show', $customer) }}">Detail</a>
                <a href="{{ route('admin.customers.edit', $customer) }}">Edit</a>

                <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $customers->links() }}
</div>
@endsection
