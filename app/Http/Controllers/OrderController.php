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

        return view('admin.orders.index', compact('orders', 'status'));
    }

    public function create()
    {
        $customers = Customer::all();
        $services = Service::all();
        return view('admin.orders.create', compact('customers', 'services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_id'  => 'required|exists:services,id',
            'weight'      => 'required|numeric|min:1',
        ]);

        $service = Service::findOrFail($validated['service_id']);

        Order::create([
            'customer_id' => $validated['customer_id'],
            'service_id'  => $validated['service_id'],
            'weight'      => $validated['weight'],              // <— sesuai DB
            'total_price' => $validated['weight'] * $service->price,
            'order_date'  => now(),
            'pickup_date' => now()->addDays($service->duration_days),
            'status'      => 'Masuk',                             // <— sesuai ENUM
        ]);

        return redirect()->route('admin.orders.index')
            ->with('success', 'Pesanan berhasil dibuat!');
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $customers = Customer::all();
        $services = Service::all();
        return view('admin.orders.edit', compact('order', 'customers', 'services'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_id'  => 'required|exists:services,id',
            'weight'   => 'required|numeric|min:1',
            'status'      => 'required|in:masuk,dicuci,siap_diambil,selesai',
            'notes'       => 'nullable|string'
        ]);

        $service = Service::findOrFail($validated['service_id']);

        $oldStatus = $order->status;

        $order->update([
            'customer_id' => $validated['customer_id'],
            'service_id'  => $validated['service_id'],
            'weight'   => $validated['weight'],
            'total_price' => $validated['weight'] * $service->price,
            'pickup_date' => now()->addDays($service->duration_days),
            'status'      => $validated['status'],
            'notes'       => $validated['notes'] ?? null,
        ]);

        if ($validated['status'] === 'siap_diambil' && $oldStatus !== 'siap_diambil') {

            $user = $order->customer->user;

            $message = "Halo {$user->name} 👋

    Pesanan laundry kamu sudah *SIAP DIAMBIL* ✅

    🧾 ID: {$order->id}
    📍 Silakan datang ke outlet untuk pengambilan.

    Terima kasih 🙏";

            kirimWA($user->phone, $message);
        }

        return redirect()->route('admin.orders.index')
            ->with('success', 'Pesanan berhasil diperbarui!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Pesanan dihapus!');
    }
}