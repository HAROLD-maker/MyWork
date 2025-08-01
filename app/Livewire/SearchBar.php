<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class SearchBar extends Component
{
    public $query = '';
    public $categoria = '';
    public $ubicacion = '';
    public $servicio_domicilio = false;
    public $categorias = [];
    public $ubicaciones = [];

    public function mount()
    {
        // Suponiendo que 'category' y 'location' son campos en users
        $this->categorias = User::query()->select('category')->distinct()->pluck('category')->filter()->values();
        $this->ubicaciones = User::query()->select('location')->distinct()->pluck('location')->filter()->values();
    }

    public function updated($propertyName)
    {
        $this->emitUp('filtersUpdated', [
            'nombre' => $this->query,
            'categoria' => $this->categoria,
            'ubicacion' => $this->ubicacion,
            'servicio_domicilio' => $this->servicio_domicilio,
        ]);
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
