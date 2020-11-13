@extends('template.admin')

@section('title')
    Atur Order
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/aturorder.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('css/user/userorder.css') }}"> --}}
    <style>
        .container{
            width: 90%;
        }
    </style>
@endsection

@section('content')
@livewire('atur-order')
@endsection