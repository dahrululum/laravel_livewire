<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;

class Clicker extends Component
{
    // public function handleClick(){
    //     dump('clicked');
    // }
    use WithPagination;
    // public $username = "testuser";
    #[Rule('required|min:2|max:50')]
    public $name ='';

    #[Rule('required|email|unique:users')]
    public $email = '';

    #[Rule('required')]
    public $password = '';

    public function createUser(){
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $this->reset('name', 'email', 'password');
        request()->session()->flash('success', 'User created successfully.');
    }
    public function render()
    {
        $title = "Test";
        $users = User::paginate(5);
        return view('livewire.clicker',[
            'title' => $title,
            'users' => $users
        ]);
    }
}
