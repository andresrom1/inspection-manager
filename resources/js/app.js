import './bootstrap';

import 'flowbite';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import {createApp} from 'vue/dist/vue.esm-bundler.js'

import PhotoCard from './components/photo/PhotoCard.vue';
const photoCard = createApp({
    components: {
        'photo-card': PhotoCard,
    },
});
photoCard.mount("#photo-card");

import InspectionTable from './components/inspections/InspectionsTable.vue';
const inspectionTable = createApp({
    components: {
        'inspection-table': InspectionTable,
    },
});
inspectionTable.mount("#inspections-table");

