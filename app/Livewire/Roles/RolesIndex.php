<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolesIndex extends Component
{
    public function render()
    {
        $data=Role::get();
        return view('livewire.roles.roles-index',compact('data'));
    }

    public function delete($id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->delete();
            flash('success', 'Role deleted successfully.');           
        } catch (\Exception $e) {
            flash()->error('Error deleting role: ' . $e->getMessage());
        }
    }
}
