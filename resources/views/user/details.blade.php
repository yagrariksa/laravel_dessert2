@extends('template.user')

@section('title')
    Details Barang
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/selectform.css') }}">
<link rel="stylesheet" href="{{ asset('css/user/userdetails.css') }}">
@endsection

@section('content')
    
<div class="container">
    <div class="row bag-1">
        <img src="{{asset('img/man.png') }}" alt="">
        <div class="col">
            <div class="product-name">{{$data->name}}</div>
            <small>{{$category->category}}</small>
            <div class="product-price">Rp. {{$data->price}}</div>

            <div class="label" for="label">QTY</div>
            <input type="text" name="qty">
            @foreach ($category->opsi as $opsi)
            <div class="label" for="pilihan">Select {{$opsi->name}}</div>
                
            <!-- special tag -->
            <div class="custom-select" style="width:200px;">
                <select name="cars" id="cars">
                    <option value="">{{$opsi->name}} : </option>
                    @foreach ($opsi->variasi as $variasi)
                    <option value="{{$variasi->name}}">{{$variasi->name}}</option>
                    @endforeach
                </select>
            </div>
            <!-- special tag -->
            @endforeach
            <!-- <input type="text" name="qty" id="pilihan"> -->

            
            <div class="btn-group">
                <div class="btn">ADD TO CHART</div>
                <div class="btn">BUY NOW</div>
            </div>
        </div>
    </div>
    <div class="row description">
        {{$data->desc}}
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/selectform.js') }}"></script>
    
@endsection