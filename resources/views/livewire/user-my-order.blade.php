<div>


    
    @if (!$detail)
        <div class="row search" style="flex-direction: row">
            <input type="text" wire:model='kodok' placeholder="Masukkan Kode Transaksi">
            <button wire:click='detail'> CEK </button> <br>
            <h1>{{$error}}</h1>
        </div>
        @else
        <div class="container">
            <div class="col main-info">
                <h1>Kode Transaksi</h1>
                <div class="info">{{$transaksi->kode}}</div>
                <button style="width: fit-content" wire:click='search'>CARI LAIN</button>
            </div>
            <div class="col main-info">
                <h1>Status Pesanan</h1>
                <div class="info">{{$transaksi->status}}</div>
            </div>
            <div class="col">
                <h1>Identitas Pembeli</h1>
                <div class="form-group">
                    <div class="label">Email</div>
                    <div class="info-user">{{$client->email}}</div>
                </div>
                <div class="form-group">
                    <div class="label">Nama</div>
                    <div class="info-user">{{$client->name}}</div>
                </div>
                <div class="form-group">
                    <div class="label">Nomor Telepon (WA)</div>
                    <div class="info-user">{{$client->phone}}</div>
                </div>
                <div class="form-group">
                    <div class="label">Alamat</div>
                    <div class="info-user">{{$client->addr}}</div>
                </div>
                <div class="form-group">
                    <div class="label">Kecamatan</div>
                    <div class="info-user">{{$client->kecamatan}}</div>
                </div>
                <div class="form-group">
                    <div class="label">Kota</div>
                    <div class="info-user">{{$client->kota}}</div>
                </div>
                <div class="form-group">
                    <div class="label">Kode Pos</div>
                    <div class="info-user">{{$client->kodepos}}</div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <h1>Metode Pembayaran</h1>
                    <div class="form-group">
                        <div class="label">Pilihan Metode Pembayaran</div>
                        <div class="info-user">{{$transaksi->payment}}</div>
                    </div>
                    <div class="form-group">
                        <div class="label">Status Pembayaran</div>
                        <div class="info-user">{{$transaksi->status}}</div>
                    </div>
                </div>
                <div class="row">
                    <h1>Detail Pesanan</h1>
                    <div class="card">
                        <div class="title">
                            Info Pesanan
                        </div>
                        <div class="body">
                            @foreach ($barang as $b)  
                            <div class="items normal">
                                <div class="item-title">
                                    {{$b->benda->name}}
                                </div>
                                <div class="item-details">
                                    <div class="type">
                                        ##{{$b->benda->category}}##
                                    </div>
                                    <div class="option">
                                        >> {{$b->deskripsi}}
                                    </div>
                                    <div class="qty">
                                        >> qty : {{$b->qty}}
                                    </div>
                                    <div class="item-price">
                                        >> Price : Rp {{$b->price}}
                                    </div>
                                    <div class="sub-total">
                                        >> Sub-Total : Rp {{$b->subtotal}}
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
                                Rp. {{$transaksi->total}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


</div>
