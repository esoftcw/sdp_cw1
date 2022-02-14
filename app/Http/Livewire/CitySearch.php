<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;

class CitySearch extends Component
{

    public $query = '';
    public $searchResults = '';
    public $name;

    public $city_id = null;
    public $city = null;

    public function selectCity($id, $name){
        $this->query = '';
        $this->searchResults = '';
        $this->city_id = $id;
        $this->city = $name;
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
