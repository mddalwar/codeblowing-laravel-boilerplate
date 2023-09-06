<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\User;
use Spatie\Permission\Models\Role;

class Add extends Component
{
    public $title = "Add User";

    #[Rule('required')]
    public $name = null;

    #[Rule('required|email')]
    public $email = null;

    #[Rule('required|confirmed')]
    public $password = null;

    #[Rule('required')]
    public $password_confirmation = null;

    #[Rule('required')]
    public $role = null;

    public $roles = null;

    public function mount(){
        $this->roles = Role::all();
    }
    
    public function render()
    {
        return view('livewire.users.add');
    }

    public function save(){
        $validated = $this->validate([ 
            'name'                   => 'required|min:3',
            'email'                  => 'required|email|unique:users',
            'role'                   => 'required',
            'password'               => 'required|confirmed',
            'password_confirmation'  => 'required',
        ]);
 
        $user = User::create($validated);
        $user->assignRole($this->role);

        return redirect()->route('users.index');
    }
}
