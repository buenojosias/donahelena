<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class ClienteDetalhes extends Component
{
    use Interactions;

    public $cliente;

    public function mount(Cliente $cliente)
    {
        $this->cliente = $cliente;
        $this->cliente->load('cargo');

        if(!$cliente->lido)
            $cliente->update(['lido' => true]);
    }

    public function archive()
    {
        $this->dialog()
            ->question('Arquivar cliente?', 'Ao arquivar o cliente, ele continuará cadastrado, mas não será mais visível.')
            ->confirm('Confirmar', 'confirmedArchive')
            ->cancel('Cancelar')
            ->send();
    }

    public function delete()
    {
        $this->dialog()
            ->question('Excluir', 'Deseja mesmo excluir este cliente?')
            ->confirm('Confirmar', 'confirmedDelete')
            ->cancel('Cancelar')
            ->send();
    }

    public function confirmedDelete(): void
    {
        if($this->cliente->delete()) {
            session()->flash('status', 'Cliente excluído com sucesso.');
            $this->redirectRoute('clientes.index', navigate: true);
        }
    }

    public function confirmedArchive(): void
    {
        if($this->cliente->update(['arquivado' => true])) {
            session()->flash('status', 'Cliente arquivado com sucesso.');
            $this->redirectRoute('clientes.index', navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.cliente-detalhes');
    }
}
