@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6 max-w-lg">
    <h1 class="text-2xl font-bold mb-4">Edit Pesanan Laundry</h1>

    <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="font-semibold">Customer</label>
            <select name="customer_id" class="w-full border px-3 py-2 rounded" required>
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                    {{ $customer->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="font-semibold">Layanan</label>
            <select name="service_id" class="w-full border px-3 py-2 rounded" required>
                @foreach($services as $service)
                <option value="{{ $service->id }}" {{ $order->service_id == $service->id ? 'selected' : '' }}>
                    {{ $service->name }} - Rp{{ number_format($service->price, 0) }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="font-semibold">Berat (Kg)</label>
            <input type="number" step="0.1" name="weight_kg" value="{{ $order->weight_kg }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
            <label class="font-semibold">Status</label>
            <select name="status" class="w-full border px-3 py-2 rounded">
                @foreach(['masuk','dicuci','siap_diambil','selesai'] as $st)
                <option value="{{ $st }}" {{ $order->status == $st ? 'selected' : '' }}>
                     {{ ucwords(str_replace('_',' ',$st)) }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="font-semibold">Catatan</label>
            <textarea name="notes" class="w-full border px-3 py-2 rounded">{{ $order->notes }}</textarea>
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
    </form>
</div>
@endsection
