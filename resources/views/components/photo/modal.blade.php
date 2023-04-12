<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                
                <div id="custom-controls-gallery" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-80 overflow-hidden rounded-lg md:h-96">

                    @foreach ($photos as $photo)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset($photo->url) }}" alt="">
                        </div>
                    @endforeach
                    
                </div>
                <div class="grid grid-cols-3">
                    <div></div>
                    <div class="flex justify-center items-center pt-4">
                        <button type="button" class="flex justify-center items-center mr-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="flex justify-center items-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                    <div class="flex justify-end pt-4">
                        <button type="button" class="z-50 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                </div>
            </div>

            </div>
            <!-- Modal footer -->

        </div>
    </div>
</div>

<!-- Modal toggle -->