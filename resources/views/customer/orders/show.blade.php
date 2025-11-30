@extends('layouts.customer')

@section('content')
<div class="p-6 max-w-2xl mx-auto">

    <h1 class="text-2xl font-semibold mb-4">Detail Pesanan #{{ $order->id }}</h1>

    <div class="border rounded p-4 space-y-2">
        <p><strong>Layanan:</strong> {{ $order->service->name }}</p>
        <p><strong>Status:</strong> <span class="capitalize">{{ $order->status }}</span></p>
        <p><strong>Catatan:</strong> {{ $order->notes ?? '-' }}</p>
        <p><strong>Tanggal dibuat:</strong> {{ $order->created_at->format('d M Y') }}</p>
    </div>

    <a href="{{ route('customer.orders.index') }}"
       class="mt-6 inline-block text-blue-600 hover:underline">
       ⬅ Kembali ke Riwayat
    </a>

</div>
@endsection
