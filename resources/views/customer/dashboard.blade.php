@extends('layouts.app')

@section('content')
<div class="p-6 max-w-5xl mx-auto">

    <h1 class="text-2xl font-bold mb-6">
        👋 Halo, {{ auth()->user()->name }}
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">

        <div class="bg-blue-100 p-4 rounded shadow">
            <p class="text-sm text-gray-600">Total Pesanan</p>
            <h2 class="text-2xl font-bold text-blue-700">
                {{ $totalOrders }}
            </h2>
        </div>

        <div class="bg-yellow-100 p-4 rounded shadow">
            <p class="text-sm text-gray-600">Dalam Proses</p>
            <h2 class="text-2xl font-bold text-yellow-700">
                {{ $pendingOrders }}
            </h2>
        </div>

        <div class="bg-green-100 p-4 rounded shadow">
            <p class="text-sm text-gray-600">Selesai</p>
            <h2 class="text-2xl font-bold text-green-700">
                {{ $completedOrders }}
            </h2>
        </div>

    </div>

    <div class="flex gap-4">

        <a href="{{ route('customer.orders.create') }}"
           class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
           + Buat Pesanan
        </a>

        <a href="{{ route('customer.orders.index') }}"
           class="px-6 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
           📜 Riwayat Pesanan
        </a>

    </div>

</div>
@endsection