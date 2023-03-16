<x-inspectionIndex-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="inspections" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table table-hover table-bordered table-sm" id="inspections-table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Tomador</th>
                            <th scope="col">Email</th>
                            <th scope="col">Dominio</th>
                            <th scope="col">Status</th>
                            <th scope="col">Acciones</th>
                            <!-- <th scope="col">#</th>
                            <th scope="col">Compañía</th>
                            <th scope="col">Nro. Ppta | Pza</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Dominio</th>
                            <th scope="col">Tomador</th>
                            <th scope="col">Creado</th>
                            <th scope="col">Enviar email <span class="badge text-bg-success">Cant. Envíos</span></th>
                            <th scope="col">Adjuntos</th> -->

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($inspections as $inspection)
                        <tr>
                            <th scope="row">{{$inspection->id}}</th>
                            <td scope="row">{{ $inspection->taker->name }}</td>
                            <td scope="row">{{ $inspection->taker->email }}</td>
                            <td scope="row">{{ $inspection->dominio }}</td>
                            <td scope="row">{{ $inspection->status }}</td>
                            <td scope="row">{{ $inspection->acciones }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-inspectionIndex-layout>