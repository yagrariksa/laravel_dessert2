@extends('template.admin')

@section('title')
    Atur Diskon
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin/diskon.css') }}">
@endsection

@section('content')
    @livewire('atur-diskon')
@endsection

@section('js')
    
@endsection