<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class UsersCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $allRoles, $roles = [];

    public function mount()
    {
        $this->allRoles = Role::all();
    }



    public  $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'roles' => 'required|array',
    ];
    public function save()
    {
        try {
            $this->validate();
            $user =   User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
            $user->syncRoles($this->roles);

            $this->reset('name', 'email', 'password', 'password_confirmation', 'roles');
            flash()->success('User created successfully.');
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            flash()->error('Error creating user: ' . $e->getMessage());
        }
    }



    public function render()
    {
        return view('livewire.users.users-create');
    }
}
