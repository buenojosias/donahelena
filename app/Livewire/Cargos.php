<?php

namespace App\Livewire;

use App\Models\Cargo;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use TallStackUi\Traits\Interactions;

class Cargos extends Component
{
    use WithPagination;
    use Interactions;

    #[On('cargo-salvo')]
    public function refresh()
    {
        $this->modal = false;
        $this->render();
        $this->dialog()->success('Successo', 'Cargo salvo com sucesso.')->send();
    }

    public $modal;

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
