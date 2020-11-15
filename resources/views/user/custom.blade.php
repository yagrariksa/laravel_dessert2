@extends('template.user')

@section('title')
    Custom Dessert
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/user/usercustom.css') }}">

@endsection

@section('content')
    
<div class="container">
    <div class="barang">

        <a href="/details/custom/{{$normal->id}}" style="text-decoration: none;" class="card">
            <img src="https://drive.google.com/uc?export=view&id={{$normal->imagelink}}" alt="">
            <div class="title">{{$normal->name}}</div>
        </a>
        <a href="/details/custom/{{$lowcal->id}}" style="text-decoration: none;" class="card">
            <img src="https://drive.google.com/uc?export=view&id={{$lowcal->imagelink}}" alt="">
            <div class="title">{{$lowcal->name}}</div>
        </a>

    </div>
</div>

@endsection