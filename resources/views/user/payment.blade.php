@extends('template.user')

@section('title')
    Payment
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/user/userpayment.css') }}">
@endsection

@section('content')
    
    <div class="container">
        <div class="credit">
            simpan atau catat kode transaksi anda untuk melakukan konfirmasi pembayaran maupun sekadar mengecek detail pesanan (atau screenshot layar anda sekarang)
        </div>
        <div class="main-info">
            <div class="title">
                Kode Transaksi Anda
            </div>
            <div class="kode-transaksi">
                {{$kode}}
            </div>
        </div>
        <div class="payment">
            <div class="title">
                Info Pembayaran
            </div>
            <div class="subtitle">
                segera lakukan pembayaran menggunakan metode yang sudah anda pilih
            </div>
            <div class="payment-info">
                {{$payment}}
            </div>
        </div>
        {{-- <div class="btn btn-direct">
            Lihat Detil Order
        </div> --}}
    </div>


@endsection