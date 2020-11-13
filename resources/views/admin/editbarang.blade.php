@extends('template.admin')

@section('title')
    Edit Barang
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/selectform.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admintambah.css') }}">
@endsection
@section('content')
    
        <form action="/admin/edit/{{$data->id}}" method="post">
            @csrf
            <div class="label text t-m t-uppercase">Nama Barang</div>
            <input type="text" name="name" value="{{$data->name}}">
            <div class="label  text t-m t-uppercase">Harga Barang</div>
            <input type="number" name="price" value="{{$data->price}}">
            <div class="label  text t-m t-uppercase">Deskripsi</div>
            <textarea name="desc" id="" cols="30" rows="10">{{$data->desc}}</textarea>
            <div class="label  text t-m t-uppercase">Kategori</div>
            <div class="custom-select" style="width:200px; margin-bottom:10px;">
                <select name="kategori" id="cars">
                    <option value="normal">Pilih Kategori : </option>
                    @foreach ($category as $c)
                        <option value="{{$c->category}}" {{($data->category == $c->category) ? 'selected' : ''}}>{{$c->category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="label  text t-m t-uppercase">Ketersediaan</div>
            <div class="custom-select" style="width:200px; margin-bottom:10px;">
                <select name="ketersediaan" id="cars">
                    <option value="true">Ketersediaan : </option>
                    <option value="true" {{($data->available) ? 'selected' : ''}}>Tersedia</option>
                    <option value="false" {{($data->available) ? '' : 'selected'}}>Tidak Tersedia</option>
                </select>
            </div>
            <div class="label text t-m t-uppercase">ID Foto Barang</div>
            <small>gunakan ID gambar seperti petunjuk yang sudah diberikan</small> <br>
            <input type="text" name="imagelink" value="{{$data->imagelink}}">

            <div class="label text t-m t-uppercase">ID Foto Barang 2</div>
            <input type="text" name="imagelink2" value="{{$data->imagelink2}}">
            <div class="label text t-m t-uppercase">ID Foto Barang 3</div>
            <input type="text" name="imagelink3" value="{{$data->imagelink3}}">
            <div class="label text t-m t-uppercase">ID Foto Barang 4</div>
            <input type="text" name="imagelink4" value="{{$data->imagelink4}}">
            <div class="label text t-m t-uppercase">ID Foto Barang 5</div>
            <input type="text" name="imagelink5" value="{{$data->imagelink5}}">
            <div class="label text t-m t-uppercase">ID Foto Barang 6</div>
            <input type="text" name="imagelink6" value="{{$data->imagelink6}}">
            <div class="label text t-m t-uppercase">ID Foto Barang 7</div>
            <input type="text" name="imagelink7" value="{{$data->imagelink7}}">
            <div class="label text t-m t-uppercase">ID Foto Barang 8</div>
            <input type="text" name="imagelink8" value="{{$data->imagelink8}}">
            <div class="label text t-m t-uppercase">ID Foto Barang 9</div>
            <input type="text" name="imagelink9" value="{{$data->imagelink9}}">
            <div class="label text t-m t-uppercase">ID Foto Barang 10</div>
            <input type="text" name="imagelink10" value="{{$data->imagelink10}}">
    
            <button type="submit" class="btn btn-save text t-sm" style="width: fit-content;">
                Simpan perubahan
            </button>
        </form>
        
@endsection

@section('js')
<script src="{{ asset('js/selectform.js') }}"></script>
@endsection