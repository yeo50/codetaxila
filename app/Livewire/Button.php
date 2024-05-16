<?php

namespace App\Livewire;

use Livewire\Component;

class Button extends Component
{
    public $btn_label;
    public $btn_size;
    public function mount($btn_label = 'Click me', $btn_size = 'text-lg')
    {
        $this->btn_label = $btn_label;
        $this->btn_size = $btn_size;
    }
    public function render()
    {
        return view('livewire.button');
    }
}
