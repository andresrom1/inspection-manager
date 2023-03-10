<div class="flex items-center justify-center w-60 h-60 mt-10">
    <form action="{{ route('photo.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                @if ($angulo == 'Frente')
                    <x-inspections.front />
                @elseif ($angulo == 'Izquierdo')
                    <x-inspections.left />
                @elseif ($angulo == 'Atrás')
                    <x-inspections.back />
                @elseif ($angulo == 'Derecho')
                    <x-inspections.right />
                @elseif ($angulo == 'Auxilio')
                    <x-inspections.wheel />
                @endif
                <div class="border-2 px-2 py-2 bg-gray-50 rounded-xl mt-5 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                    </svg>
                    <p class="ml-2 text-sm text-gray-500 dark:text-gray-400">Subir foto: <span class="font-bold">{{ $angulo }}</span></p>
                </div>
                
            </div>
            <input id="image" name="image" type="file"  capture/>
            <input id="inspection" name="inspection" type="text" value="{{ $inspection->id }}" hidden/>
        </label>
        <div class="mt-10 flex justify-center">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Siguiente</button>
        </div>
    </form>
    {{ $inspection->id }}
</div>