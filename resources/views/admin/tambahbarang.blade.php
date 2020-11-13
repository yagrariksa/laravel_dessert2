@extends('template.admin')

@section('title')
    Tambah Barang
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/selectform.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admintambah.css') }}">
@endsection
@section('content')
    
        <form action="/admin/add" method="post">
            @csrf
            <div class="label text t-m t-uppercase">Nama Barang</div>
            <input type="text" name="name">
            <div class="label  text t-m t-uppercase">Harga Barang</div>
            <input type="number" name="price">
            <div class="label  text t-m t-uppercase">Deskripsi</div>
            <textarea name="desc" id="" cols="30" rows="10"></textarea>
            <div class="label  text t-m t-uppercase">Kategori</div>
            <div class="custom-select" style="width:200px; margin-bottom:10px;">
                <select name="kategori" id="cars">
                    <option value="normal">Pilih Kategori : </option>
                    @foreach ($category as $c)
                        <option value="{{$c->category}}">{{$c->category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="label  text t-m t-uppercase">Ketersediaan</div>
            <div class="custom-select" style="width:200px; margin-bottom:10px;">
                <select name="ketersediaan" id="cars">
                    <option value="true">Ketersediaan : </option>
                    <option value="true">Tersedia</option>
                    <option value="false">Tidak Tersedia</option>
                </select>
            </div>
            <div class="label text t-m t-uppercase">ID Foto Barang</div>
            <small>gunakan ID gambar seperti petunjuk yang sudah diberikan</small> <br>
            <input type="text" name="imagelink">
    
            <button type="submit" class="btn btn-save text t-sm" style="width: fit-content;">
                Tambah Barang
            </button>
        </form>
        
@endsection

@section('js')
<script src="{{ asset('js/selectform.js') }}"></script>
@endsection