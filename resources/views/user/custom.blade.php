@extends('template.user')

@section('title')
    Custom Dessert
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/user/usercustom.css') }}">

@endsection

@section('content')
    
<div class="container">
    <a href="/details/custom/{{$normal->id}}" style="text-decoration: none;" class="card">
        <img src="https://drive.google.com/uc?export=view&id={{$normal->imagelink}}" alt="">
        <h1>{{$normal->name}}</h1>
    </a>
    <a href="/details/custom/{{$lowcal->id}}" style="text-decoration: none;" class="card">
        <img src="https://drive.google.com/uc?export=view&id={{$lowcal->imagelink}}" alt="">
        <h1>{{$lowcal->name}}</h1>
    </a>
</div>

@endsection