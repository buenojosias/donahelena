<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class Clientes extends Component
{
    use WithPagination;

    public function render()
    {
        $clientes = Cliente::query()

            ->with('cargo')
            ->orderByDesc('id')
            ->paginate();

        return view('livewire.clientes', compact('clientes'));
    }
}
