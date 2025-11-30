@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">

    <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

    {{-- STAT CARD --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">

        <div class="bg-blue-100 p-4 rounded shadow">
            <p class="text-sm text-gray-600">Total User</p>
            <h2 class="text-2xl font-bold text-blue-700">
                {{ $totalUsers }}
            </h2>
        </div>

        <div class="bg-purple-100 p-4 rounded shadow">
            <p class="text-sm text-gray-600">Total Pelanggan</p>
            <h2 class="text-2xl font-bold text-purple-700">
                {{ $totalCustomers }}
            </h2>
        </div>

        <div class="bg-green-100 p-4 rounded shadow">
            <p class="text-sm text-gray-600">Total Layanan</p>
            <h2 class="text-2xl font-bold text-green-700">
                {{ $totalServices }}
            </h2>
        </div>

        <div class="bg-yellow-100 p-4 rounded shadow">
            <p class="text-sm text-gray-600">Pesanan Pending</p>
            <h2 class="text-2xl font-bold text-yellow-700">
                {{ $pendingOrders }}
            </h2>
        </div>

    </div>

    {{-- PESANAN SELESAI --}}
    <div class="bg-white p-4 rounded shadow mb-8">
        <p class="text-sm text-gray-600">Pesanan Selesai</p>
        <h2 class="text-3xl font-bold text-green-600">
            {{ $completedOrders }}
        </h2>
    </div>

    {{-- QUICK MENU --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <a href="{{ route('admin.orders.index') }}"
           class="bg-blue-500 text-white p-4 rounded text-center hover:bg-blue-600 transition">
            📦 Kelola Pesanan
        </a>

        <a href="{{ route('admin.customers.index') }}"
           class="bg-purple-500 text-white p-4 rounded text-center hover:bg-purple-600 transition">
            👥 Kelola Pelanggan
        </a>

        <a href="{{ route('admin.services.index') }}"
           class="bg-green-500 text-white p-4 rounded text-center hover:bg-green-600 transition">
            🛠️ Kelola Layanan
        </a>

    </div>

</div>
@endsection