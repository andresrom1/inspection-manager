<script setup lang="ts">
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';
import 'datatables.net-buttons';
import 'datatables.net-buttons/js/buttons.html5';
import 'datatables.net-responsive';
import 'datatables.net-select';
import { ref, onMounted } from 'vue'
import wheel from '../photo/wheel.vue';

DataTable.use(DataTablesCore);

const columns = [
    { data: 'id' },
    { data: 'taker_name' },
    { data: 'taker_email' },
    { data: 'dominio' },
    { data: 'status' },
    { defaultContent: function() {
        return "<button>hola</button>"
    } },
    
    //{ defaultContent: "<a href='#'><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'><path stroke-linecap='round' stroke-linejoin='round' d='M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5' /></svg></a>"},
    // { title: 'Actions',
    //     component: wheel}
    // { data: function() {
    //     console.log()
    //     let $button = '<a href=`${data[1]}`><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" /></svg></a>';
    //     return $button
    // }},
];

let dt;

const table = ref(); // This variable is used in the `ref` attribute for the component

onMounted(function () {
    console.log(table.value);
    //console.log(table.value.dt());

});


const options = {
    dom: 'BPlftip',
    responsive: true,
    select: true,
    language: {
        "decimal":        "",
        "emptyTable":     "No hay información sobre Inspecciones",
        "info":           "Mostrando _START_ to _END_ of _TOTAL_ inspecciones",
        "infoEmpty":      "Mostrando 0 to 0 of 0 inspecciones",
        "infoFiltered":   "(filtered from _MAX_ total entries)",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "Mostrar _MENU_ inspecciones",
        "loadingRecords": "Cargando...",
        "processing":     "",
        "search":         "Buscar:",
        "zeroRecords":    "No se encontraron inspecciones",
        "paginate": {
            "first":      "Primera",
            "last":       "Última",
            "next":       "Próxima",
            "previous":   "Anterior"
        },
        "aria": {
            "sortAscending":  ": activate to sort column ascending",
            "sortDescending": ": activate to sort column descending"
        }
    },
};

</script>

<template>
    <div class="px-2 py-2">

        <DataTable 
            :columns="columns" 
            :options="options" 
            ajax="/inspections.json" 
            class="display nowrap" 
            width="100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Tomador</th>
                    <th>Email</th>
                    <th>Dominio</th>
                    <th>Status</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <!-- <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Extn.</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot> -->
        </DataTable>
    </div>
</template>

<style>
@import 'datatables.net-dt';
@import 'datatables.net-buttons-dt';
@import 'datatables.net-responsive-dt';
@import 'datatables.net-select-dt';
</style>
