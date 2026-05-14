<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Visit;
use App\Models\User;
use Carbon\Carbon;

class VisitController extends Controller
{
    /**
     * Display a listing of all visits (Admin).
     */
    public function index(Request $request)
    {
        $query = Visit::with('student')->latest();

        if ($request->has('date')) {
            $query->whereDate('visit_date', $request->date);
        }

        $visits = $query->paginate(10);

        return view('admin.visits.index', compact('visits'));
    }

    /**
     * Show the form for creating a new visit (Admin).
     */
    public function create()
    {
        $students = User::where('role', 'student')->orderBy('name')->get();
        return view('admin.visits.create', compact('students'));
    }

    /**
     * Store a newly created visit in storage (Admin).
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'visit_date' => 'required|date',
            'symptoms' => 'required|string',
            'diagnosis' => 'required|string',
            'treatment' => 'required|string',
        ]);

        Visit::create($request->all());

        return redirect()->route('admin.visits.index')->with('success', 'Visit recorded successfully.');
    }

    /**
     * Display the student's own health visit history.
     */
    public function studentHistory()
    {
        $visits = auth()->user()->visits()->latest()->paginate(10);
        return view('student.visits.history', compact('visits'));
    }
}
