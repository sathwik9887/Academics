<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Courses;
use App\Models\User;
use App\Models\Teachers;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $newTeachers = Teachers::where('status', 'ACTIVE')->count();
    $newCourses = Courses::where('status', 'ACTIVE')->count();
    $userCount = User::count();

    $sales = Checkout::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as total")
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        $teachersMonthly = Teachers::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as total")
        ->groupBy('month')
        ->orderBy('month')
        ->get();


    $coursesMonthly = Courses::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as total")
        ->groupBy('month')
        ->orderBy('month')
        ->get();


    $usersMonthly = User::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as total")
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        $months = collect()
        ->merge($sales->pluck('month'))
        ->merge($teachersMonthly->pluck('month'))
        ->merge($coursesMonthly->pluck('month'))
        ->merge($usersMonthly->pluck('month'))
        ->unique()
        ->sort()
        ->values()
        ->map(fn($m) => $m . '-01');

    $categories = $sales->pluck('month')->map(fn($m) => $m . '-01')->toArray();
    $orders = $sales->pluck('total')->toArray();

     $ordersData = $months->map(fn($month) => $sales->firstWhere('month', substr($month, 0, 7))?->total ?? 0);
    $teachersData = $months->map(fn($month) => $teachersMonthly->firstWhere('month', substr($month, 0, 7))?->total ?? 0);
    $coursesData = $months->map(fn($month) => $coursesMonthly->firstWhere('month', substr($month, 0, 7))?->total ?? 0);
    $usersData = $months->map(fn($month) => $usersMonthly->firstWhere('month', substr($month, 0, 7))?->total ?? 0);

    $chartData = [
        'categories' => $months,
        'series' => [
            ['name' => 'Orders', 'data' => $ordersData],
            ['name' => 'Teachers', 'data' => $teachersData],
            ['name' => 'Courses', 'data' => $coursesData],
            ['name' => 'Users', 'data' => $usersData],
        ],
    ];

    return view('admin.dashboard.index', compact('userCount', 'newCourses', 'newTeachers', 'chartData'));
}




}
