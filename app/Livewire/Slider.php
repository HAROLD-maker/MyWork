<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Slider as SliderModel;

class Slider extends Component
{
    public function render()
    {
        $images = SliderModel::orderBy('order')->get();
        return view('livewire.slider', compact('images'));
    }
}
