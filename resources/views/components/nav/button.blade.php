<button class="flex justify-start items-center space-x-6 hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 text-gray-700 rounded px-4 py-2  w-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        {{ $slot }} 
        </svg>
    <p class="text-base leading-4  ">{{ $title }}</p>                       
</button>