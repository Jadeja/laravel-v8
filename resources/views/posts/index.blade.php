@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">

        @auth
            <form action="{{route('posts')}}" method="post">
                @csrf
                <div class="mb-4">
                    <textarea name="body" id="body" cols="30" rows="4" placeholder="Post Something" class="bg-gray-200 p-4 border-2 w-full rounded-lg @error('body') border-red-500 @enderror"></textarea>
                </div>
                @error("body")
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-4">
                    <input type="submit" name="sumit" 
                    class="bg-blue-500 border-2 text-white px-4 py-3 w-full rounded-lg font-medium" value="Post"/>                    
                </div>                
            </form>
        @endauth
        
            @if ($posts->count())
                @foreach ($posts as $post)
                <x-post :post=$post />
                @endforeach
                {{
                    $posts->links()
                }}
            @else
               <p> No Posts </p>
            @endif
        </div>
    </div>
@endsection('content')
