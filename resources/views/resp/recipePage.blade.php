<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $recp->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="my-6 p-8 bg-white border rounded-lg shadow-md flex items-center">
                    <div class="flex-none w-72 h-72 overflow-hidden">
                        <img src="{{ asset($recp->image) }}" alt="Recipe Image" class="object-cover w-full h-full rounded-lg">
                    </div>
                    
                    <!-- Content Container -->
                    <div class="ml-10 flex-grow text-center">
                        <h2 class="font-bold text-4xl text-blue-700 hover:text-blue-800 mb-4">
                            <a href="{{ route('note.show', $recp->id) }}">{{ $recp->title }}</a>
                        </h2>
                        <p class="text-gray-700 text-lg">{{ $recp->content }}</p>
                    </div>
                </div>
                <p class="opacity-70 text-gray-300 mt-4">
                    <strong>Created At: {{ $recp->created_at->diffForHumans() }}</strong>
                </p>
        </div>
    </div>
    
</x-guest-layout>
