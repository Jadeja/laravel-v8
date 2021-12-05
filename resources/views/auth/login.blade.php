@extends("layouts.app")

@section("content")
    <div class="flex items-center justify-center">
        <div class="w-4/12 p-6 bg-white rounded-lg">
            @if(session('status'))
            <div class="bg-red-500 text-center text-white p-4 mb-6 rounded-lg semi-bold">
                {{session('status')}}
            </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Enter Your Email" 
                    class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('email') border-red-500 @enderror" value=""/>
                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>                
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="name" placeholder="Choose Your Password" 
                    class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('password') border-red-500 @enderror" value=""/>
                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>                
                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember"> Remember me</label>
                    </div>
                </div>
                <div class="mb-4">
                    <input type="submit" name="sumit" 
                    class="bg-blue-500 border-2 text-white px-4 py-3 w-full rounded-lg font-medium" value="Submit"/>                    
                </div>
            </form>
        </div>
    </div>
@endsection