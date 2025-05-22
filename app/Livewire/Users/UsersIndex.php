<?php

namespace App\Livewire\Users;
use App\Models\User;

use Livewire\Component;

class UsersIndex extends Component
{
    public $status = 'active';


    public function render()
    {
        $users=User::get();
        return view('livewire.users.users-index',compact('users'));
    }

    public function toggleStatus($userId)
    {
        $user = User::find($userId);
    
        if ($user) {
            $user->status = $user->status === 'active' ? 'passive' : 'active';
            $user->save();
        }
    }
    
    public function delete($id)
    {
        try {
            $user = User::find($id);
            if ($user) {
                $user->delete();
                flash()->success('User deleted successfully.');
            } else {
                flash()->error('User not found.');
            }
        } catch (\Exception $e) {
            flash()->error('Error deleting user: ' . $e->getMessage());
        }
    }
        
}
