<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesCreate extends Component
{
    public $name,$permissions = [];
    public $allpermissions = [];

    protected $rules = [
        'name' => 'required|string|max:255|unique:roles,name',
        'permissions' => 'array',
    ];

    public function mount()
    {
        $this->allpermissions=Permission::get();
    }

    public function save()
    {
        try{
            $this->validate();
            $role = Role::create(['name' => $this->name]);
            $role->syncPermissions($this->permissions);
            $this->reset(['name', 'permissions']);
            flash()->success('Role created successfully');
            return redirect()->route('roles.index');
            } catch(\Exception $e){
            flash()->error('Error creating role: ' . $e->getMessage());
        }   
    }
    public function render()
    {
        return view('livewire.roles.roles-create');
    }
}
