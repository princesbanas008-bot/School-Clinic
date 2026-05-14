<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    /**
     * Display the student dashboard.
     */
    public function index()
    {
        $user = auth()->user();
        $stats = [
            'total_visits' => $user->visits()->count(),
            'last_visit' => $user->visits()->latest('visit_date')->first(),
        ];

        return view('student.dashboard', compact('stats'));
    }
}
