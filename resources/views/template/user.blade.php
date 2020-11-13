<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/user/nav.css') }}">
    @yield('css')
    @livewireStyles
</head>
<body>

    <div class="navbar">
        <div class="logo">
            <a href="/">
                <img src="{{ asset('img/logo.png') }}" alt="">
            </a>
        </div>
        <div class="search">
            <input type="text" placeholder="Search">
        </div>
        <div class="keranjang">
            @if (Session::has('cart'))
            <h5 style="margin-right: 5px; padding:3px; border-radius: 10px; background-color: black; color: white; cursor:default; text-align: center"> 
                    {{Session::get('cart')->qty}}
                    {{-- {{dd(Session::get('cart','kosong'))}} --}}
                </h5>
            @endif
            <a href="/cart">
                <img src="{{ asset('img/keranjang.png') }}" alt="">
            </a>
        </div>
    </div>

    <div class="nav">
        <a href="/">Home</a>
        <a href="/lowcal">Low Calorie</a>
        <a href="/custom">Custom Dessert</a>
        <a href="#">Payment Confirmation</a>
        <a href="/order">My Order</a>
    </div>


    @yield('content')


    <footer>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci earum ab eligendi, inventore nobis soluta voluptatem molestias optio voluptates tempora consectetur consequatur omnis animi cumque debitis numquam iusto dolores veritatis!
    </footer>
    
    @yield('js')
    @livewireScripts
</body>
</html>