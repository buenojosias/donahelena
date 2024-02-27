<?php

namespace App\Livewire;

use App\Models\Curriculo;
use Livewire\Component;
use Livewire\WithPagination;

class Curriculos extends Component
{
    use WithPagination;

    public function render()
    {
        $curriculos = Curriculo::query()
            ->with('cargo')
            ->orderByDesc('id')
            ->paginate();

        return view('livewire.curriculos', compact('curriculos'));
    }
}
