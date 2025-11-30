<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerOrderController extends Controller
{
    public function index()
    {
        $customerId = Auth::id();

        $orders = Order::where('customer_id', $customerId)
            ->latest()
            ->paginate(10);

        return view('customer.orders.index', compact('orders'));
    }

    public function create()
    {
        $services = Service::all();
        return view('customer.orders.create', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'weight_kg' => 'required|numeric|min:1',
            'notes' => 'nullable|string'
        ]);

        $service = Service::findOrFail($validated['service_id']);

        Order::create([
            'customer_id' => Auth::id(),
            'service_id' => $service->id,
            'weight_kg' => $validated['weight_kg'],
            'total_price' => $validated['weight_kg'] * $service->price,
            'pickup_date' => now()->addDays($service->duration_days),
            'order_date' => now(),
            'status' => 'masuk',
            'notes' => $validated['notes']
        ]);

        return redirect()->route('customer.orders.index')
            ->with('success', 'Pesanan berhasil dibuat!');
    }

    public function show($id)
    {
        $order = Order::where('id', $id)
            ->where('customer_id', Auth::id())
            ->firstOrFail();

        return view('customer.orders.show', compact('order'));
    }

    public function cancel($id)
    {
        $order = Order::where('id', $id)
            ->where('customer_id', Auth::id())
            ->firstOrFail();

        if ($order->status !== 'Masuk') {
            return back()->with('error', 'Pesanan tidak dapat dibatalkan!');
        }

        $order->update(['status' => 'Dibatalkan']);

        return redirect()->route('customer.orders.index')->with('success', 'Pesanan berhasil dibatalkan.');
    }
}
