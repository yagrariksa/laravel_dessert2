@extends('template.user')

@section('title')
    Custom Dessert
@endsection

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/selectform.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/user/customdetails.css') }}">
@endsection

@section('content')
    @livewire('details-product', ['ide' => $ide])
@endsection

@section('js')
    {{-- <script src="{{ asset('js/selectform.js') }}"></script> --}}
@endsection