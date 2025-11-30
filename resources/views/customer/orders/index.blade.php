@extends('layouts.customer')

@section('content')
<h1 class="text-xl font-semibold">Riwayat Pesanan</h1>

<table class="w-full border mt-4">
    <thead>
        <tr class="bg-gray-100">
            <th class="p-2 border">Order ID</th>
            <th class="p-2 border">Status</th>
            <th class="p-2 border">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td class="p-2 border">{{ $order->id }}</td>
            <td class="p-2 border">{{ $order->status }}</td>
            <td class="p-2 border">
                <a href="{{ route('customer.orders.show', $order->id) }}" class="text-blue-600">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@extends('layouts.customer')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-semibold mb-4">Riwayat Pesanan</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('customer.orders.create') }}"
       class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
       + Buat Pesanan Baru
    </a>

    <div class="mt-6 overflow-x-auto">
        <table class="w-full text-left border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">Order ID</th>
                    <th class="px-4 py-2 border">Layanan</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr>
                    <td class="px-4 py-2 border">{{ $order->id }}</td>
                    <td class="px-4 py-2 border">{{ $order->service->name ?? '-' }}</td>
                    <td class="px-4 py-2 border capitalize">{{ $order->status }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('customer.orders.show', $order->id) }}" class="text-blue-600 hover:underline">
                            Lihat Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-3 text-center text-gray-500">Belum ada pesanan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
