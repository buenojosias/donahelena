<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;

class ClienteDetalhes extends Component
{
    public $cliente;

    public function mount(Cliente $cliente)
    {
        $this->cliente = $cliente;
        $this->cliente->load('cargo');
        // alterar lido para true
    }

    public function render()
    {
        return view('livewire.cliente-detalhes');
    }
}
