<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Livewire\Component;

class EditEmployee extends Component
{
    public Employee $employee;

    public $first_name, $last_name, $dui, $phone, $address;
    public $birth_date, $gender, $branch_id, $contract_type_id, $shift_id;
    public $branches, $contractTypes, $shifts;

    public function mount(Employee $employee)
    {
        $this->employee = $employee;

        $this->first_name = $employee->first_name;
        $this->last_name = $employee->last_name;
        $this->dui = $employee->dui;
        $this->phone = $employee->phone;
        $this->address = $employee->address;
        $this->birth_date = $employee->birth_date;
        $this->gender = $employee->gender;
        $this->branch_id = $employee->branch_id;
        $this->contract_type_id = $employee->contract_type_id;
        $this->shift_id = $employee->shift_id;

        $this->branches = \App\Models\Branch::all();
        $this->contractTypes = \App\Models\ContractType::all();
        $this->shifts = \App\Models\Shift::all();
    }

    public function update()
    {
        $this->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'dui' => 'required|string|max:20|unique:employees,dui,' . $this->employee->id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|string|max:10',
            'branch_id' => 'required|exists:branches,id',
            'contract_type_id' => 'required|exists:contract_types,id',
            'shift_id' => 'required|exists:shifts,id',
        ]);

        $this->employee->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'dui' => $this->dui,
            'phone' => $this->phone,
            'address' => $this->address,
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
            'branch_id' => $this->branch_id,
            'contract_type_id' => $this->contract_type_id,
            'shift_id' => $this->shift_id,
        ]);

        session()->flash('message', 'Empleado actualizado correctamente.');
        return redirect()->route('employees.index');
    }

    public function render()
    {
    return view('livewire.employees.edit-employee');
    }
}
