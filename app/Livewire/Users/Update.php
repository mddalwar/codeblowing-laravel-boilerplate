<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class Update extends Component
{
    public $title = 'Update User';

    public $user = null;

    #[Rule('required')]
    public $name = null;

    #[Rule('required|email')]
    public $email = null;

    public function mount(User $user){
        $this->user = $user;

        $this->fill( 
            $user->only('name', 'email')
        ); 
    }

    public function save(){
        $validated = $this->validate([ 
            'name'                   => 'required|min:3',
            'email'                  => 'required|email|unique:users,email,' . $this->user->id
        ]);
 
        $this->user->update($validated); 

        return redirect()->route('users.index');
    }

    public function render()
    {
        return view('livewire.users.update');
    }
}
