<?php

namespace App\Livewire;

use Livewire\Component;

class Filters extends Component
{
    public $nombre = '';
    public $ubicacion = '';
    public $tipo = '';

    public function updated($propertyName)
    {
        $this->emitUp('filtersUpdated', [
            'nombre' => $this->nombre,
            'ubicacion' => $this->ubicacion,
            'tipo' => $this->tipo,
        ]);
    }

    public function render()
    {
        return view('livewire.filters');
    }
}
