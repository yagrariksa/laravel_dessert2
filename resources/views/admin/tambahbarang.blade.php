@extends('template.admin')

@section('title')
    Tambah Barang
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/selectform.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admintambah.css') }}">
@endsection
@section('content')
    
        <form id="formgundul" action="/admin/add" method="post">
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
            <div class="label text t-m t-uppercase">ID Foto Barang 2</div>
            <div> 
                <input type="text" name="imagelink2"> <div class="disablebtn" id="2"> disable </div>
            </div>
            <div class="label text t-m t-uppercase">ID Foto Barang 3</div>
            <input type="text" name="imagelink3">
            <div class="label text t-m t-uppercase">ID Foto Barang 4</div>
            <input type="text" name="imagelink4">
            <div class="label text t-m t-uppercase">ID Foto Barang 5</div>
            <input type="text" name="imagelink5">
            <div class="label text t-m t-uppercase">ID Foto Barang 6</div>
            <input type="text" name="imagelink6">
            <div class="label text t-m t-uppercase">ID Foto Barang 7</div>
            <input type="text" name="imagelink7">
            <div class="label text t-m t-uppercase">ID Foto Barang 8</div>
            <input type="text" name="imagelink8">
            <div class="label text t-m t-uppercase">ID Foto Barang 9</div>
            <input type="text" name="imagelink9">
            <div class="label text t-m t-uppercase">ID Foto Barang 10</div>
            <input type="text" name="imagelink10">

    
            <button type="submit" class="btn btn-save text t-sm" style="width: fit-content;">
                Tambah Barang
            </button>
        </form>
        
@endsection

@section('js')
<script src="{{ asset('js/selectform.js') }}"></script>
    <script> 

        const dsbtn = document.getElementsByClassName('disablebtn');

        for(var i = 0; i < dsbtn.length; i++){
            dsbtn[i].style.padding = '3px 5px';
            dsbtn[i].style.border = '1px solid black';
            dsbtn[i].style.width = 'fit-content';
            dsbtn[i].style.cursor = 'pointer';
            dsbtn[i].addEventListener('click',function(e) {
                e.target.previousElementSibling.classList.contains('kosong');
                e.target.previousElementSibling.setAttribute('class','kosong');
                e.target.previousElementSibling.setAttribute('value','kosong');
                e.target.previousElementSibling.setAttribute('disabled','true');
            })
        }
    
    </script>
@endsection