<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        $customerId = Auth::id();

        return view('customer.dashboard', [
            'totalOrders' => Order::where('customer_id', $customerId)->count(),
            'pendingOrders' => Order::where('customer_id', $customerId)
                ->where('status', 'masuk')
                ->count(),
            'completedOrders' => Order::where('customer_id', $customerId)
                ->where('status', 'selesai')
                ->count(),
        ]);
    }
}