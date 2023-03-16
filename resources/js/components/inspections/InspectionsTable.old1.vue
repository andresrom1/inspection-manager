<template>
        <table id="inspectionsTable" class="table table-hover table-border">
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
            <tbody>
                <tr v-for="inspection in data">
                    <td>{{ inspection.id }}</td>
                    <td>{{ inspection.taker_name }}</td>
                    <td>{{ inspection.taker_email }}</td>
                    <td>{{ inspection.dominio }}</td>
                    <td>{{ inspection.status }}</td>
                    <td> x  x  x</td>
                </tr>
            </tbody>
        </table>
</template>

<script>
import datatable from 'datatables.net-dt';
import { nextTick } from 'vue'

export default {
    data () {
        return {
            data: [],
        }
    },
    mounted () {
        this.getInspections()
    },

    methods: {
        tabla () {
            this.$nextTick(() => {

            });
        },

        getInspections () {
            axios.get('/inspections.json')
                .then(res => {
                    console.log(res.data.data);
                    this.data = res.data.data;
                    this.tabla();
                });
        }
    }
}

</script>

<style>
@import 'datatables.net-dt';
@import 'datatables.net-buttons-dt';
@import 'datatables.net-responsive-dt';
@import 'datatables.net-select-dt';
</style>