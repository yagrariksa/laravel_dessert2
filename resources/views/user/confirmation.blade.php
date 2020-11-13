@extends('template.user')

@section('title')
    Confirmation
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/selectform.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/userconfirmation.css') }}">
@endsection

@section('content')
<form method="POST" action="/confirmation/store">
    @csrf
    <div class="container">
        <div class="col">
            <h1>Identitas Pembeli</h1>
            <div class="form-group">
                <div class="label">Email</div>
                <input required name='email' type="email">
            </div>
            <div class="form-group">
                <div class="label">Nama</div>
                <input required name='name' type="text">
            </div>
            <div class="form-group">
                <div class="label">Nomor Telepon (WA)</div>
                <input required name='phone' type="text">
            </div>
            <div class="form-group">
                <div class="label">Alamat</div>
                <textarea name="addr" id="" cols="25" rows="10"></textarea>
            </div>
            <div class="form-group">
                <div class="label">Kecamatan</div>
                <input required name='kecamatan' type="text">
            </div>
            <div class="form-group">
                <div class="label">Kota</div>
                <input required name='kota' type="text">
            </div>
            <div class="form-group">
                <div class="label">Kode Pos</div>
                <input required name='kodepos' type="text">
            </div>
        </div>
        <div class="col">
            <div class="row">
                <h1>Metode Pembayaran</h1>
                <div class="form-group">
                    <div class="label">Pilih Metode Pembayaran</div>
                    <!-- special tag -->
                    <div class="custom-select" style="width:200px;">
                        <select name="metode" id="cars" required>
                            <option value="">Pilih Metode : </option>
                            @foreach ($metode as $m)
                            <option value="{{$m->metode}} : {{$m->rekening}} a.n {{$m->atasnama}}">{{$m->metode}}</option>
                            @endforeach
                        </select>
                    </div>
                <!-- special tag -->
                </div>
            </div>
            <div class="row">
                <h1>Detail Pesanan</h1>
                <div class="card">
                    <div class="title">
                        Info Pesanan
                    </div>
                    <div class="body">
                        @foreach ($cart->items as $item)
                            
                        <div class="items normal">
                            <div class="item-title">
                                {{$item->barang->name}}
                            </div>
                            <div class="item-details">
                                <div class="type">
                                    {{$item->barang->category}}
                                </div>
                                <div class="option">
                                    {{$item->desc}}
                                </div>
                                <div class="qty">
                                    QTY : {{$item->qty}}
                                </div>
                                <div class="item-price">
                                    Price : Rp {{$item->price}}
                                </div>
                                <div class="sub-total">
                                    Sub-Total : Rp {{$item->subtotal}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="price">
                        <div class="total-title">
                            TOTAL
                        </div>
                        <div class="total-price">
                            Rp. {{$cart->total}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-next">
                    Lanjutkan
                </button>
            </div>
        </div>
    </div>
</form>
@endsection

@section('js')
    <script src="{{ asset('js/selectform.js') }}"></script>
@endsection