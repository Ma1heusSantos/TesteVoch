<div>
    <x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between h-10">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Grupo Econômico') }}
                </h2>
                <div class="flex">
                    <input wire:model.live="search" type="text" placeholder="Pesquisar"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600 transition duration-200" />
                    <a href="{{ route('economicGroup.create') }}"
                        class="bg-blue-600 mx-2 w-96 hover:bg-blue-700 text-white font-semibold py-1 px-4 rounded-lg shadow-md transition duration-200 inline-block text-center">
                        + Adicionar
                    </a>
                </div>
            </div>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if (isset($economicGroup) && !$economicGroup->isEmpty())
                    @foreach ($economicGroup as $group)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                            <div class="p-6 text-gray-900 dark:text-gray-100 ">
                                <div class="flex justify-between">
                                    {{ $group->nome ?? 'não informado' }}
                                    <div>
                                        <a href="{{ route('economicGroup.edit', $group->id) }}"
                                            class="bg-yellow-500 mr-2 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded-md shadow-sm transition duration-200 text-xs">
                                            Editar
                                        </a>
                                        <a href="{{ route('economicGroup.destroy', $group->id) }}"
                                            class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded-md shadow-sm transition duration-200 text-xs">
                                            excluir
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900 dark:text-gray-100 ">
                            nenhum grupo encontrado.
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </x-app-layout>
</div>
