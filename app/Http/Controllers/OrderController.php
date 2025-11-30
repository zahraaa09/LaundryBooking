<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;
        $orders = Order::with(['customer', 'service'])
            ->when($status, fn($q) => $q->where('status', $status))
            ->paginate(10);

        return view('orders.index', compact('orders', 'status'));
    }

    public function create()
    {
        $customers = Customer::all();
        $services = Service::all();
        return view('orders.create', compact('customers', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'service_id' => 'required',
            'weight' => 'required|numeric|min:1'
        ]);

        $service = Service::find($request->service_id);

        $order = Order::create([
            'customer_id' => $request->customer_id,
            'service_id' => $request->service_id,
            'weight' => $request->weight,
            'total_price' => $request->weight * $service->price_per_kg,
            'order_date' => now(),
            'pickup_date' => now()->addDays($service->duration)
        ]);

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $customers = Customer::all();
        $services = Service::all();
        return view('orders.edit', compact('order', 'customers', 'services'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id' => 'required',
            'service_id' => 'required',
            'weight' => 'required|numeric|min:1',
            'status' => 'required'
        ]);

        $service = Service::find($request->service_id);

        $order->update([
            'customer_id' => $request->customer_id,
            'service_id' => $request->service_id,
            'weight' => $request->weight,
            'total_price' => $request->weight * $service->price_per_kg,
            'pickup_date' => now()->addDays($service->duration),
            'status' => $request->status
        ]);

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil diperbarui!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Pesanan dihapus!');
    }
}