<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My recipe') }}
        </h2>
    </x-slot>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             
                    <div class="flex mt-4 space-x-4">

                        <!-- Edit Recipe Link -->
                        <a href="{{ route('note.edit', $recp->id) }}" style="margin-right: 30px" class="text-white rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700">Edit Recipe</a>
            
                        <!-- Delete Button -->
                        <form action="{{ route('note.destroy', $recp->id) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="text-white rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700" onclick="return confirm('Are you sure you want to delete this recipe')">Delete</button>
                        </form>
                    </div>

                    <div class="my-6 p-4 bg-gray-700 border-b border-gray-200 shadow-sm sm:rounded-lg flex items-center">
                        <div class="flex-none w-48 h-48 overflow-hidden">
                            <img src="{{ asset($recp->image) }}" alt="Uploaded Image" class="object-cover w-full h-full" style="border-radius: 0 50% 50% 50%;">
                        </div>
                    
                        <!-- Content Container -->
                        <div class="ml-10 flex-grow mb-[120px] ">
                            <h2 class="font-bold text-3xl text-blue-400 hover:text-blue-800 mt-0 mb-4">
                                <a href="{{ route('note.show', $recp->id) }}">{{ $recp->title }}</a>
                            </h2>
                            <p class="text-white">{{ Str::limit($recp->content, 500) }}</p>
                        </div>
                    </div>
                    <p class="opacity-70 text-white ">
                        <strong>Created At : {{ $recp->updated_at->diffForHumans() }}</strong>
                    </p>
                    
                    
                    
                    
        </div>
    </div>
</x-app-layout>
