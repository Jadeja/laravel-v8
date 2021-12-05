<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>Laravel</title>
    </head>
    <body class="bg-gray-200">
        <nav class="p-6 bg-white flex justify-between mb-6">
            <ul class="flex items-center">
                <li class="p-3"><a href="{{ route('home') }}">Home</a></li>
                <li class="p-3"><a href="{{ route('dashboard')}}"> Dashboard </a></li>
                <li class="p-3"><a href="{{ route('posts')}}"> Post </a></li>
            </ul>
            <ul class="flex items-center">
                @auth
                <li class="p-3">Full Name</li>
                <li class="p-3"> <form action="{{route('logout')}}" method="post"> @csrf <button type="submit"> Logout </button></form></li>
                @endauth
                @guest
                <li class="p-3"> <a href="{{ route('login')}}"> Login </a> </li>
                <li class="p-3"> <a href="{{ route('register')}}"> Register </a> </li>   
                @endguest             
            </ul>            
        </nav>
        @yield('content')
    </body>
</html>    