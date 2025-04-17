<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
         $newOrdersCount = Checkout::where('payment_status', 'PENDING')->count();
         $userCount = User::count();
        return view('admin.dashboard.index', compact('newOrdersCount', 'userCount'));
    }
}
