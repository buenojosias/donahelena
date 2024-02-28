<div class="py-12">
    <x-dialog />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cargo</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 md:grid md:grid-cols-2 md:gap-6">
        <div>
            <div class="overflow-hidden bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $cargo->nome_pt }}</h3>
                    {{-- <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $cliente->created_at->format('d/m/Y') }}</p> --}}
                </div>
                <div class="border-t border-gray-200 sm:p-0">
                    <dl class="divide-y divide-gray-200">
                        <div class="py-4 grid grid-cols-2 sm:gap-4 sm:py-5 px-6">
                            <dt class="text-sm font-medium text-gray-500">Nome em inglês</dt>
                            <dd class="text-sm text-gray-900">{{ $cargo->nome_en }}</dd>
                        </div>
                        <div class="py-4 grid grid-cols-2 sm:gap-4 sm:py-5 px-6">
                            <dt class="text-sm font-medium text-gray-500">Nome em espanhol</dt>
                            <dd class="text-sm text-gray-900">{{ $cargo->nome_es }}</dd>
                        </div>
                        <div class="py-4 grid grid-cols-2 sm:gap-4 sm:py-5 px-6">
                            <dt class="text-sm font-medium text-gray-500">Vagas</dt>
                            <dd class="text-sm text-gray-900">{{ $cargo->vagas }}</dd>
                        </div>
                        <div class="py-4 grid grid-cols-2 sm:gap-4 sm:py-5 px-6">
                            <dt class="text-sm font-medium text-gray-500">Clientes ativos</dt>
                            <dd class="text-sm text-gray-900">{{ $cargo->clientes->count() }}</dd>
                        </div>
                        <div class="py-4 grid grid-cols-2 sm:gap-4 sm:py-5 px-6">
                            <dt class="text-sm font-medium text-gray-500">Currículos pendentes</dt>
                            <dd class="text-sm text-gray-900">{{ $cargo->curriculos->count() }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="mt-4 flex justify-end gap-2">
                <x-button wire:click="$toggle('modal')" icon="pencil" text="Editar" />
                <x-button wire:click="delete" text="Excluir" icon="trash" color="red" />
            </div>

        </div>
        <div class="mt-6 md:mt-0">
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:px-6 border-b">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Clientes</h3>
                </div>
                <table class="min-w-full divide-y divide-gray-300">
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($cargo->clientes as $cliente)
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                    <a href="{{ route('clientes.detalhes', $cliente) }}"
                                        wire:navigate>{{ $cliente->nome }}</a>
                                </td>
                                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-6"
                                    width="1%">
                                    @if (!$cliente->lido)
                                        <x-badge text="Novo" outline />
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4 bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:px-6 border-b">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Currículos</h3>
                </div>
                <table class="min-w-full divide-y divide-gray-300">
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($cargo->curriculos as $curriculo)
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                    <a href="{{ route('curriculos.detalhes', $curriculo) }}"
                                        wire:navigate>{{ $curriculo->nome }}</a>
                                </td>
                                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-6"
                                    width="1%">
                                    @if (!$curriculo->lido)
                                        <x-badge text="Novo" outline />
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <x-modal title="Editar cargo" size="md" wire>
        @livewire('cargo-modal', ['cargo' => $cargo])
    </x-modal>
</div>
