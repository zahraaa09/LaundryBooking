<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        $customerId = Auth::user()->id;

        return view('customer.dashboard', [
            'orderCount' => Order::where('customer_id', $customerId)->count(),
            'activeOrders' => Order::where('customer_id', $customerId)
                ->whereNotIn('status', ['Selesai', 'Dibatalkan'])
                ->count(),
            'completedOrders' => Order::where('customer_id', $customerId)
                ->where('status', 'Selesai')
                ->count(),
            'latestOrders' => Order::where('customer_id', $customerId)
                ->latest()
                ->take(5)
                ->get()
        ]);
    }
}
