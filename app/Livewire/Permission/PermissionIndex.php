<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Livewire\WithPagination;


class PermissionIndex extends Component
{
    public $search = '';
    use WithPagination;

    public function render()
    {
        $data=Permission::query()
        ->when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->orderBy('id','desc')->paginate(5);
        return view('livewire.permission.permission-index',compact('data')) ;
    }

    public function updatingSearch()
    {
        $this->resetPage(); 
    }

    public function delete($id)
    {
        try {
            $permission = Permission::findOrFail($id);
            $permission->delete();
            flash()->success('Permission deleted successfully.');
        } catch (\Exception $e) {
            flash()->error('Error deleting permission: ' . $e->getMessage());
        }
    }

}
