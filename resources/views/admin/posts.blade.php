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
                <table class="border-collapse border border-slate-500">
                    <thead>
                        <tr>
                            <th class="border border-slate-600 p-3">Post</th>
                            <th class="border border-slate-600 p-3">Status</th>
                            <th class="border border-slate-600 p-3">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td class="border border-slate-700 p-3">{{$post->title}}</td>
                            <td class="border border-slate-700 p-3">
                                @if ($post->status=='not_approved')
                                <a href="{{url('admin/aprove/'.$post->id)}}" class="p-3 m-2 bg-green-500 text-white">Aprove</a>    
                                @else
                                    <p>Aproved</p>
                                @endif
                                
                            </td>
                            <td class="border border-slate-700 p-3">
                                @if (!$post->trashed())
                                <a href="{{url('admin/trash/'.$post->id)}}" class="p-3 m-2 bg-yellow-500 text-white">Trash</a>    
                                @else
                                    {{__('Trashed')}}
                                @endif
                                
                                <a href="{{url('admin/delete/'.$post->id)}}" class="p-3 m-2 bg-red-700 text-white">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
