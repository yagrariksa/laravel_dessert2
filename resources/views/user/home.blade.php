@extends('template.user')

@section('title')
    Home
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/user/userhome.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/user/userhome.css') }}">
@endsection

@section('content')
    
<div class="container">

    <div class="iklan">
        <div class="iklan-gambar">
            @foreach ($iklanimg as $i)
            <div class="gambariklan" style="background-image:url(http://drive.google.com/uc?export=view&id={{$i->link}})" alt=""> </div>
            @endforeach
            @for ($i = 0; $i < $dummy; $i++)
            <div class="gambariklan" style="background-image:url(https://source.unsplash.com/1601x901/?object)" alt=""> </div>
            @endfor
        </div>
        <div class="pengumuman">
            @if ($promo !=null)
            {{$promo->link}}
            @else
            Selamat Datag                
            @endif
        </div>
    </div>

    <div class="barang">
        @foreach ($data as $d)
        <a href="/details/{{$d->id}}" class="card" style="text-decoration: none; ">
            <img src="https://drive.google.com/uc?export=view&id={{$d->imagelink}}" alt="{{$d->name}}">
            <div class="category">{{$d->category}} desert</div>
            <div class="title">{{$d->name}}</div>
            <div class="subtitle">Rp {{$d->price}}</div>
        </a>
        @endforeach
    </div>
</div>

@endsection

@section('js')
    <script>
        const iklangambar = document.querySelector('div.iklan-gambar');
        const badang = document.querySelector('body');
        if(badang.offsetWidth < 500){
            iklangambar.style.height = String(iklangambar.offsetWidth / 2) + 'px';
        }else if(badang.offsetWidth < 800){
            iklangambar.style.height = '100%';
        }else{
            iklangambar.style.height = String(iklangambar.offsetWidth / 2.5) + 'px';
        }
        iklanan();
        function iklanan(){
            iklanbos();
            setInterval(() => {
                iklanbos()
            }, 9000);
        }
        // setInterval(iklanbos(), 100)

        function iklanbos(){
            var pos0 = 'translateX(0%)';
            var pos1 = 'translateX(-100%)';
            var pos2 = 'translateX(-200%)';
            var imgiklan = document.querySelectorAll('div.gambariklan');
            geser(imgiklan,pos0);
            setTimeout(() => {
                geser(imgiklan,pos1);
            }, 3000);
            setTimeout(() => {
                geser(imgiklan,pos2);
            }, 6000);
        }

        function geser(objek, target){
            for(var i = 0; i < objek.length; i++){
                objek[i].style.transform = target;
            }
        }

    </script>
    
@endsection