<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chat extends Component
{
    public $password;
    public $email;
 
    protected $rules = [
        'password' => 'required|min:6',
        'email' => 'required|email',
    ];

    // public function updated($email)
    // {
    //     $this->validateOnly($email);
    // }

    public function updated($password)
    {
        $this->validateOnly($password);
    }
    public function saveContact()
    {
        $validatedData = $this->validate();
 
        Contact::create($validatedData);
    }
    public function render()
    {
        return view('livewire.chat');
    }
}
