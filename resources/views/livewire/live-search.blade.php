<div>
    <div class="navbar">
        <div class="logo">
            <img id="menubtn" src="{{ asset('img/menubtn.png') }}" alt="">
            <a href="/">
                <img src="{{ asset('img/logo.png') }}" alt="">
            </a>
        </div>
        <div class="search">
            <input type="text" placeholder="Search" wire:model='cari'>
            <div class="cari" wire:click='carisekarang'>
                <img src="{{ asset('img/cari.png') }}" alt="">
            </div>
        </div>
        <div class="keranjang">
            @if (Session::has('cart'))
            <div id="angkacart"> 
                    {{Session::get('cart')->qty}}
                    {{-- {{dd(Session::get('cart','kosong'))}} --}}
                </div>
            @endif
            <a href="/cart">
                <img src="{{ asset('img/keranjang.png') }}" alt="">
            </a>
        </div>
    </div>

    <div class="nav" id="navkuy">
        <a href="/">Home</a>
        <a href="/lowcal">Low Calorie</a>
        <a href="/custom">Custom Dessert</a>
        <a href="#" onclick="window.open('https://wa.me/message/53G6V32CFJODL1')" >Payment Confirmation</a>
        <a href="/order">My Order</a>
    </div>

    {{-- <small># {{$aksi}} # {{$cari}} # {{$livesearch}} # </small> --}}
    @if ($aksi)
        @if (sizeof($livesearch) != 0)   
        <div class="container special">
            <div class="barang">
                @foreach ($livesearch as $d)
                <a href="/details/{{$d->id}}" class="card" style="text-decoration: none; ">
                    <img src="https://drive.google.com/uc?export=view&id={{$d->imagelink}}" alt="{{$d->name}}">
                    <div class="category">{{$d->category}}</div>
                    <div class="title">{{$d->name}}</div>
                    <div class="subtitle">Rp {{$d->price}}</div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    @else
    @endif

</div>
