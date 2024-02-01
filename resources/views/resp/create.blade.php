<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Recipe') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">   
                <form action="{{ route('note.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
<div class="flex items-center justify-center w-full mb-8">
    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
        </div>
        <input id="dropzone-file" name="image"  type="file" class="hidden" />
        @error('image')
        <div class="text-red-600 text-sm">{{ $message }}</div> 
        @enderror
    </label> 
</div> 

{{-- <div class="form-group">
    <label for="category_id">Category:</label>
    <select name="category_id" id="category_id" class="form-control">
        @foreach($category as $categor)
            <option value="{{ $categor->id }}">{{ $categor->name }}</option>
        @endforeach
    </select>
</div> --}}
                    <label class="mt-5">Recipe title</label>
                    <input type="text" name="title" placeholder="title" class="w-full mb-5" autocomplete="of">
                    @error('title')
                    <div class="text-red-600 text-sm">{{ $message }}</div> 
                    @enderror
                    <label class="mt-6" >Recipe content</label>
                    <textarea name="content" class="w-full"  cols="30" rows="10" placeholder="recipe content here ...."></textarea>
                    @error('content')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                   @enderror
                    <button type="submit" class="mt-8 text-white bg-blue-700 hover:bg-blue-800 rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700">save recipe</button>

                </form>



            </div>
        </div>
       
    </div>
</x-app-layout>
