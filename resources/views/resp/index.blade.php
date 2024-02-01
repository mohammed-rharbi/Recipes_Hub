<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My recipes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <a href="{{ route('note.create') }}" style="margin: 150px" class="mb-5 text-white bg-blue-700 hover:bg-blue-800 rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700">+ Add New Recipe</a>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($resp as $item)

            <div class="my-6 p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex items-center">
                <div class="flex-none w-48 h-48 overflow-hidden">
                    <img src="{{ asset($item->image) }}" alt="Uploaded Image" class="object-cover w-full h-full" style="border-radius: 0 50% 50% 50%;">
                </div>
            
                <!-- Content Container -->
                <div class="ml-10 flex-grow mb-[120px] ">
                    <h2 class="font-bold text-3xl text-blue-700 hover:text-blue-800 mt-0 mb-4">
                        <a href="{{ route('note.show', $item->id) }}">{{ $item->title }}</a>
                    </h2>
                    <p class="text-gray-700">{{ Str::limit($item->content, 200) }}</p>
                </div>
            </div>    
            @endforeach

            {{ $resp->links() }}
        </div>
    </div>
</x-app-layout>
