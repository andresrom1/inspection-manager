<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Inspección') }}
        </h2>
    </x-slot>

    <div class="py-1 flex items-center">
        <div class="mx-auto">
            <div class="h-screen
             bg-white dark:bg-gray-800 overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">         
                
                    <div class="flex divide-x-4 divide-dotted">
                        <form>
                            <div id="mail-search" class="pr-5">
                                @csrf 
                                <mail-search>
                            </div>
                            <hr class="my-5">
                            <div id="policy-search">
                                <policy-search>
                            </div>
                        </form>

                        <div class="h-full pl-5">
                                <p>alkjdlasssssssssssssssssj</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
