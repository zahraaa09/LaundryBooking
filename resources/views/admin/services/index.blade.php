@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Layanan Laundry</h3>

    <a href="{{ route('admin.services.create') }}" class="btn btn-primary mb-3">+ Tambah Layanan</a>

    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <th>Harga/kg</th>
            <th>Durasi (hari)</th>
            <th>Aksi</th>
        </tr>

        @foreach ($services as $service)
        <tr>
            <td>{{ $service->name }}</td>
            <td>Rp {{ number_format($service->price) }}</td>
            <td>{{ $service->duration_days }} hari</td>
            <td>
                <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus layanan?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $services->links() }}
</div>
@endsection
