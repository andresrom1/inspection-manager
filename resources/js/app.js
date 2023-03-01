import './bootstrap';

import 'flowbite';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import {createApp} from 'vue/dist/vue.esm-bundler.js'

import PhotoCard from './components/photo/PhotoCard.vue';
// import Front from './components/photo/Front.vue';
// import Left from './components/photo/left.vue';
// import Back from './components/photo/back.vue';
// import Right from './components/photo/right.vue';
// import Wheel from './components/photo/wheel.vue';
const photoCard = createApp({
    components: {
        'photo-card': PhotoCard,
    },
});
photoCard.mount("#photo-card");


// const front = createApp({
//     components: {
//         'front': Front,
//     },
// });
// front.mount("#photo-card");

// const left = createApp({
//     components: {
//         'left': Left,
//     },
// });
//left.mount("#photo-card");

        // 'front' : Front,
        // 'left' : Left,
        // 'back' : Back,
        // 'right' : Right,
        // 'whell' : Wheel,