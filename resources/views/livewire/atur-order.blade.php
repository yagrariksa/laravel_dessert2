<div>

    @if (!$detail)
        <h3>Set Filter</h3>
        <select style="padding: 5px; margin-bottom: 5px;" wire:model='filter' name="" id="">
            <option value="">Pilih Filter</option>
            <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
            <option value="Sedang Diporses">Sedang Diporses</option>
            <option value="Transaksi Selesai">Transaksi Selesai</option>
        </select>
        <div class=""><button style="padding: 5px; " wire:click='filter'>Set Filter</button>
        @if ($filterfix != null)
        <button style="padding: 5px; margin-left: 10px; " wire:click='resetfilter'>Reset Filter</button>
        @endif
        </div>
        <br>
        <table>
            <thead>
                <tr>
                    <th class="kode">Kode</th>
                    <th class="nama">Nama</th>
                    <th class="status">Status</th>
                    <th class="total">Total Biaya</th>
                    <th class="aksi">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)  
                <tr>
                    <td>{{$d->kode}}</td>
                    <td>{{$d->namaewa}}</td>
                    <td>{{$d->status}}</td>
                    <td>Rp {{$d->total}}</td>
                    <td>
                        <div class="btn" wire:click='detail({{$d->id}})'>Details</div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="height: 100px; overflow:hidden;"> 
            {{$data->links()}}
        </div>
    @else

        <h5 style="cursor: pointer; padding: 10px; background-color: #c1c1c1; width: fit-content;" wire:click='back'>kembali</h5> <br>
    
        @if ($ubahstatus)

        <div class="label">Ubah Status Pembayaran</div>
        <div class="info-user">
            <select wire:model='statusbayar' id="">
                <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                <option value="Sedang Diporses">Sedang Diporses</option>
                <option value="Transaksi Selesai">Transaksi Selesai</option>
            </select>
            
        </div>
        <div class=""><button wire:click='postubah'>Konfirmasi Ubah</button></div>
        @else


        <div id="container">
            <div class="col main-info">
                <h1>Kode Transaksi</h1>
                <div class="info">{{$transaksi->kode}}</div>
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
                        <div class=""><button wire:click='ubah'>UBAH</button></div>
                        
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

    @endif
</div>
