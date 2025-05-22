<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class UsersEdit extends Component
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $allRoles, $roles = [];

    public function mount($id)
    {

        $user = User::find($id);
        if ($user) {
            $this->id = $id;
            $this->name = $user->name;
            $this->email = $user->email;
        }
        $this->allRoles = Role::all();  
        $this->roles = $user->roles->pluck('name');
    }
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->id,
            'password' => 'nullable|string|min:8|confirmed',
            'roles' => 'required|array',
        ];
    }
    

    public function save()
    {

        try {
            $this->validate($this->rules());
            $user = User::find($this->id);
            if ($user) {
                $user->name = $this->name;
                $user->email = $this->email;
                if ($this->password) {
                    $user->password = Hash::make($this->password);
                }
                $user->syncRoles($this->roles);
                $user->save();
                flash()->success('User updated successfully.');
            } else {
                flash()->error('User not found.');
            }
        } catch (\Exception $e) {
            flash()->error('Error updating user: ' . $e->getMessage());
        }
        $this->reset('name', 'email', 'password', 'password_confirmation');
        return redirect()->route('users.index');
    }


    public function render()
    {
        return view('livewire.users.users-edit');
    }
}
