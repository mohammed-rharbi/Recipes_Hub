<x-guest-layout>
    
    
         
    <div class="container mx-auto px-4 lg:px-5 mt-10">
        <!-- Heading Row -->

    
    
        <form class="mx-auto mb-8 mt-32" action="{{ route('search') }}" method="GET">   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative w-full max-w-md mx-auto">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" name="keyword" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Search
                </button>
            </div>
        </form>
    
        <!-- Content Row -->
        <div class="flex flex-wrap -mx-4">

            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Result For ....') }}
                </h2>
            </x-slot>
        
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @foreach ($posts as $item)
        
                    <div class="my-6 p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex items-center">
                        <div class="flex-none w-48 h-48 overflow-hidden">
                            <img src="{{ asset($item->image) }}" alt="Uploaded Image" class="object-cover w-full h-full" style="border-radius: 0 50% 50% 50%;">
                        </div>
                    
                        <!-- Content Container -->
                        <div class="ml-10 flex-grow mb-[120px] ">
                            <h2 class="font-bold text-3xl text-blue-700 hover:text-blue-800 mt-0 mb-4">
                                <a href="{{ route('note.recipePage', $item->id) }}">{{ $item->title }}</a>
                            </h2>
                            <p class="text-gray-700">{{ Str::limit($item->content, 200) }}</p>
                        </div>
                    </div>
                
                    @endforeach
        
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>