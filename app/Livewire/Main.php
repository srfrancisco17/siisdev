<?php

namespace App\Livewire;

use Livewire\Component;

class Main extends Component
{
    public $welcome = "Bienvenido, esta son tus tareas";
    protected $listeners = ["taskSaved"];
    

    public function taskSaved($message){
        session()->flash('message', $message);
    }

    public function render()
    {
        return view('livewire.main');
    }
}
