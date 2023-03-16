<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- <link href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/datatables.min.css" rel="stylesheet"/> -->

    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>
                </div>
            </header>

            <!-- Page Content -->
            <main>

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
            </main>
        </div>

<script>
import DataTable from 'datatables.net-dt';

export default {
    
}
</script>
    </body>
</html>
