<?php

namespace App\Livewire;

use App\Models\Cargo;
use Livewire\Attributes\Validate;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class CargoModal extends Component
{
    #[Validate()]
    public $id;

    #[Validate('required|string', as: '"Nome em português"')]
    public $nome_pt;

    #[Validate('required|string', as: '"Nome em inglês"')]
    public $nome_en;

    #[Validate('required|string', as: '"Nome em espanho"')]
    public $nome_es;

    #[Validate('required|integer|min:0', as: '"Vagas"')]
    public $vagas = 0;

    public function mount($cargo = null)
    {
        if ($cargo) {
            $this->id = $cargo->id;
            $this->nome_pt = $cargo->nome_pt;
            $this->nome_en = $cargo->nome_en;
            $this->nome_es = $cargo->nome_es;
            $this->vagas = $cargo->vagas;
        }
    }

    public function submit()
    {
        $this->validate();
        if(Cargo::query()->updateOrCreate(
            [
                'id' => $this->id
            ],
            [
                'nome_pt' => $this->nome_pt,
                'nome_en' => $this->nome_en,
                'nome_es' => $this->nome_es,
                'vagas' => $this->vagas
            ]
        )) {;
            $this->dispatch('cargo-salvo');
        }
    }

    public function render()
    {
        return view('livewire.cargo-modal');
    }
}
