<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'dui' => 'required|string|max:10|unique:employees,dui',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'branch_id' => 'required|exists:branches,id',
            'contract_type_id' => 'required|exists:contract_types,id',
            'shift_id' => 'required|exists:shifts,id',
        ]);

        Employee::create($validated);
        return redirect()->route('employees.index')->with('success', 'Empleado creado con éxito.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'dui' => 'required|string|max:10|unique:employees,dui,' . $employee->id,
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'branch_id' => 'required|exists:branches,id',
            'contract_type_id' => 'required|exists:contract_types,id',
            'shift_id' => 'required|exists:shifts,id',
        ]);

        $employee->update($validated);
        return redirect()->route('employees.index')->with('success', 'Empleado actualizado con éxito.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Empleado eliminado.');
    }
}
