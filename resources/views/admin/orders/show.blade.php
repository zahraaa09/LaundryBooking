@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6 max-w-xl">

    <h1 class="text-2xl font-bold mb-4">Detail Pesanan Laundry</h1>

    <div class="border rounded p-4 space-y-3 bg-white shadow">
        <p><strong>Customer:</strong> {{ $order->customer->name }}</p>
        <p><strong>Layanan:</strong> {{ $order->service->name }}</p>
        <p><strong>Berat:</strong> {{ $order->weight_kg }} Kg</p>
        <p><strong>Total Harga:</strong> Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
        <p><strong>Status:</strong> 
            <span class="px-2 py-1 rounded bg-gray-200">
                {{ ucfirst($order->status) }}
            </span>
        </p>
        <p><strong>Tanggal Order:</strong> {{ $order->order_date }}</p>
        <p><strong>Estimasi Selesai:</strong> {{ $order->pickup_date }}</p>
        @if($order->notes)
        <p><strong>Catatan:</strong> {{ $order->notes }}</p>
        @endif
    </div>

    <div class="flex gap-3 mt-4">
        <a href="{{ route('admin.orders.edit', $order) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Edit</a>
        
        <form action="{{ route('admin.orders.destroy', $order) }}" method="POST">
            @csrf @method('DELETE')
            <button onclick="return confirm('Yakin hapus pesanan?')" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                Hapus
            </button>
        </form>
    </div>

    <div class="mt-6">
        <a href="{{ route('admin.orders.index') }}" class="text-gray-600">&larr; Kembali</a>
    </div>
</div>
@endsection
