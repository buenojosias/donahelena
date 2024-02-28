<?php

namespace App\Livewire;

use App\Models\Cargo;
use Livewire\Attributes\On;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class CargoDetalhes extends Component
{
    use Interactions;

    #[On('cargo-salvo')]
    public function refresh()
    {
        $this->modal = false;
        $this->cargo->refresh();
        $this->dialog()->success('Successo', 'Cargo salvo com sucesso.')->send();
    }

    public $cargo;

    public $modal;

    public function mount(Cargo $cargo)
    {
        $cargo->load(['clientes','curriculos']);
        $this->cargo = $cargo;
    }

    public function delete()
    {
        $this->dialog()
            ->question('Excluir', 'Deseja mesmo excluir este cargo?')
            ->confirm('Confirmar', 'confirmedDelete')
            ->cancel('Cancelar')
            ->send();
    }

    public function confirmedDelete(): void
    {
        if($this->cargo->delete()) {
            session()->flash('status', 'Cargo excluído com sucesso.');
            $this->redirectRoute('cargos.index', navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.cargo-detalhes');
    }
}
