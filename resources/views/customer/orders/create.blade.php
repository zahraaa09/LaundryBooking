@extends('layouts.customer')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-semibold mb-4">Buat Pesanan</h1>

    <form action="{{ route('customer.orders.store') }}" method="POST" class="space-y-4">
        @csrf
        
        <div>
            <label class="block font-medium mb-1">Pilih Layanan</label>
            <select name="service_id" class="w-full border-gray-300 rounded p-2 focus:ring-blue-400">
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }} - Rp{{ $service->price }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-medium mb-1">Catatan (Opsional)</label>
            <textarea name="notes" class="w-full border-gray-300 p-2 rounded" rows="3"></textarea>
        </div>

        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded transition">
            Buat Pesanan
        </button>
    </form>
</div>
@endsection
