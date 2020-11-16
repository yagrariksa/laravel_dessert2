@extends('template.admin')

@section('title')
    atur iklan
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/adminiklan.css') }}">
@endsection

@section('content')
    @livewire('atur-iklan')
@endsection

@section('js')
    <script>
        
    </script>
@endsection