<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="table">
                        <form action="{{url('postswithcat')}}" method="get">
                            <input type="text" name="cat" id="" class="text-black">
                            <input type="submit" value="Filter" class="bg-white text-black p-3">
                        </form>
                        <div class="m-4 bg-red-200 text-black p-4">Post Title</div>
                        
                        @foreach($posts as $post )
                            <div class="m-4 bg-white text-black p-4">{{$post->title}}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
