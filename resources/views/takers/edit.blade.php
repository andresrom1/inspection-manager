<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Tomador') }}
        </h2>
    </x-slot> --}}

    <div class="py-12 flex items-center">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-300 border-2 dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">         
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Editar datos del Tomador 💎</h2>
                <form action="/takers/{{ $taker->id }}" method="post">
                    @csrf
                    @method ('PUT')
                    <div class="grid grid-cols-1 gap-3">
                        
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">🧍Nombre</label>
                            <input value="{{ old('name') ?? $taker->name }}" name="name" type="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Juan Perez" required>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="grid grid-cols-2 gap-5">
                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">📨 E-mail del Tomador</label>
                                <input value="{{ old('email') ?? $taker->email }}" name="email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nombre@mail.com" required>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="mb-6">
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">📞 Teléfono del Tomador</label>
                                <input value="{{ old('phone') ?? $taker->phone }}" name="phone" type="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="351-2213017" required>
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                        </div>

                        
                        <div class="grid grid-cols-2 gap-5">
                            <div class="max-w-sm mx-auto">
                                <label for="id_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">📃 Tipo de Documento</label>
                                <select id="id_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Elige un tipo de documento</option>
                                    <option value="DNI" {{ $taker->id_type == 'DNI' ? 'selected' : '' }}>DNI</option>
                                    <option value="CUIL" {{ $taker->id_type == 'CUIL' ? 'selected' : '' }}>CUIL</option>
                                    <option value="CUIT" {{ $taker->id_type == 'CUIT' ? 'selected' : '' }}>CUIT</option>
                                </select>
                                <x-input-error :messages="$errors->get('id_type')" class="mt-2" />
                            </div>
                            <div class="mb-6">
                                <label for="id_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">🪪 Número de documento</label>
                                <input value="{{ old('id_number') ?? $taker->id_number  }}" name="id_number" type="number" id="id_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="30-66728231-9" required>
                                <x-input-error :messages="$errors->get('id_number')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-5">
                            <div class="mb-6">
                                <label for="adress" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">🏡 Dirección</label>
                                <input value="{{ old('adress') ?? $taker->adress }}" name="adress" type="adress" id="adress" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Av. San Martin 1810" required>
                                <x-input-error :messages="$errors->get('adress')" class="mt-2" />
                            </div>
                            <div class="mb-6">
                                <label for="postal_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">📬 Código postal</label>
                                <input value="{{ old('postal_code') ?? $taker->postal_code }}" name="postal_code" type="number" id="postal_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="5152" required>
                                <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
                            </div>
                        </div>
                        <input value="crud" name="procedence" id="procedence" class="hidden">

                    </div>
                    <div class="flex justify-between">
                        <button type="submit" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar Tomador</button>
                        <a href=" {{ Route('takers.index') }}" class="mt-5 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancelar</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
