@extends('layouts.customer')

@section('content')
<div class="p-6">

    <h1 class="text-2xl font-semibold mb-4">👋 Halo, {{ auth()->user()->name }}!</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <div class="bg-blue-100 border border-blue-300 p-4 rounded">
            <p class="text-sm text-gray-600">Total Pesanan</p>
            <h2 class="text-2xl font-bold">{{ $totalOrders }}</h2>
        </div>

        <div class="bg-yellow-100 border border-yellow-300 p-4 rounded">
            <p class="text-sm text-gray-600">Menunggu Proses</p>
            <h2 class="text-2xl font-bold">{{ $pendingOrders }}</h2>
        </div>

        <div class="bg-green-100 border border-green-300 p-4 rounded">
            <p class="text-sm text-gray-600">Selesai</p>
            <h2 class="text-2xl font-bold">{{ $completedOrders }}</h2>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('customer.orders.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
           + Buat Pesanan Baru
        </a>
    </div>

</div>
@endsection
