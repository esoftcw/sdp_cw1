<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeliveryForm extends Component
{
    public $inputs = [0];
    public $i = 0;
    public $pickup;
    public $deliveries;

    public function mount()
    {
        if($this->pickup){
            $this->deliveries = $this->pickup->deliveries;
            $this->i = count($this->deliveries) -1;
            for($x = 1; $x < count($this->deliveries); $x++){
                $this->inputs[] = $x;
            }
        }
    }

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
