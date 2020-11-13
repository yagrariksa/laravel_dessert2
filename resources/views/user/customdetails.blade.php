@extends('template.user')

@section('title')
    Custom Dessert
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/selectform.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/customdetails.css') }}">
@endsection

@section('content')

    <div class="container">
        <div class="row bag-1">
            <div class="col left">
                <img src="https://drive.google.com/uc?export=view&id={{$data->imagelink}}" alt="">
                <div class="description">
                    {{$data->desc}}
                </div>
            </div>
            <div class="col">
                <div class="product-name">{{$data->name}} 
                    <div class="subtitle">{{$category->category}}</div>
                </div>
                <div class="product-price">Rp. {{$data->price}}</div>

                <div class="label" for="label">QTY</div>
                <input type="text" name="qty">
                <div class="option">

                    @foreach ($category->opsi as $opsi)
                    <div class="pilihan">
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
                    </div>
                    @endforeach
                </div>

                <div class="btn-group">
                    <div class="btn">ADD TO CHART</div>
                    <div class="btn">BUY NOW</div>
                </div>
            </div>
        </div>
        
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/selectform.js') }}"></script>
@endsection