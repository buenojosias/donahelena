<?php

namespace App\Livewire;

use App\Models\Cargo;
use Livewire\Component;
use Livewire\WithPagination;

class Cargos extends Component
{
    use WithPagination;

    public function render()
    {
        $cargos = Cargo::query()
            ->withCount('clientes')
            ->withCount('curriculos')
            ->orderBy('nome_pt')
            ->paginate();

        return view('livewire.cargos', compact('cargos'));
    }
}
