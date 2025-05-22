<?php

namespace App\Livewire\Permission;

use Livewire\Component;

class PermissionEdit extends Component
{
    public $name;
    
    public $permission;
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:permissions,name,' . $this->permission->id,
        ];
    }
    public function mount($id)
    {
        $this->permission = \Spatie\Permission\Models\Permission::findOrFail($id);
        $this->name = $this->permission->name;
    }

    public function save()
    {
        try {
            $this->validate();
            $this->permission->name = $this->name;
            $this->permission->save();
            flash()->success('Permission updated successfully');
        } catch (\Exception $e) {
            flash()->error('Error updating permission: ' . $e->getMessage());
        }
        return redirect()->route('permissions.index');
    }

    public function render()
    {
        return view('livewire.permission.permission-edit');
    }
}
