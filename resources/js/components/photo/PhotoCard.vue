<template>
    <div class="flex items-center justify-center w-60 h-60 mt-10">
        <label for="camera-front" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <front v-if="this.angulo == 'Frente' " />
                <left v-else-if="this.angulo == 'Izquierdo' " />
                <back v-else-if="this.angulo == 'Atrás' " />
                <right v-else-if="this.angulo == 'Derecho' " />
                <wheel v-else-if="this.angulo == 'Auxilio' " />
                <div class="border-2 px-2 py-2 bg-gray-50 rounded-xl mt-5 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                    </svg>
                    <p class="ml-2 text-sm text-gray-500 dark:text-gray-400">Subir foto: <span class="font-bold">{{ this.angulo }}</span></p>
                </div>
                
            </div>
            <input id="camera-front" type="file" class="hidden" capture/>
        </label>
    </div>
</template>

<script>
import front from './front.vue';
import left from './left.vue';
import back from './back.vue';
import right from './right.vue';
import wheel from './wheel.vue';

export default {
    components: 
    {
        front,
        left,
        back,
        right,
        wheel,
    },
    props: {
        angulo: {
            type: String
        }
    },

    mounted () {
        console.log(this.angulo);
    }
}

</script>