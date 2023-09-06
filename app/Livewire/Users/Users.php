<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    public $title = 'All Users';

    public $users = null;

    public function deleteUser(User $user) 
    {
        if(is_null(auth()->user())){
            return false;
        }

        $user->delete();
        $this->users = User::all();
        session()->flash('success', 'User has been deleted !');
    }

    public function mount(){
        $this->users = User::all();
    }
    
    public function render()
    {
        return view('livewire.users.users');
    }
}
