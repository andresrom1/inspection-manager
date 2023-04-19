<x-inspectionIndex-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('INspecciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="inspections-table" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <inspection-table></inspection-table>
            </div>
        </div>
    </div>
</x-inspectionIndex-layout>