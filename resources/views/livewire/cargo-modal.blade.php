<form wire:submit="submit" class="space-y-3">
    <x-errors />
    <x-input label="Nome em português" wire:model="nome_pt" />
    <x-input label="Nome em inglês" wire:model="nome_en" />
    <x-input label="Nome em espanhol" wire:model="nome_es" />
    <x-number label="Vagas" min="0" wire:model="vagas" />
    <div class="text-right">
        <x-button text="Salvar" />
    </div>
</form>
