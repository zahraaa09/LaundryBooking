@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Pesanan Laundry</h1>
        <a href="{{ route('orders.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Tambah Pesanan</a>
    </div>

    <form method="GET" class="mb-4">
        <select name="status" onchange="this.form.submit()" class="border rounded px-3 py-2">
            <option value="">Semua Status</option>
            <option value="masuk">Masuk</option>
            <option value="dicuci">Dicuci</option>
            <option value="siap_diambil">Siap Diambil</option>
            <option value="selesai">Selesai</option>
        </select>
    </form>

    <table class="w-full border rounded mt-4">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-3 py-2">Customer</th>
                <th class="px-3 py-2">Layanan</th>
                <th class="px-3 py-2">Berat (Kg)</th>
                <th class="px-3 py-2">Total</th>
                <th class="px-3 py-2">Status</th>
                <th class="px-3 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="border-b">
                <td class="px-3 py-2">{{ $order->customer->name }}</td>
                <td class="px-3 py-2">{{ $order->service->name }}</td>
                <td class="px-3 py-2">{{ $order->weight_kg }} Kg</td>
                <td class="px-3 py-2">Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                <td class="px-3 py-2">{{ ucfirst($order->status) }}</td>
                <td class="px-3 py-2 flex gap-2">
                    <a href="{{ route('orders.show', $order) }}" class="text-blue-500">Detail</a>
                    <a href="{{ route('orders.edit', $order) }}" class="text-green-600">Edit</a>
                    <form method="POST" action="{{ route('orders.destroy', $order) }}">
                        @csrf @method('DELETE')
                        <button class="text-red-500" onclick="return confirm('Yakin hapus pesanan?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>
@endsection
