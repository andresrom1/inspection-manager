<h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Fotos a solicitar:</h3>
<ul class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    <li>
        <input type="checkbox" name="frontOption" id="frontOption"            
        value="true" class="hidden peer"
        @isset($inspection->selected['frontOption'])
            @checked( old( 'frontOption', ($inspection->selected['frontOption'] == "true")? true:false ) )
        @endisset >

        <label for="frontOption" class="flex flex-col items-center justify-center p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                <div class="block">
                    <div class="flex flex-col place-items-center pt-5 pb-6">
                        <x-inspections.front />
    
                        <div for="frontOption" class="flex border-2 px-2 py-2 bg-gray-50 rounded-xl mt-5 items-center" :class="{hidden: step.spinner }">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                                </svg>
                                <p class="ml-2 text-sm text-gray-500 dark:text-gray-400">Subir fotos: <span class="font-bold">Frente</span></p>   
                        </div>
                    </div>
                </div>
        </label>
    </li>
    <li>
        <input type="checkbox" name="leftOption" id="leftOption"
        value="true" class="hidden peer"
        @isset($inspection->selected['leftOption'])
            @checked( old( 'leftOption', ($inspection->selected['leftOption'] == "true")? true:false ) ) )
        @endisset >

        <label for="leftOption" class="flex flex-col items-center justify-center p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
            <div class="block">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <x-inspections.left />

                    <div for="leftOption" class="flex border-2 px-2 py-2 bg-gray-50 rounded-xl mt-5 items-center" :class="{hidden: step.spinner }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                            </svg>
                            <p class="ml-2 text-sm text-gray-500 dark:text-gray-400">Subir fotos: <span class="font-bold">Izquierda</span></p>   
                    </div>
                </div>
            </div>
        </label>
    </li>
    <li>
        <input type="checkbox" name="backOption" id="backOption" 
        value="true" class="hidden peer"
        @isset($inspection->selected['backOption'])
            @checked( old( 'backOption', ($inspection->selected['backOption'] == "true")? true:false  ) )
        @endisset>
        <label for="backOption" class="flex flex-col items-center justify-center p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
            <div class="block">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <x-inspections.back />

                    <div for="backOption" class="flex border-2 px-2 py-2 bg-gray-50 rounded-xl mt-5 items-center" :class="{hidden: step.spinner }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                            </svg>
                            <p class="ml-2 text-sm text-gray-500 dark:text-gray-400">Subir fotos: <span class="font-bold">Atrás</span></p>   
                    </div>
                </div>
            </div>
        </label>
    </li>
    <li>
        <input type="checkbox" name="rightOption" id="rightOption" 
        value="true" class="hidden peer"
        @isset($inspection->selected['rightOption'])
            @checked( old( 'rightOption', ($inspection->selected['rightOption'] == "true")? true:false ) ) )
        @endisset>
        <label for="rightOption" class="flex flex-col items-center justify-center p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
            <div class="block">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <x-inspections.right />

                    <div for="rightOption" class="flex border-2 px-2 py-2 bg-gray-50 rounded-xl mt-5 items-center" :class="{hidden: step.spinner }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                            </svg>
                            <p class="ml-2 text-sm text-gray-500 dark:text-gray-400">Subir fotos: <span class="font-bold">Derecha</span></p>   
                    </div>
                </div>
            </div>
        </label>
    </li>
    <li>
        <input type="checkbox" name="wheelOption" id="wheelOption" 
        value="true" class="hidden peer"
        @isset($inspection->selected['wheelOption'])
            @checked( old( 'wheelOption', ($inspection->selected['wheelOption'] == "true")? true:false ) ) )
        @endisset>
        <label for="wheelOption" class="flex flex-col items-center justify-center p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
            <div class="block">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <x-inspections.wheel />

                    <div for="wheelOption" class="flex border-2 px-2 py-2 bg-gray-50 rounded-xl mt-5 items-center" :class="{hidden: step.spinner }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                            </svg>
                            <p class="ml-2 text-sm text-gray-500 dark:text-gray-400">Subir fotos: <span class="font-bold">Auxilio</span></p>   
                    </div>
                </div>
            </div>
        </label>
    </li>
    <li>
        <input type="checkbox" name="glassOption" id="glassOption" 
        value="true" class="hidden peer"
        @isset($inspection->selected['glassOption'])
            @checked( old( 'glassOption', ($inspection->selected['glassOption'] == "true")? true:false ) ) ) 
        @endisset>
        <label for="glassOption" class="flex flex-col items-center justify-center p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
            <div class="block">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <x-inspections.glass />

                    <div for="glassOption" class="flex border-2 px-2 py-2 bg-gray-50 rounded-xl mt-5 items-center" :class="{hidden: step.spinner }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                            </svg>
                            <p class="ml-2 text-sm text-gray-500 dark:text-gray-400">Subir fotos: <span class="font-bold">Parabrisa</span></p>   
                    </div>
                </div>
            </div>
        </label>
    </li>
    <li>
        <input type="checkbox" name="boardOption" id="boardOption" 
        value="true" class="hidden peer"
        @isset($inspection->selected['boardOption'])
            @checked( old( 'boardOption', ($inspection->selected['boardOption'] == "true")? true:false ) ) )
        @endisset>
        <label for="boardOption" class="flex flex-col items-center justify-center p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
            <div class="block">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <x-inspections.board />

                    <div for="boardOption" class="flex border-2 px-2 py-2 bg-gray-50 rounded-xl mt-5 items-center" :class="{hidden: step.spinner }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                            </svg>
                            <p class="ml-2 text-sm text-gray-500 dark:text-gray-400">Subir fotos: <span class="font-bold">Tablero</span></p>   
                    </div>
                </div>
            </div>
        </label>
    </li>
    <li>
        <input type="checkbox" name="cardOption" id="cardOption" 
        value="true" class="hidden peer"
        @isset($inspection->selected['cardOption'])
            @checked( old( 'cardOption', ($inspection->selected['cardOption'] == "true")? true:false ) ) )
        @endisset >
        
        <label for="cardOption" class="flex flex-col items-center justify-center p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
            <div class="block">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <x-inspections.carId />

                    <div for="cardOption" class="flex border-2 px-2 py-2 bg-gray-50 rounded-xl mt-5 items-center" :class="{hidden: step.spinner }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                            </svg>
                            <p class="ml-2 text-sm text-gray-500 dark:text-gray-400">Subir fotos: <span class="font-bold">Tarj. Verde</span></p>   
                    </div>
                </div>
            </div>
        </label>
    </li>
   
</ul>
