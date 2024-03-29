<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Fotos de la Inspección') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-photo.modal :photos="$photos"></x-photo.modal>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" text-gray-900 dark:text-gray-100 grid grid-cols-4 px-4 py-4 gap-4">
                    @foreach ($photos as $photo)    
                        <x-photo.card :photo="$photo"></x-photo.card>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>