<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Visit;
use App\Models\Medicine;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $stats = [
            'visits_today' => Visit::whereDate('visit_date', Carbon::today())->count(),
            'total_medicines' => Medicine::count(),
            'low_stock_count' => Medicine::all()->filter(fn($m) => $m->isLowStock())->count(),
        ];

        $recent_visits = Visit::with('student')->latest()->limit(5)->get();
        $low_stock_medicines = Medicine::all()->filter(fn($m) => $m->isLowStock())->take(5);

        return view('admin.dashboard', compact('stats', 'recent_visits', 'low_stock_medicines'));
    }
}
