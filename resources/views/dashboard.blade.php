@extends('layouts.admin')

@section('content')
<div class="p-6">

    <h1 class="text-2xl font-semibold mb-4">📌 Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

        <div class="bg-blue-100 border border-blue-300 p-4 rounded">
            <p class="text-sm text-gray-600">Total User</p>
            <h2 class="text-2xl font-bold">{{ $totalUsers }}</h2>
        </div>

        <div class="bg-purple-100 border border-purple-300 p-4 rounded">
            <p class="text-sm text-gray-600">Total Layanan</p>
            <h2 class="text-2xl font-bold">{{ $totalServices }}</h2>
        </div>

        <div class="bg-yellow-100 border border-yellow-300 p-4 rounded">
            <p class="text-sm text-gray-600">Pesanan Pending</p>
            <h2 class="text-2xl font-bold">{{ $pendingOrders }}</h2>
        </div>

        <div class="bg-green-100 border border-green-300 p-4 rounded">
            <p class="text-sm text-gray-600">Pesanan Selesai</p>
            <h2 class="text-2xl font-bold">{{ $completedOrders }}</h2>
        </div>

    </div>

    <div class="mt-6">
        <a href="{{ route('admin.orders.index') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
           Kelola Pesanan →
        </a>
    </div>

</div>
@endsection
