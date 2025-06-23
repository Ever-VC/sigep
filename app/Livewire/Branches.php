<?php

namespace App\Livewire;

use App\Models\Branch;
use Livewire\Component;

class Branches extends Component
{
    public $branches, $name, $address, $branch_id;
    public $isEditing = false;

    protected $rules = [
        'name' => 'required|string|max:100',
        'address' => 'nullable|string|max:255',
    ];

    public function render()
    {
        $this->branches = Branch::all();
        return view('livewire.branches');
    }

    public function save()
    {
        $this->validate();

        Branch::create([
            'name' => $this->name,
            'address' => $this->address,
        ]);

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        $this->branch_id = $branch->id;
        $this->name = $branch->name;
        $this->address = $branch->address;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate();

        $branch = Branch::findOrFail($this->branch_id);
        $branch->update([
            'name' => $this->name,
            'address' => $this->address,
        ]);

        $this->resetInputFields();
    }

    public function delete($id)
    {
        Branch::findOrFail($id)->delete();
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->address = '';
        $this->branch_id = null;
        $this->isEditing = false;
    }
}
