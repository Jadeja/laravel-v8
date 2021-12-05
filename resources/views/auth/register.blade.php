@extends("layouts.app")

@section("content")
    <div class="flex items-center justify-center">
        <div class="w-4/12 p-6 bg-white rounded-lg">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Your Name" 
                    class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('name') border-red-500 @enderror" value="{{old('name')}}"/>
                    @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="sr-only">UserName</label>
                    <input type="text" name="username" id="name" placeholder="Enter Username" 
                    class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{old('username')}}"/>
                    @error('username')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter Your Email" 
                    class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{old('email')}}"/>
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
                    <label for="confirmation_password" class="sr-only">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="confirmation_password" placeholder="Confirmation Password" 
                    class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('password') border-red-500 @enderror" value=""/>
                </div>
                
                <div class="mb-4">
                    <input type="submit" name="sumit" 
                    class="bg-blue-500 border-2 text-white px-4 py-3 w-full rounded-lg font-medium" value="Submit"/>                    
                </div>
            </form>
        </div>
    </div>
@endsection