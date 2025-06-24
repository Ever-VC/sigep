<?php

namespace App\Livewire\Employees;

use App\Models\Branch;
use App\Models\ContractType;
use App\Models\Employee;
use App\Models\Shift;
use Livewire\Component;
use Livewire\WithPagination;

class ManageEmployees extends Component
{
   // Inputs del formulario
    public $modoCreacion = false;
    public $first_name, $last_name, $dui, $phone, $address;
    public $birth_date, $gender, $branch_id, $contract_type_id, $shift_id;

    public $editing = false;
    public $employeeId;

    // Listas desplegables
    public $branches;
    public $contractTypes;
    public $shifts;

    // Lista de empleados
    public $employees;

    protected $rules = [
        'first_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'dui' => 'required|string|max:20|unique:employees,dui',
        'phone' => 'nullable|string|max:15',
        'address' => 'nullable|string|max:255',
        'birth_date' => 'nullable|date',
        'gender' => 'nullable|string|max:10',
        'branch_id' => 'required|exists:branches,id',
        'contract_type_id' => 'required|exists:contract_types,id',
        'shift_id' => 'required|exists:shifts,id',
    ];

    public function mount()
    {
        $this->branches = Branch::all();
        $this->contractTypes = ContractType::all();
        $this->shifts = Shift::all();

            if (!$this->modoCreacion) {
        $this->loadEmployees();
    }
    }

    public function loadEmployees()
    {
        $this->employees = Employee::with(['branch', 'contractType', 'shift'])->latest()->get();
    }

    public function render()
    {
    return view('livewire.employees.manage-employees');
    }

    public function store()
    {
        $this->validate();

        Employee::create($this->formData());

        session()->flash('message', 'Empleado creado correctamente.');

        $this->resetForm();
        $this->loadEmployees();
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $this->employeeId = $employee->id;
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

        $this->editing = true;
    }

    public function update()
    {
        $this->validate([
            ...$this->rules,
            'dui' => 'required|string|max:20|unique:employees,dui,' . $this->employeeId,
        ]);

        $employee = Employee::findOrFail($this->employeeId);
        $employee->update($this->formData());

        session()->flash('message', 'Empleado actualizado correctamente.');

        $this->resetForm();
        $this->loadEmployees();
    }

    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        session()->flash('message', 'Empleado eliminado correctamente.');
        $this->loadEmployees();
    }

    public function cancel()
    {
        $this->resetForm();
    }

    private function formData()
    {
        return [
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
        ];
    }

    private function resetForm()
    {
        $this->reset([
            'first_name', 'last_name', 'dui', 'phone', 'address',
            'birth_date', 'gender', 'branch_id', 'contract_type_id', 'shift_id',
            'editing', 'employeeId',
        ]);
    }
}
