<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeliveryForm extends Component
{
    public $inputs = [0];
    public $i = 0;

    public function add()
    {
        $this->i++;
        $this->inputs[] = $this->i;
    }

    public function remove($i)
    {
        unset($this->inputs[array_search($i, $this->inputs)]);
    }

    public function render()
    {
        return view('livewire.delivery-form');
    }
}
