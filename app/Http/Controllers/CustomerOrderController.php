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
            'weight'  => 'required|numeric|min:1',
            'notes'      => 'nullable|string'
        ]);

        $service = Service::findOrFail($validated['service_id']);

        // ✅ SIMPAN KE VARIABEL $order
        $order = Order::create([
            'customer_id' => Auth::id(),
            'service_id'  => $service->id,
            'weight'   => $validated['weight'],
            'total_price' => $validated['weight'] * $service->price,
            'pickup_date' => now()->addDays($service->duration_days),
            'order_date'  => now(),
            'status'      => 'masuk',
            'notes'       => $validated['notes'] ?? null
        ]);

        $user = auth()->user();

        // ✅ TEMPLATE PESAN WA
        $message = "Halo {$user->name} 👋

    Pesanan laundry kamu berhasil dibuat ✅

    🧾 ID: {$order->id}
    🧺 Layanan: {$service->name}
    ⚖️ Berat: {$order->weight} kg
    💰 Total: Rp " . number_format($order->total_price, 0, ',', '.') . "
    📅 Ambil: " . \Carbon\Carbon::parse($order->pickup_date)->format('d M Y') . "

    Terima kasih sudah menggunakan layanan kami 🙏";

        // ✅ KIRIM WA
        kirimWA($user->phone, $message);

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

        if ($order->status !== 'masuk') {
            return back()->with('error', 'Pesanan tidak dapat dibatalkan!');
        }

        $order->update(['status' => 'batal']);

        return redirect()->route('customer.orders.index')->with('success', 'Pesanan berhasil dibatalkan.');
    }
}
