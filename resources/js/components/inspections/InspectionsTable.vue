<template>
<div>
    <div class="mt-5 mb-5 px-5">
        <table id="inspectionsTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Tomador</th>
                    <th>Email</th>
                    <th>Compañía</th>
                    <th>Tipo</th>
                    <th>Dominio</th>
                    <th>Status</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
</div>
</template>

<script>
// import DataTable from 'datatables.net-dt';
// import 'datatables.net-responsive-dt';
// import 'datatables.net-searchpanes-dt';
// import 'datatables.net-select-dt';
 
export default {
    name: 'ins',
    data () {
        return {
            data: null,
            toastVisible: true,
        }
    },

    mounted () {
        axios.get('/inspections.json')
            .then(res => {
                this.data = res.data.data
            })
            .then(
                this.tableShow ()
            );
    },

    computed: {
        getToastVisibility () {
            console.log('hit');
            return this.toastVisible;
        }
    },

    methods: {
        tableShow () {
            let espanol = {
                "autoFill": {
                    "cancel": "Cancelar",
                    "fill": "Llenar las celdas con <i>%d<i><\/i><\/i>",
                    "fillHorizontal": "Llenar las celdas horizontalmente",
                    "fillVertical": "Llenar las celdas verticalmente"
                },
                "decimal": ",",
                "emptyTable": "No hay datos disponibles en la Tabla",
                "infoFiltered": "Filtrado de _MAX_ entradas totales",
                "infoThousands": ".",
                "lengthMenu": "Mostrar _MENU_ entradas",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primera",
                    "last": "Ultima",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "processing": "Procesando...",
                "search": "Busqueda:",
                "searchBuilder": {
                    "add": "Agregar condición",
                    "button": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "clearAll": "Quitar todo",
                    "condition": "Condición",
                    "conditions": {
                        "date": {
                            "after": "Luego",
                            "before": "Luego",
                            "between": "Entre",
                            "empty": "Vacio",
                            "equals": "Igual",
                            "notBetween": "No entre"
                        },
                        "number": {
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual",
                            "gt": "Mayor a",
                            "gte": "Mayor o igual a",
                            "lt": "Menor a ",
                            "lte": "Menor o igual a ",
                            "not": "No",
                            "notBetween": "No entre",
                            "notEmpty": "No vacío"
                        },
                        "string": {
                            "contains": "Contiene",
                            "empty": "Vacío",
                            "endsWith": "Termina en ",
                            "equals": "Igual a ",
                            "not": "No",
                            "notEmpty": "No vacío",
                            "startsWith": "Comenza con "
                        }
                    },
                    "data": "Datos",
                    "deleteTitle": "Borrar regla de filtrado",
                    "leftTitle": "Criterio de alargado",
                    "logicAnd": "Y",
                    "logicOr": "O",
                    "rightTitle": "Criterio de endentado",
                    "title": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "value": "Valor"
                },
                "thousands": ".",
                "zeroRecords": "No se encontraron registros que coincidan con la búsqueda",
                "datetime": {
                    "previous": "Anterior",
                    "next": "Siguiente",
                    "hours": "Hora",
                    "minutes": "Minuto",
                    "seconds": "Segundo",
                    "amPm": [
                        "AM",
                        "PM"
                    ],
                    "months": {
                        "0": "Enero",
                        "1": "Febrero",
                        "10": "Noviembre",
                        "11": "Diciembre",
                        "2": "Marzo",
                        "3": "Abril",
                        "4": "Mayo",
                        "5": "Junio",
                        "6": "Julio",
                        "7": "Agosto",
                        "8": "Septiembre",
                        "9": "Octubre"
                    },
                    "unknown": "-",
                    "weekdays": [
                        "Dom",
                        "Lun",
                        "Mar",
                        "Mie",
                        "Jue",
                        "Vie",
                        "Sab"
                    ]
                },
                "editor": {
                    "close": "Cerrar",
                    "create": {
                        "button": "Nuevo",
                        "title": "Crear nueva entrada",
                        "submit": "Crear"
                    },
                    "edit": {
                        "button": "Editar",
                        "title": "Editar entrada",
                        "submit": "Actualizar"
                    },
                    "remove": {
                        "button": "Borrar",
                        "title": "Borrar",
                        "submit": "Borrar",
                        "confirm": {
                            "_": "Está seguro que desea borrar %d filas?",
                            "1": "Está seguro que desea borrar 1 fila?"
                        }
                    },
                    "multi": {
                        "title": "Múltiples valores",
                        "info": "La selección contiene diferentes valores para esta entrada. Para editarla y establecer todos los items al mismo valor, clickear o tocar aquí, de otra manera conservarán sus valores individuales.",
                        "restore": "Deshacer cambios",
                        "noMulti": "Esta entrada se puede editar individualmente, pero no como parte de un grupo."
                    },
                    "error": {
                        "system": "Ocurrió un error de sistema (&lt;a target=\"\\\" rel=\"nofollow\" href=\"\\\"&gt;Más información)."
                    }
                },
                "aria": {
                    "sortAscending": ": orden ascendente",
                    "sortDescending": ": orden descendente"
                },
                "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                "buttons": {
                    "copy": "Copiar",
                    "copyTitle": "Copiar al portapapeles",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pdf": "PDF",
                    "print": "Imprimir",
                    "createState": "Crear estado",
                    "removeAllStates": "Eliminar todos los estados",
                    "removeState": "Eliminar estado",
                    "renameState": "Renombrar estado",
                    "savedStates": "Estados guardados",
                    "stateRestore": "Estado %d",
                    "updateState": "Actualizar"
                }
            };

            $(document).ready(function () {
                let datatable = $('#inspectionsTable').DataTable({
                    searchPanes:{
                        show: true,
                        cascadePanes: true,
                        initCollapsed: true,
                        orderable: true,
                        preSelect: [{
                            column: 6,
                            rows: ['No procesado', 'Foto agregada', 'Aceptado', 'Rechazado']
                        }],

                        dtOpts: {
                            dom: 'tp',
                            paging: false,
                            pagingType: 'simple',
                            searching: true,
                            info: false,
                            
                            
                        },
                        //columns: [0,1,2,3],
                    
                    },
                    dom: 'Pfrtip',
                    columnDefs: [{
                        searchPanes: {
                            show: true,
                        },
                        targets:[3,4,6],
                    }],
                    searchCols: [
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                    ],
                    ajax: {
                        "url": "/inspections.json",
                    },
                    "columns": [
                        { data: 'id' },
                        { data: 'taker_name' },
                        { data: 'taker_email' },
                        { data: 'compania' },
                        { data: 'tipo' },
                        { data: 'dominio' },
                        { data: 'status' },
                        { defaultContent: `
                            <div class="flex">    
                                <button class="inspectionEdit text-gray-800 hover:text-gray-600 focus:ring-2 focus:outline-none focus:ring-gray-300 font-light rounded-lg text-sm p-1 text-center inline-flex items-center mr-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <button class="inspectionDestroy text-gray-800 hover:text-gray-600 focus:ring-2 focus:outline-none focus:ring-gray-300 font-light rounded-lg text-sm p-1 text-center inline-flex items-center mr-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                                <button class="inspectionSee text-gray-800 hover:text-gray-600 focus:ring-2 focus:outline-none focus:ring-gray-300 font-light rounded-lg text-sm p-1 text-center inline-flex items-center mr-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                </button>
                                <button class="inspectionCreate text-gray-800 hover:text-gray-600 focus:ring-2 focus:outline-none focus:ring-gray-300 font-light rounded-lg text-sm p-1 text-center inline-flex items-center mr-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                                    </svg>
                                </button>
                                <button class="linkCopy text-gray-800 hover:text-gray-600 focus:ring-2 focus:outline-none focus:ring-gray-300 font-light rounded-lg text-sm p-1 text-center inline-flex items-center mr-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                                    </svg>
                                </button>
                                <button class="inspectionShow text-gray-800 hover:text-gray-600 focus:ring-2 focus:outline-none focus:ring-gray-300 font-light rounded-lg text-sm p-1 text-center inline-flex items-center mr-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                    </svg>
                                </button>
                                <button class="changeStatus text-gray-800 hover:text-gray-600 focus:ring-2 focus:outline-none focus:ring-gray-300 font-light rounded-lg text-sm p-1 text-center inline-flex items-center mr-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                </button>
                            </div>
                            ` }
                    ],
                    "language": espanol,
                });
                $('#inspectionsTable tbody').on('click', '.inspectionCreate', function(){
                    let data = datatable.row($(this).parents()).data();
                    axios
                        .get('/inspection/' + data.id + '/' + data.token + '/photo')
                        .then(response => (
                            console.log(response.request.responseURL),
                            this.urlToRedirect = response.request.responseURL,

                            window.location.href = this.urlToRedirect                         
                        ));
                }) 

                $('#inspectionsTable tbody').on('click', '.inspectionSee', function(){
                    let data = datatable.row($(this).parents()).data();
                    axios
                        .get('/inspection/' + data.id + '/photo')
                        .then(response => (
                            console.log(response.request.responseURL),
                            this.urlToRedirect = response.request.responseURL,

                            window.location.href = this.urlToRedirect                         
                        ));
                })

                $('#inspectionsTable tbody').on('click', '.inspectionDestroy', function(){
                    let data = datatable.row($(this).parents()).data();
                    axios
                        .get('/inspection/' + data.id + '/ConfirmDelete')
                        .then(response => (
                            console.log(response.request.responseURL),
                            this.urlToRedirect = response.request.responseURL,

                            window.location.href = this.urlToRedirect                         
                        ));
                }) 
                
                $('#inspectionsTable tbody').on('click', '.linkCopy', function(){
                    let data = datatable.row($(this).parents()).data();
                    let url = window.location.origin + '/inspection/' + data.id + '/' + data.token + '/photo'
                    
                    navigator.clipboard.writeText(url);
                    alert("URL para relizar la inspección: " + url);                    
                }) 

                $('#inspectionsTable tbody').on('click', '.inspectionShow', function(){
                    let data = datatable.row($(this).parents()).data();
                    axios
                        .get('/inspection/' + data.id)
                        .then(response => (
                            console.log(response.request.responseURL),
                            this.urlToRedirect = response.request.responseURL,
    
                            window.location.href = this.urlToRedirect                         
                        ));
                })

                $('#inspectionsTable tbody').on('click', '.inspectionEdit', function(){
                    let data = datatable.row($(this).parents()).data();
                    axios
                        .get('/inspection/' + data.id + '/edit')
                        .then(response => (
                            console.log(response.request.responseURL),
                            this.urlToRedirect = response.request.responseURL,
    
                            window.location.href = this.urlToRedirect                         
                        ));
                })

                $('#inspectionsTable tbody').on('click', '.changeStatus', function(){
                    let data = datatable.row($(this).parents()).data();
                    axios
                        .get('/inspection/' + data.id + '/editStatus')
                        .then(response => (
                            console.log(response.request.responseURL),
                            this.urlToRedirect = response.request.responseURL,
    
                            window.location.href = this.urlToRedirect                         
                        ));
                }) 
            });
        },


    }
    
}
</script>

<style>
/* @import 'flowbite'; */
</style>