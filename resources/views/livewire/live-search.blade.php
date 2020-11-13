<div>
    <div class="navbar">
        <div class="logo">
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
        <a href="#" onclick="window.open('https://wa.me/message/53G6V32CFJODL1')" >Payment Confirmation</a>
        <a href="/order">My Order</a>
    </div>
    @if ($aksi)
        @if (sizeof($livesearch) != 0)   
        <div class="container special">
            <div class="barang">
                @foreach ($livesearch as $d)
                <a href="/details/{{$d->id}}" class="card" style="text-decoration: none; ">
                    <img src="https://drive.google.com/uc?export=view&id={{$d->imagelink}}" alt="{{$d->name}}">
                    <div style="text-align: center; text-size: 14px;">{{$d->category}}</div>
                    <h3>{{$d->name}}</h3>
                    <h4>Rp {{$d->price}}</h4>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    @else
    @endif

</div>
