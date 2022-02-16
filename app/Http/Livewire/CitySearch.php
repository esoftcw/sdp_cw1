<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;

class CitySearch extends Component
{

    public $query = '';
    public $searchResults = '';
    public $city = null;
    public $name = null;

    public function selectCity($id){
        $this->query = '';
        $this->searchResults = '';
        $this->city = City::find($id);
    }


    public function updatedQuery($value){
        $this->searchResults = ($value == '') ?  '' : (new \Spatie\Searchable\Search())->registerModel(City::class, 'name')
            ->limitAspectResults(5)
            ->search($value);
    }

    public function render()
    {
        return view('livewire.city-search');
    }
}
