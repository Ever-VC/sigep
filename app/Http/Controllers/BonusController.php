<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Bonus;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        return view('bonuses.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        \App\Models\Bonus::create($validated);

        return redirect()->route('employees.index')->with('success', 'Bono asignado correctamente.');

}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bonus = Bonus::findOrFail($id);
        return view('bonuses.show', compact('bonus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
