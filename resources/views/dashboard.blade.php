<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-2">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Resumo</h3>
                <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-12 shadow sm:px-6 sm:pt-6">
                        <dt>
                            <div class="absolute rounded-md bg-indigo-500 p-3">
                                <x-icon name="user" class="h-6 w-6 text-white" outline />
                            </div>
                            <p class="ml-16 truncate text-sm font-medium text-gray-500">Novos clientes</p>
                        </dt>
                        <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900">
                                {{ App\Models\Cliente::count() }}
                            </p>
                            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="{{ route('clientes.index') }}" wire:navigate class="font-medium text-indigo-600 hover:text-indigo-500">Ver todos<span class="sr-only"> Novos clientes</span></a>
                                </div>
                            </div>
                        </dd>
                    </div>

                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-12 shadow sm:px-6 sm:pt-6">
                        <dt>
                            <div class="absolute rounded-md bg-indigo-500 p-3">
                                <x-icon name="newspaper" class="h-6 w-6 text-white" outline />
                            </div>
                            <p class="ml-16 truncate text-sm font-medium text-gray-500">Novos currículos</p>
                        </dt>
                        <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900">
                                {{ App\Models\Curriculo::count() }}
                            </p>
                            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="{{ route('curriculos.index') }}" wire:navigate class="font-medium text-indigo-600 hover:text-indigo-500">Ver todos<span class="sr-only"> Novos currículos</span></a>
                                </div>
                            </div>
                        </dd>
                    </div>

                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-12 shadow sm:px-6 sm:pt-6">
                        <dt>
                            <div class="absolute rounded-md bg-indigo-500 p-3">
                                <x-icon name="briefcase" class="h-6 w-6 text-white" outline />
                            </div>
                            <p class="ml-16 truncate text-sm font-medium text-gray-500">Total de vagas</p>
                        </dt>
                        <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-900">
                                {{ App\Models\Cargo::sum('vagas') }}
                            </p>
                            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="{{ route('cargos.index') }}" wire:navigate class="font-medium text-indigo-600 hover:text-indigo-500">Ver todas<span class="sr-only"> Total de vagas</span></a>
                                </div>
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
