<div>
    <div>
        <form wire:submit="submit">
            <input type="hidden" id="lang" name="lang" value="pt">
            <input type="text" class="form-control" wire:model="nome" placeholder="{{ $data->form->name }}">
            <input type="text" class="form-control tel" wire:model="telefone" placeholder="{{ $data->form->phone }}">
            <input type="email" class="form-control" wire:model="email" placeholder="{{ $data->form->email }}">
            <input type="text" class="form-control" wire:model="localizacao" placeholder="Bairro/Cidade">
            <select wire:model="cargo_id" class="form-control">
                <option value="" selected>{{ $data->form->curriculum_office }}</option>
                @foreach ($cargos as $cargo)
                    <option value="{{ $cargo->id }}">{{ $cargo->nome }}</option>
                @endforeach
            </select>
            <input type="hidden" id="lang" name="lang" value="pt">
            <div class="col-md-12 msg-erro"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ $data->form->btn_cancel }}</button>
                <button type="submit" class="btn btn-primary">{{ $data->form->btn_submit }}</button>
            </div>
        </form>
    </div>
</div>
