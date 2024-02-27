<?php

namespace App\Livewire\Landing;

use App\Models\Cliente;
use Livewire\Attributes\Validate;
use Livewire\Component;

class HireForm extends Component
{
    public $data;

    public $cargos = [];

    #[Validate('required|string|min:5')]
    public $nome;

    #[Validate('required|min:14|max:15')]
    public $telefone;

    #[Validate('required|email')]
    public $email;

    #[Validate('required|string')]
    public $localizacao;

    #[Validate('required|integer')]
    public $cargo_id;


    public function mount($data, $cargos)
    {
        $this->data = $data;
        $this->cargos = $cargos;
    }

    public function submit() {
        $validated = $this->validate();
        Cliente::create($validated);
        $this->reset(['nome','telefone','email','localizacao','cargo_id']);
    }

    public function render()
    {
        return view('livewire.landing.hire-form');
    }
}
