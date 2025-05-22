<?php

namespace App\Livewire\Users;
use App\Models\User;

use Livewire\Component;

class UsersShow extends Component
{
    public $user;

    public function mount($id)
    {
        $this->user = User::find($id);
        if (!$this->user) {
            abort(404);
        }
    }
    public function render()
    {
        return view('livewire.users.users-show');
    }
}
