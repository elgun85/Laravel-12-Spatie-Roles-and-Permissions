<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolesShow extends Component
{
  
    public $role;
    public $allpermissions = [];

    public function mount($id)
    {
      
        $this->role = Role::find($id);
        $this->allpermissions = $this->role->permissions->pluck('name');
        
        

    }
    public function render()
    {
        return view('livewire.roles.roles-show');
    }
}
