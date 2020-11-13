@extends('template.admin')

@section('title')
    Another Settings
@endsection

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/selectform.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/admin/adminother.css') }}">
@endsection

@section('content')
    @livewire('another-setting')
@endsection


@section('js')
{{-- <script src="{{ asset('js/selectform.js') }}"></script> --}}
@endsection