<x-photo-layout>
    <div class="mb-10 min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div id="photo-card">
            <photo-card angulo="Frente" :inspection= "{{ $inspection }}"> </photo-card>
        </div>
        <!-- <x-inspections.card angulo="Frente" :inspection=$inspection/> -->
    </div>
    {{ $inspection->id }}
</x-photo-layout>
