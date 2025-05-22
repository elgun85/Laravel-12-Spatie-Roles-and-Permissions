<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionCreate extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255|unique:permissions,name',
        
    ];

    public function save()
    {
        try {
            $this->validate();
            Permission::create(['name' => $this->name]);
            $this->reset('name');
            flash()->success('Permission created successfully');
            return redirect()->route('permissions.index');
        } catch (\Exception $e) {
            flash()->error('Error creating permission: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.permission.permission-create');
    }
}
