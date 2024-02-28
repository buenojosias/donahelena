<?php

namespace App\Livewire;

use App\Models\Curriculo;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class CurriculoDetalhes extends Component
{
    use Interactions;

    public $curriculo;

    public function mount(Curriculo $curriculo)
    {
        $this->curriculo = $curriculo;
        $this->curriculo->load('cargo');

        if (!$curriculo->lido)
            $curriculo->update(['lido' => true]);
    }

    public function archive()
    {
        $this->dialog()
            ->question('Arquivar currículo?', 'Ao arquivar o currículo, ele continuará cadastrado, mas não será mais visível.')
            ->confirm('Confirmar', 'confirmedArchive')
            ->cancel('Cancelar')
            ->send();
    }

    public function delete()
    {
        $this->dialog()
            ->question('Excluir', 'Deseja mesmo excluir este currículo?')
            ->confirm('Confirmar', 'confirmedDelete')
            ->cancel('Cancelar')
            ->send();
    }

    public function confirmedDelete(): void
    {
        if($this->curriculo->delete()) {
            session()->flash('status', 'Currículo excluído com sucesso.');
            $this->redirectRoute('curriculos.index', navigate: true);
        }
    }

    public function confirmedArchive(): void
    {
        if($this->curriculo->update(['arquivado' => true])) {
            session()->flash('status', 'Currículo arquivado com sucesso.');
            $this->redirectRoute('curriculos.index', navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.curriculo-detalhes');
    }
}
