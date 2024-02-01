

     

<x-guest-layout>
    <div class="container mx-auto px-4 lg:px-5 mt-10">
        <!-- Heading Row -->
    
            <h1 class="text-5xl text-white text-center mt-16 mb-16">Descover Our Letest Recipes</h1>
        <div class="flex flex-col lg:flex-row items-center m-5 lg:my-10 ">
            @if ($resp->isNotEmpty())
                <!-- Display the latest recipe -->
                <div class="lg:w-1/2 lg:mr-8">
                    <img class="object-cover object-center w-full h-72 mb-4 lg:mb-0 rounded-full border-4 border-white" style="border-radius: 84% 16% 71% 29% / 43% 46% 54% 57%   ;" src="{{ asset($resp[0]->image) }}" alt="Latest Recipe Image" />
                </div>
                
                <div class="lg:w-1/2">
                    <h1 class="text-4xl font-light mb-2 text-white">
                        <a href="{{ route('note.recipePage', $resp[0]->id) }}">{{ $resp[0]->title }}</a>
                    </h1>
                    <p class="text-gray-400 mb-4">{{ Str::limit($resp[0]->content, 200) }}</p>
                    <a href="{{ route('note.recipePage', $resp[0]->id) }}" class="inline-block px-4 py-2 text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 rounded-md transition duration-300 ease-in-out">
                        Read More
                    </a></div>
            @endif    
        </div>
    
    
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
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @foreach ($resp as $item)
                    <div class="my-6 p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex flex-col sm:flex-row items-center">
                        <div class="flex-none w-48 h-48 overflow-hidden">
                            <img src="{{ asset($item->image) }}" alt="Uploaded Image" class="object-cover w-full h-full" style="border-radius: 0 50% 50% 50%;">
                        </div>
                        
                        <!-- Content Container -->
                        <div class="ml-0 sm:ml-10 flex-grow">
                            <h2 class="font-bold text-3xl text-blue-700 hover:text-blue-800 mt-0 mb-4">
                                <a href="{{ route('note.recipePage', $item->id) }}">{{ $item->title }}</a>
                            </h2>
                            <p class="text-gray-700">{{ Str::limit($item->content, 300) }}</p>
                        </div>
                        
                        <div class="mt-4 sm:mt-0">
                            <a href="{{ route('note.recipePage', $item->id) }}" class="inline-block px-4 py-2 text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 rounded-md transition duration-300 ease-in-out">
                                More
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
    </div>
    
</x-guest-layout>

