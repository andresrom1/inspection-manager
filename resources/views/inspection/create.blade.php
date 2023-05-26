<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Inspección') }}
        </h2>
    </x-slot>

    <div class="py-12 flex items-center">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-300 border-2 dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">         
                
                <form action="/inspection" method="post">
                    @csrf
                    <div class="grid grid-cols-3 gap-3">
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                            <input value="{{ old('name') }}" name="takerName" type="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Juan Perez" required>
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail del Tomador</label>
                            <input value="{{ old('email') }}" name="takerEmail" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nombre@mail.com" required>
                        </div>

                        <div class="mb-6">
                            <label for="compania" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Compañía | Broker</label>
                            <select name ="compania" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="compania">                                               
                                <option value="LPS" {{ old('compania') == 'LPS' ? 'selected="selected"' : '' }}>LPS</option>
                                <option value="LPS" {{ old('compania') == 'RUS' ? 'selected="selected"' : '' }}>RUS</option>
                                <option value="LPS" {{ old('compania') == 'Cooperación' ? 'selected="selected"' : '' }}>Cooperación</option>
                                <option value="LPS" {{ old('compania') == 'Triunfo' ? 'selected="selected"' : '' }}>Triunfo</option>
                                <option value="LPS" {{ old('compania') == 'San Cristóbal' ? 'selected="selected"' : '' }}>San Cristóbal</option>
                                <option value="LPS" {{ old('compania') == 'Sura' ? 'selected="selected"' : '' }}>Sura</option>
                                <option value="LPS" {{ old('compania') == 'Experta' ? 'selected="selected"' : '' }}>Experta</option>
                                <option value="Colon" {{ old('compania') == 'Colon' ? 'selected="selected"' : '' }}>Colon</option>
                                <option value="Nacion" {{ old('compania') == 'Nacion' ? 'selected="selected"' : '' }}>Nacion</option>
                                <option value="Vis Red" {{ old('compania') == 'Vis Red' ? 'selected="selected"' : '' }}>Vis Red</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="tipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de vehículo</label>
                            <select name ="tipo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="tipo">                                               
                                <option value="Auto" {{ old('tipo') == 'Auto' ? 'selected="selected"' : '' }}>Auto</option>
                                <option value="Moto" {{ old('tipo') == 'Moto' ? 'selected="selected"' : '' }}>Moto</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="dominio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dominio</label>
                            <input value="{{ old('dominio') }}" name="dominio" type="text" id="dominio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="AF000AB o AA000BB" required>
                        </div>
                    </div>
                    <x-inspections.photolist></x-inspections.photolist>
                    
                    <button type="submit" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear Inspección</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
