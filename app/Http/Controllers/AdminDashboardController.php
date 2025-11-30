<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use App\Models\Customer;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUsers'     => User::count(),
            'totalCustomers' => Customer::count(),
            'totalServices'  => Service::count(),
            'pendingOrders'  => Order::where('status', 'masuk')->count(),
            'completedOrders'=> Order::where('status', 'selesai')->count(),
        ]);
    }
}
