<template>
    <div ref="postImage" class="flex items-center justify-center w-60 h-60">
        <!-- <form @submit.prevent="uploadFile" enctype="multipart/form-data" method="POST" action="{{ route('photo.store') }}"> -->
            <label for="camera-front" class="dz-clickable flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">

                    <div v-show="this.fileAdded == false" class="flex flex-col items-center justify-center pt-5 pb-6">

                        <front :class="{hidden: !step.frente }" />
                        <left :class="{hidden: !step.izquierdo }" />
                        <back :class="{hidden: !step.atras }" />
                        <right :class="{hidden: !step.derecho }" />
                        <wheel :class="{hidden: !step.auxilio }" />
                        
                        <div role="status" :class="{hidden: !step.spinner }">
                            <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>

                        <div for="camera-front" class="flex border-2 px-2 py-2 bg-gray-50 rounded-xl mt-5 items-center" :class="{hidden: step.spinner }">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                                </svg>
                                <p class="ml-2 text-sm text-gray-500 dark:text-gray-400">Subir fotos: <span class="font-bold">{{ this.step.angulo }}</span></p>   
                        </div>
                    </div>
                    <div class="dropzone-previews">
                        <div id="dz-template" class="hidden">
                            <div class="dz-preview dz-file-preview">
                                <div class="dz-details flex flex-col">
                                    <div class="dz-progress">
                                        <span class="dz-upload" data-dz-uploadprogress></span>
                                    </div>
                                    <img data-dz-thumbnail class="w-44 h-44 rounded-xl">
                                    
                                    <div data-dz-remove class="z-50 flex border-2 px-2 py-2 mb-1 bg-gray-50 rounded-xl mt-3 justify-center items-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="dz-clickable h-5 w-5 stroke-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                        <p class="ml-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-bold">Eliminar</span></p>   
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>

                
                
                <!-- <input id="camera-front" type="file" ref="file" name="file" class="hidden dz-clickable" @change="selectFile" capture/> -->
                <input id="inspection" name="inspection" type="text" value="{{ this.inspection['id'] }}" hidden/>
                
                
            </label>
            
    </div>
        <div class="mt-10 flex justify-center">
            <button @click="postHandler" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Siguiente</button>
        </div>
</template>

<script>
import front from './front.vue';
import left from './left.vue';
import back from './back.vue';
import right from './right.vue';
import wheel from './wheel.vue';
import spinner from './spinner.vue';
import Dropzone from 'dropzone';

