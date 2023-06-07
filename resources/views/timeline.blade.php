<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tweeter') }}
        </h2>
    </x-slot>
    <div class="ml-40 pl-5 mt-14">
        <form action="" method="get">
            <input type="text" name="search" class="border border-gray-300 shadow  rounded p-3 h-5 w-60 bg-black" placeholder="Cari data..." value="{{ request('search') }}">
        </form>
    </div>
    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card bg-black">
                <div class="card-body">
                    <form action="{{ route('tweets.store')}}" method="post">
                        @csrf
                            <textarea name="content" class="textarea textarea-bordered w-full" placeholder="Apa yang kamu pikirkan?" style="background-color: #27292e" rows="3"></textarea>
                            <input type="submit" value="Tweet" class="btn btn-outline btn-warning">        
                    </form>
                
                </div>
            </div>

            @foreach ($tweets as $tweet)
            <div class="card my-4 bg-black card-bordered border-4 hover:border-t-8 w-full">
                <div class="card-body">
                    <h2 class="text-xl font-bold">{{ $tweet->user->name }}</h2>
                    <p>{{$tweet->content}}</p>
                    <div class="text-end">
                      @can('update', $tweet)
                        <a href="{{route('tweets.edit', $tweet->id) }}" class="link link-hover text-blue-400">Edit</a>
                      @endcan


                      @can('delete', $tweet)
                        <form action="{{ route('tweets.destroy', $tweet->id) }}" method="post">
                            @csrf
                          @method('delete')
                            <button type="submit" class="link link-hover text-red-400" name="_method" value="Delete">Delete</button>
                        </form>
                      @endcan

                        <span class="text-sm">{{ $tweet->created_at->diffForHumans()}}</span>
                    
                    </div>
                </div>
            </div>               
                @endforeach
            

        </div>
    </div>
</x-app-layout>
