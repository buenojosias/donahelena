<div>
    <form wire:submit="submit">
        <input type="hidden" id="lang" name="lang" value="pt">
        <div class="col-md-6">
            <input type="text" class="form-control" wire:model="nome"
                placeholder="{{ $data->form->name }}">
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control tel" wire:model="telefone"
                placeholder="{{ $data->form->phone }}">
        </div>
        <div class="col-md-12">
            <input type="email" class="form-control" wire:model="email"
                placeholder="{{ $data->form->email }}">
        </div>
        <div class="col-md-12">
            <input type="text" class="form-control" wire:model="localizacao"
                placeholder="{{ $data->form->location }}">
        </div>
        <div class="col-md-12">
            <select wire:model="cargo_id" class="form-control">
                <option value="">{{ $data->form->hire_office }}</option>
                @foreach ($cargos as $cargo)
                    <option value="{{ $cargo->id }}">{{ $cargo->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12" style="margin-bottom:12px"><small>{{ $data->form->hire_description }}</small></div>
        <div class="col-md-8">
            <input type="submit" class="form-control text-uppercase" value="{{ $data->form->btn_hire }}">
        </div>
    </form>
</div>
