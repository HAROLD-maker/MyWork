<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class ResultsGrid extends Component
{
    public $filters = [
        'nombre' => '',
        'ubicacion' => '',
        'tipo' => '',
    ];

    protected $listeners = ['filtersUpdated' => 'applyFilters'];

    public function applyFilters($filters)
    {
        $this->filters = $filters;
    }

    public function render()
    {
        $query = User::query();
        if ($this->filters['nombre']) {
            $query->where('name', 'like', '%'.$this->filters['nombre'].'%');
        }
        if ($this->filters['ubicacion']) {
            $query->where('location', 'like', '%'.$this->filters['ubicacion'].'%');
        }
        if ($this->filters['tipo']) {
            $query->where('type', $this->filters['tipo']);
        }
        $users = $query->get();
        return view('livewire.results-grid', compact('users'));
    }
}
