<template>
    <div class="flex gap-3">
        <div class="relative md:mt-0">
            <input 
                class="w-72 h-10 px-4 pl-8 py-1 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                type="text"
                id="email" 
                placeholder="Email"
                v-model="email"
                @input="inputPerformed()"
                @click="openDropdown()">
            <div class="absolute top-1 text-gray-500">
                <svg class="w-4 h-4 mt-2 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>                             
            </div>                                
            <div class="absolute top-1 right-0" v-if="spinnerVisibility">
                <svg aria-hidden="true" class="mt-2 mr-2 w-4 h-4 text-gray-400 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
            </div>
            <transition>
                <div v-if="dropDownVisibility" class="z-50 bg-white absolute text-sm rounded-xl border-2 p-3 whitespace-nowrap mt-4">               
                    <ul>
                        <li v-if="takers.data.length == 1" class="text-xs">{{ takers.data.length  }} resultado</li>                               
                        <li v-else class="text-xs">{{ takers.data.length  }} resultados</li>                               
                        <li class="align-bottom border-b py-2 hover:bg-gray-100 border-gray-300"
                            v-for="(taker,index) in takers.data"
                            @click="takerClicked(taker)" 
                            :key="index">
                                <span class="ml-2 text-blue-500 align-text-bottom" ><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 inline"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg></span>
                                <span class="ml-1">{{ taker.name }} </span>
                                <span class="ml-2 text-green-500 align-text-bottom"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg></span>
                                <span class="ml-1"> {{ taker.email }}</span>
                                <span class="ml-2 text-red-500 align-text-bottom"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 inline"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" /></svg></span>
                                <span class="ml-1"> {{ taker.phone }}</span>
                        </li>
                    </ul>
                </div>
            </transition>
                   
        </div>
        
        <div>
            <input v-model="name" type="text" id="name" class="h-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Juan Perez" required>
        </div>
        <div>
            <input v-model="phone" type="tel" id="phone" class="h-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="351-628-0778" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
        </div>
        
    </div>
    <div class="mt-5">
        <button @click="clearSession()" type="button" class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <!-- <svg class="w-3.5 h-3.5 text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75L14.25 12m0 0l2.25 2.25M14.25 12l2.25-2.25M14.25 12L12 14.25m-2.58 4.92l-6.375-6.375a1.125 1.125 0 010-1.59L9.42 4.83c.211-.211.498-.33.796-.33H19.5a2.25 2.25 0 012.25 2.25v10.5a2.25 2.25 0 01-2.25 2.25h-9.284c-.298 0-.585-.119-.796-.33z" />
            </svg> -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75L14.25 12m0 0l2.25 2.25M14.25 12l2.25-2.25M14.25 12L12 14.25m-2.58 4.92l-6.375-6.375a1.125 1.125 0 010-1.59L9.42 4.83c.211-.211.498-.33.796-.33H19.5a2.25 2.25 0 012.25 2.25v10.5a2.25 2.25 0 01-2.25 2.25h-9.284c-.298 0-.585-.119-.796-.33z" />
            </svg>

            Limpiar
        </button>
    </div>
</template>

<script>
export default {
    data: () => ({
        email: '',
        name:'',
        phone:'',
        spinnerVisibility: false,
        dropDownVisibility: false,
        requestCount: 0,
        takers:'',
        debounce: null,
    }),
    mounted() {
        document.addEventListener('click', this.clickOutListener);  
    },
    methods: {
        clearSession() {
            sessionStorage.clear();
            this.name = '';
            this.email = '';
            this.phone = '';
        },
        takerClicked (taker) {
            this.name = taker.name;
            this.email = taker.email;
            this.phone = taker.phone;
            sessionStorage.setItem('taker_id', taker.id); 
            sessionStorage.setItem('taker_name', taker.name); 
            sessionStorage.setItem('taker_email', taker.email); 
            sessionStorage.setItem('taker_phone', taker.phone); 
            this.closeDropdown();
        },
        closeDropdown() {
            this.dropDownVisibility = false;
        },
        openDropdown () {
            if (_.isEmpty(this.takers.data) ) {
                this.dropDownVisibility = false;
                } else {
                    this.dropDownVisibility = true;
                }
        },
        clickOutListener(evt) {
            // console.log(evt.target);
            if ( ! this.$el.contains(evt.target)) {
                this.dropDownVisibility = false;
            }
        },
        inputPerformed() {
            this.spinnerVisibility = true;
            clearTimeout(this.debounce);
            this.debounce = setTimeout( () => {
                this.mailInput();
            },1000)
        },

        mailInput () {
            this.requestCount++;
            console.log('Término e búsqueda: ' + this.email)
            axios.get('/takers?email=' + this.email)
            .then(response => {
                // manejar respuesta exitosa
                this.takers = response;            
                })
                .catch(function (error) {
                    // manejar error
                    console.log(error);
                })
                .finally(response => {
                    this.requestCount--;

                    if (this.requestCount == 0) {
                        this.spinnerVisibility = false;
                    }

                    if (_.isEmpty(this.takers.data) ) {
                        this.dropDownVisibility = false;
                    } else {
                        this.dropDownVisibility = true;
                    }
                });
        },
        

    }
}
</script>

<style>
.v-enter-active,
.v-leave-active {
  transition: opacity 0.1s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>