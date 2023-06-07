<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tweeter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card  my-4 bg-black card-bordered border-4 hover:border-t-8 w-full">
                <div class="card-body">
                    <form action="{{ route('tweets.update', $tweet->id)}}" method="post">
                        @csrf
                        @method('put')
                            <textarea name="content" class="textarea textarea-bordered w-full" placeholder="Apa yang kamu pikirkan?" style="background-color: #27292e" rows="3"></textarea>
                            <input type="submit" value="Edit" class="btn btn-outline btn-warning">        
                    <form>
                </div>
            </div>





</x-app-layout>
