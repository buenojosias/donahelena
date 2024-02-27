<?php

namespace App\Livewire;

use App\Models\Curriculo;
use Livewire\Component;

class CurriculoDetalhes extends Component
{
    public $curriculo;

    public function mount(Curriculo $curriculo)
    {
        $this->curriculo = $curriculo;
        $this->curriculo->load('cargo');
        // alterar lido para true
    }

    public function render()
    {
        return view('livewire.curriculo-detalhes');
    }
}
