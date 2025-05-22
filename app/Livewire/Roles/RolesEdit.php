<?php

namespace App\Livewire\Roles;

use Spatie\Permission\Models\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolesEdit extends Component
{
    public $name, $role;
    public $permissions = [];
    public $allpermissions = [];

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:roles,name,' . $this->role->id,
            'permissions' => 'array',
        ];
    }
    
    public function mount($id)
    {
        $this->role = Role::find($id);
        $this->allpermissions = Permission::get();
       
        $this->name = $this->role->name;
        $this->permissions = $this->role->permissions->pluck('name');
        
        
    }

    public function save()
    {
        try {
            $this->validate();
            $this->role->name = $this->name;
            $this->role->syncPermissions($this->permissions);
            $this->role->save();
            $this->reset(['name', 'permissions']);
           flash()->success( 'Role updated successfully.');
        } catch (\Exception $e) {
            flash()->error( 'Error updating role: ' . $e->getMessage());
        }
        redirect()->route('roles.index');
    }

    public function render()
    {
        return view('livewire.roles.roles-edit');
    }
}
