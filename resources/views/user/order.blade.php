@extends('template.user')

@section('title')
    My Order
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/user/userorder.css') }}">
@endsection

@section('content')
@livewire('user-my-order')   

@endsection