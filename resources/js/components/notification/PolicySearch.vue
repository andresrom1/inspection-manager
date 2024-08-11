<template> 
<div class="relative max-w-fit md:mt-0">
    <input 
        class="w-full h-10 px-4 pl-8 py-1 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        type="text"
        id="policyNumber" 
        placeholder="Número de póliza"
        v-model="policySearchTerm"
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
        <div v-if="dropDownVisibility" class="z-50 absolute text-sm rounded-xl border-2 p-3 whitespace-nowrap mt-4">               
            <ul>
                <li v-if="policies.data.length == 1" class="text-xs">{{ policies.data.length  }} resultado</li>                               
                <li v-else class="text-xs">{{ policies.data.length  }} resultados</li>                               
                <li class="align-bottom border-b py-2 hover:bg-gray-100 border-gray-300"
                    v-for="(policy,index) in policies.data"
                    @click="policyClicked(policy)" 
                    :key="index">
                        <span class="ml-2 text-blue-500 align-text-bottom" ><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" /></svg></span>
                        <span class="ml-1">{{ policy.company }}</span>
                        <span class="ml-2 text-green-500 align-text-bottom"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" /></svg></span>
                        <span class="ml-1"> {{ policy.insuranceObject }}</span>
                        <span class="ml-2 text-red-500 align-text-bottom"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" /></svg></span>
                        <span class="ml-1"> {{ policy.installments }}</span>
                        <span class="ml-2 text-amber-500 align-text-bottom"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" /></svg></span>
                        <span class="ml-1 text-xs">{{ policy.fromDate}} - {{ policy.toDate }}</span>
                </li>

            </ul>
        </div>
    </transition>       
</div>

<div class ="flex mt-2">
    <div>
        <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Compañía</label>
        <input type="text" id="company" name="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required>
    </div>
    <div>
        <label for="policyNumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Póliza</label>
        <input type="text" id="policyNumber" name="policyNumber" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required>
    </div>
    <div class="w-12">
        <label for="installments" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cuotas</label>
        <input type="number" id="installments" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
    </div>
</div> 
<div>
    <div date-rangepicker datepicker-format="dd/mm/yyyy" class="flex items-center">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
            </div>
            <input datepicker-format="mm/dd/yyyy" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Inicio vigencia">
        </div>
        <span class="mx-4 text-gray-500">hasta</span>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
            </div>
            <input datepicker-format="mm/dd/yyyy" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Fin vigencia">
        </div>
    </div>
</div>


</template>

<script>
export default {
    data: () => ({
        policySearchTerm:'',
        policyNumber: '',
        company:'',
        installments:'',
        insuranceObject:'',
        fromDate:'',
        toDate:'',
        policyUrl:'',
        spinnerVisibility: false,
        dropDownVisibility: false,
        requestCount: 0,
        policies:'',
        debounce: null,
        takerId:'',
        policyId:''
    }),
    mounted() {
        sessionStorage.clear();
        document.addEventListener('click', this.clickOutListener);
    },
    methods: {
        policyClicked (policy) {
            // Flashear la data de la póliza en la sesion del navegador.
            this.policyid = console.log(policy.id);
            this.policyNumber = console.log(policy.policyNumber);
            this.takerId = console.log(policy.taker_id);
            this.company = console.log(policy.company);
            this.insuranceObject = console.log(policy.insuranceObject);
            this.installments = console.log(policy.installments);
            this.fromDate = console.log(policy.fromDate);
            this.toDate = console.log(policy.toDate);
            
            sessionStorage.setItem('policy_id', policy.id); 
            // sessionStorage.setItem('taker_phone', taker.phone); 
            this.closeDropdown();
        },
        closeDropdown() {
            this.dropDownVisibility = false;
        },
        openDropdown () {
            if (_.isEmpty(this.policies.data) ) {
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
                this.policyInput();
            },1000)
        },

        policyInput () {

            if (sessionStorage.getItem("taker_id")) {
                this.takerId = sessionStorage.getItem("taker_id");
            } else {
                this.takerId = '';
            }

            this.requestCount++;

            console.log('Término e búsqueda: ' + this.policySearchTerm + '&takerId=' + this.takerId)
            axios.get('/policy?search=' + this.policySearchTerm + '&takerId=' + this.takerId)
            .then(response => {
                // manejar respuesta exitosa
                this.policies = response;   
                console.log('Polizas ' + this.policies);         
                })
                .catch(function (error) {
                    // manejar error
                    console.log('Estoy aqui: ' + error);
                })
                .finally(response => {
                    this.requestCount--;

                    if (this.requestCount == 0) {
                        this.spinnerVisibility = false;
                    }

                    if (_.isEmpty(this.policies.data) ) {
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
