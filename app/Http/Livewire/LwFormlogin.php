<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LwFormlogin extends Component
{
    public $show_password=false;
    public $password;
 
    public function render()
    {
        return view('livewire.lw-formlogin');
    }
}