export default {
    data: () => ({
        dropzone: null,
        image: null,
        fileAdded: false,
        step: 'Frente',
        step: {
            angulo: "Frente",
            status: 0,
            frente: true,
            izquierdo: false,
            atras: false,
            derecho: false,
            auxilio: false,
            spinner: false,
        },
        urlToRedirect: '',
        statusChanged: false,
    }),
    components: 
    {
        front,
        left,
        back,
        right,
        wheel,
        spinner,
    },
    props: {
        angulo: {
            type: String
        },
        inspection: {}
    },


    methods: {
        postHandler () {
            if (this.dropzone.getAcceptedFiles().length) {
                this.dropzone.processQueue();
                this.next();
                this.changeStatus();
            } else {
                console.log(this.dropzone.getAcceptedFiles());
                alert ('No hay archivo');
            }
        },
        changeStatus() {
            if ( this.statusChanged == false ) {
                axios
                    .post('/inspection/' + this.inspection['id'] + '/updateStatus', {
                        status: 'Foto agregada'
                    })
                    .then(response => (
                        this.statusChanged = true
                ));
            }
        },
        thankYouMessage() {
            if (this.step.status == 5) {
                axios
                    .get('/thankyou')
                    .then(response => (
                        console.log(response.request.responseURL),
                        this.urlToRedirect = response.request.responseURL,
    
                        window.location.href = this.urlToRedirect
                        
                    ));            
            }
        },

        next() {

            this.step.status++;

            if(this.step.status == 0)
            {
                this.step.angulo = "Frente";
                this.step.frente = true;
                this.step.izquierdo = false;
                this.step.atras = false;
                this.step.derecho = false;
                this.step.auxilio = false;
                console.log(this.step)
                return;
                
            } 
            if(this.step.status == 1)
            {
                this.step.angulo = "Izquierdo";
                this.step.frente = false,       //0
                this.step.izquierdo = true,     //1
                this.step.atras = false,        //2
                this.step.derecho = false,      //3
                this.step.auxilio = false,      //4
                console.log(this.step)
                return;
            }
            
            if(this.step.status == 2)
            {
                this.step.angulo = "Atrás";
                this.step.frente = false,       //0
                this.step.izquierdo = false,     //1
                this.step.atras = true,        //2
                this.step.derecho = false,      //3
                this.step.auxilio = false,      //4
                console.log(this.step)
                return;
            }
            
            if(this.step.status == 3)
            {
                this.step.angulo = "Derecho";
                this.step.frente = false,       //0
                this.step.izquierdo = false,     //1
                this.step.atras = false,        //2
                this.step.derecho = true,      //3
                this.step.auxilio = false,      //4
                console.log(this.step)
                return;
            }
            
            if(this.step.status == 4)
            {
                this.step.angulo = "Auxilio";
                this.step.frente = false,       //0
                this.step.izquierdo = false,     //1
                this.step.atras = false,        //2
                this.step.derecho = false,      //3
                this.step.auxilio = true, 
                console.log(this.step)
                return;     //4
                
            }
            if(this.step.status == 5)
            {
                this.step.spinner = true,
                this.step.angulo = "";
                this.step.frente = false,       //0
                this.step.izquierdo = false,     //1
                this.step.atras = false,        //2
                this.step.derecho = false,      //3
                this.step.auxilio = false,      //4
                console.log(this.step)
                //this.thankYouMessage()        
            }
        },
    },

    mounted () {
        this.dropzone = new Dropzone(this.$refs.postImage, this.settings);
        this.dropzone.on("addedfile", file => {
            console.log("A file has been added");
            this.fileAdded = true;
        });
        this.dropzone.on("removedfile", file => {
            console.log("A file has been removed");
            this.fileAdded = false;
        });
    },

    computed: {
        settings () {
            return {
                paramName: 'image',
                url: 'https://api.cloudinary.com/v1_1/dnxwqfevm/image/upload',
                acceptedFiles: 'image/*',
                clickable: '.dz-clickable',
                autoProcessQueue: false,
                maxFiles: 1,
                capture: 'file',
                previewsContainer: '.dropzone-previews',
                previewTemplate: document.querySelector('#dz-template').innerHTML,
                maxFileSize: 20,
                parallelUploads: 1,
                params: {
                    'inspection': this.inspection['id'],
                },
                headers: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                },
                sending: (file, xhr, formData) => {
                    formData.append('inspection',this.inspection['id']);
                    // Cloudinary
                    formData.append('upload_preset', 'tg0jdhgj');
                    formData.append('api_key', '552537444376275');
                    formData.append('file', file);
                    // end Cloudinary
                    
                },
                success: (event, res) => {
                    console.log(res);
                    axios
                        .post('/photo/cloudinaryUpload/' + this.inspection['id'], {
                                response: res
                            })
                            .then(response => (
                                this.dropzone.removeAllFiles()
                            ))
                            .then(response => (
                                console.log()
                            ));
                  
                },
                maxfilesexceeded: file => {
                    this.dropzone.removeAllFiles();
                    this.dropzone.addFile(file);
                },
            }
        },
    },
}

</script>


<style>
.dz-details {
    position: relative;
}
.dz-progress {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    height: 10px;
    width: 100%;
    margin-top: 5px;
    position: relative;
    border: none;
    background: #fff;
}

.dz-upload {
    height: 100%;
    background: #67c23a;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 999;
}
</style>