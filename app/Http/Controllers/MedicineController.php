<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Medicine;

class MedicineController extends Controller
{
    /**
     * Display a listing of the medicines.
     */
    public function index()
    {
        $medicines = Medicine::orderBy('name')->paginate(10);
        return view('admin.inventory.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new medicine.
     */
    public function create()
    {
        return view('admin.inventory.create');
    }

    /**
     * Store a newly created medicine in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'unit' => 'required|string|max:50',
            'low_stock_threshold' => 'required|integer|min:0',
        ]);

        Medicine::create($request->all());

        return redirect()->route('admin.inventory.index')->with('success', 'Medicine added to inventory.');
    }

    /**
     * Show the form for editing the specified medicine.
     */
    public function edit(Medicine $inventory)
    {
        return view('admin.inventory.edit', ['medicine' => $inventory]);
    }

    /**
     * Update the specified medicine in storage.
     */
    public function update(Request $request, Medicine $inventory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'unit' => 'required|string|max:50',
            'low_stock_threshold' => 'required|integer|min:0',
        ]);

        $inventory->update($request->all());

        return redirect()->route('admin.inventory.index')->with('success', 'Inventory updated successfully.');
    }

    /**
     * Remove the specified medicine from storage.
     */
    public function destroy(Medicine $inventory)
    {
        $inventory->delete();
        return redirect()->route('admin.inventory.index')->with('success', 'Medicine removed from inventory.');
    }
}
