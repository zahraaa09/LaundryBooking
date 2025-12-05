@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6 max-w-lg">
    <h1 class="text-2xl font-bold mb-4">Tambah Pesanan Laundry</h1>

    <form action="{{ route('admin.orders.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="font-semibold">Customer</label>
            <select name="customer_id" class="w-full border px-3 py-2 rounded" required>
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="font-semibold">Layanan</label>
            <select name="service_id" class="w-full border px-3 py-2 rounded" required>
                @foreach($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }} - Rp{{ number_format($service->price, 0) }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="font-semibold">Berat (Kg)</label>
            <input type="number" step="0.1" name="weight" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
            <label class="font-semibold">Catatan (opsional)</label>
            <textarea name="notes" class="w-full border px-3 py-2 rounded"></textarea>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
    </form>
</div>
@endsection
