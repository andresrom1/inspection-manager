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

import MailSearch from './components/notification/MailSearch.vue';
const mailSearch = createApp({
    components: {
        'mail-search': MailSearch,
    },
});
mailSearch.mount("#mail-search");

import PolicySearch from './components/notification/PolicySearch.vue';
const policySearch = createApp({
    components: {
        'policy-search': PolicySearch,
    },
});
policySearch.mount("#policy-search");

import TakersEdit from './components/takers/TakersEdit.vue';
const takersEdit = createApp({
    components: {
        'takers-edit': TakersEdit,
    },
});
takersEdit.mount("#takers-edit");

