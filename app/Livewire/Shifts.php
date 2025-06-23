<?php

namespace App\Livewire;

use App\Models\Shift;
use Livewire\Component;

class Shifts extends Component
{
    public $shifts;
    public $description;
    public $entry_time;
    public $exit_time;
    public $shift_id;
    public $modoEdicion = false;

    protected $rules = [
        'description' => 'required|string|max:100',
        'entry_time' => 'required|date_format:H:i',
        'exit_time' => 'required|date_format:H:i|after:entry_time',
    ];

    public function render()
    {
        $this->shifts = Shift::all();
        return view('livewire.shifts');
    }

    public function guardar()
    {
        $this->validate();

        Shift::create([
            'description' => $this->description,
            'entry_time' => $this->entry_time,
            'exit_time' => $this->exit_time,
        ]);

        $this->reset(['description', 'entry_time', 'exit_time']);
        session()->flash('mensaje', 'Turno creado exitosamente.');
    }

    public function editar($id)
    {
        $turno = Shift::findOrFail($id);
        $this->shift_id = $turno->id;
        $this->description = $turno->description;
        $this->entry_time = $turno->entry_time;
        $this->exit_time = $turno->exit_time;
        $this->modoEdicion = true;
    }

    public function actualizar()
    {
        $this->validate();

        $turno = Shift::findOrFail($this->shift_id);
        $turno->update([
            'description' => $this->description,
            'entry_time' => $this->entry_time,
            'exit_time' => $this->exit_time,
        ]);

        $this->reset(['description', 'entry_time', 'exit_time', 'shift_id', 'modoEdicion']);
        session()->flash('mensaje', 'Turno actualizado exitosamente.');
    }

    public function eliminar($id)
    {
        Shift::destroy($id);
        session()->flash('mensaje', 'Turno eliminado exitosamente.');
    }

    public function cancelar()
    {
        $this->reset(['description', 'entry_time', 'exit_time', 'shift_id', 'modoEdicion']);
    }
}
