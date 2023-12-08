<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{url('postcreate')}}" method="post" enctype="multipart/form-data" class="flex flex-col mx-96 gap-4">
                        @csrf
                        <input type="text" name="title" id="" class="text-black" placeholder="Title">
                        <textarea name="desc" id="" cols="30" rows="10" class="text-black" placeholder="Description"></textarea>
                        <input type="text" name="cat" id="" class="text-black" placeholder="Category">
                        <input type="submit" value="submit" class="bg-white text-black p-2">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
