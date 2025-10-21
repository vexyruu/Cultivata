<?php

namespace App\Livewire;
use App\Models\Plant;

use Livewire\Component;

class PlantDetail extends Component
{
    public Plant $plant;

    public function mount(Plant $plant){
        $this->plant = $plant;
    }
    public function render()
    {
        return view('livewire.plant-detail')
                ->layout('layouts.app', ['title' => $this->plant->name]);
    }
}
