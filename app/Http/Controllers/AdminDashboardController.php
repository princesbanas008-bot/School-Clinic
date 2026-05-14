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

        return view('admin.dashboard', compact('stats'));
    }
}
