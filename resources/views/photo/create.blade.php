<x-photo-layout>
    <div class="mb-10 min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div id="photo-card">
            <!-- <photo-card angulo="Frente" :inspection= "{{ $inspection }}"> </photo-card> -->
            <photo-card :inspection= "{{ $inspection }}" :selected = "{{ collect($inspection->selected) }}" > </photo-card>
        </div>
    </div>
</x-photo-layout>
