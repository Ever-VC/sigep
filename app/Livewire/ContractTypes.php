<?php

namespace App\Livewire;

use App\Models\ContractType;
use Livewire\Component;

class ContractTypes extends Component
{
    public $contractTypes;
    public $description;
    public $base_salary;
    public $contract_type_id;
    public $modoEdicion = false;

    protected $rules = [
        'description' => 'required|string|max:100',
        'base_salary' => 'required|numeric|min:0',
    ];

    public function render()
    {
        $this->contractTypes = ContractType::all();
        return view('livewire.contract-types');
    }

    public function guardar()
    {
        $this->validate();

        ContractType::create([
            'description' => $this->description,
            'base_salary' => $this->base_salary,
        ]);

        $this->reset(['description', 'base_salary']);
        session()->flash('mensaje', 'Tipo de contrato creado exitosamente.');
    }

    public function editar($id)
    {
        $contrato = ContractType::findOrFail($id);
        $this->contract_type_id = $contrato->id;
        $this->description = $contrato->description;
        $this->base_salary = $contrato->base_salary;
        $this->modoEdicion = true;
    }

    public function actualizar()
    {
        $this->validate();

        $contrato = ContractType::findOrFail($this->contract_type_id);
        $contrato->update([
            'description' => $this->description,
            'base_salary' => $this->base_salary,
        ]);

        $this->reset(['description', 'base_salary', 'contract_type_id', 'modoEdicion']);
        session()->flash('mensaje', 'Tipo de contrato actualizado exitosamente.');
    }

    public function eliminar($id)
    {
        ContractType::destroy($id);
        session()->flash('mensaje', 'Tipo de contrato eliminado exitosamente.');
    }

    public function cancelar()
    {
        $this->reset(['description', 'base_salary', 'contract_type_id', 'modoEdicion']);
    }
}
