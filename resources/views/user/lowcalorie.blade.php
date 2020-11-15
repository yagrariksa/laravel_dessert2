@extends('template.user')

@section('title')
    Low Calorie
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/user/userlowcalorie.css') }}">
@endsection

@section('content')
        
    <div class="container">
        <div class="barang">
            @foreach ($data as $d)
            <a href="/details/{{$d->id}}" class="card" style="text-decoration: none;">
                <img src="https://drive.google.com/uc?export=view&id={{$d->imagelink}}" alt="{{$d->name}}">
                <div class="title">{{$d->name}}</div>
                <div class="subtitle">Rp {{$d->price}}</div>
            </a>
            @endforeach
        </div>
    </div>

@endsection