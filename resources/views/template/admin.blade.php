<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="icon" href="{{ asset('img/favico.png') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/adminnav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    @yield('css')
    @livewireStyles
</head>
<body>
    

    <div class="navbar">
        <div class="logo">
            <img id="menubtn" src="{{ asset('img/menubtn.png') }}" alt="">
            <img id="logobrand" src="{{ asset('img/logo.png') }}" alt="">
        </div>
        <a href="/logout" class="title text t-l t-uppercase t-bold" style="text-decoration: none;">
                Admin Site
        </a>
    </div>

    <div class="container">
        <div class="sidebar" id="sidebar">
            <a href="/admin/list"><div class="btn text t-uppercase t-sm {{ ($tipe == 'list') ? 'active' : ''}} ">List Barang</div></a>
            <a href="/admin/add"><div class="btn text t-uppercase t-sm {{ ($tipe == 'add') ? 'active' : ''}}">Tambah Barang</div></a>
            <a href="/admin/order"><div class="btn text t-uppercase t-sm {{ ($tipe == 'order') ? 'active' : ''}}">Atur Order</div></a>
            <a href="/admin/other"><div class="btn text t-uppercase t-sm {{ ($tipe == 'other') ? 'active' : ''}}">Pengaturan Lain</div></a>
            <a href="/admin/payment"><div class="btn text t-uppercase t-sm {{ ($tipe == 'payment') ? 'active' : ''}}">Rekening</div></a>
        </div>
        <div class="main-content">
            @yield('content')
            
        </div>
    </div>

    @yield('js')
    <script>
        const menubtn = document.getElementById('menubtn');
        const sidebar = document.getElementById('sidebar');
        const bodey = document.querySelector('body');
        menubtn.addEventListener('click',function(){
            sidebar.classList.toggle('active');
            menubtn.classList.toggle('active');
            bodey.classList.toggle('menubaractive');
            console.log("anjay");
        });
    </script>
    @livewireScripts
</body>
</html>