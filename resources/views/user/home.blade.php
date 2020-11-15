@extends('template.user')

@section('title')
    Home
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/user/userhome.css') }}">
@endsection

@section('content')
    
<div class="container">

    <div class="iklan">
        <div class="iklan-gambar"></div>
        <div class="pengumuman">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam temporibus explicabo recusandae illo expedita consequuntur!
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