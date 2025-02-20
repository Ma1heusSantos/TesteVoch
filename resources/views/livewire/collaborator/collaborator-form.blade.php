<div>
    <x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between h-10">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Adicionar um colaborador:') }}
                </h2>
            </div>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                @if (session()->has('message'))
                    <div class="bg-green-600 text-white p-4 mb-4 rounded-lg">
                        {{ session('message') }}
                    </div>
                @endif


                <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg">
                    <form wire:submit.prevent="submit">
                        <div class="mb-4">
                            <label for="nome"
                                class="block text-gray-700 dark:text-gray-300 text-sm font-medium my-3">Nome:</label>
                            <input type="text" id="nome" wire:model="nome"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600 transition duration-200 @error('nome')  @enderror"
                                placeholder="Ex:  Matheus" />
                            @error('nome')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email"
                                class="block text-gray-700 dark:text-gray-300 text-sm font-medium my-3">E-mail:</label>
                            <input type="text" id="email" wire:model="email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600 transition duration-200 @error('email')  @enderror"
                                placeholder="Ex: fulano@gmail.com" />
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label for="cpf"
                                class="block text-gray-700 dark:text-gray-300 text-sm font-medium my-3">CPF:</label>
                            <input type="text" id="cpf" wire:model="cpf"
                                class="cpf w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600 transition duration-200 @error('cpf')  @enderror"
                                placeholder="Ex: 000.000.000-00" />
                            @error('cpf')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="mb-4">
                            <label for="unit"
                                class="block text-gray-700 dark:text-gray-300 text-sm font-medium my-3">
                                Unidade:</label>
                            <select id="unit" wire:model="unit"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600 transition duration-200 @error('unit')  @enderror">
                                <option value="" selected>Selecione uma unidade</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->nome_fantasia }}</option>
                                @endforeach
                            </select>
                            @error('unit')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>



                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-200">
                                Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
