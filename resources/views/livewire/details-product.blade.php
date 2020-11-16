
    <div class="container">
        <div class="row bag-1">
            <div class="col left">
                <img id="mainimage" src="https://drive.google.com/uc?export=view&id={{$data->imagelink}}" alt="">
                <div class="imglist" id="fotoproduct"> 
                    <img class="detailimage" src="https://drive.google.com/uc?export=view&id={{$data->imagelink}}" alt="">
                    @if ($data->imagelink2 != 'kosong')
                    <img class="detailimage" src="https://drive.google.com/uc?export=view&id={{$data->imagelink2}}" alt="">
                    @endif
                    @if ($data->imagelink3 != 'kosong')
                    <img class="detailimage" src="https://drive.google.com/uc?export=view&id={{$data->imagelink3}}" alt="">
                    @endif
                    @if ($data->imagelink4 != 'kosong')
                    <img class="detailimage" src="https://drive.google.com/uc?export=view&id={{$data->imagelink4}}" alt="">
                    @endif
                    @if ($data->imagelink5 != 'kosong')
                    <img class="detailimage" src="https://drive.google.com/uc?export=view&id={{$data->imagelink5}}" alt="">
                    @endif
                    @if ($data->imagelink6 != 'kosong')
                    <img class="detailimage" src="https://drive.google.com/uc?export=view&id={{$data->imagelink6}}" alt="">
                    @endif
                    @if ($data->imagelink7 != 'kosong')
                    <img class="detailimage" src="https://drive.google.com/uc?export=view&id={{$data->imagelink7}}" alt="">
                    @endif
                    @if ($data->imagelink8 != 'kosong')
                    <img class="detailimage" src="https://drive.google.com/uc?export=view&id={{$data->imagelink8}}" alt="">
                    @endif
                    @if ($data->imagelink9 != 'kosong')
                    <img class="detailimage" src="https://drive.google.com/uc?export=view&id={{$data->imagelink9}}" alt="">
                    @endif
                    @if ($data->imagelink10 != 'kosong')
                    <img class="detailimage" src="https://drive.google.com/uc?export=view&id={{$data->imagelink10}}" alt="">
                    @endif
                </div>
                <div class="description" id="descunderimg">
                    {{$data->desc}}
                </div>
            </div>
            <div class="col">
                <form method="POST" action="/addtocart">
                    @csrf
                <input id="direct" name="direct" type="text" hidden value="cart">
                <div class="product-name">{{$data->name}} 
                    <div class="subtitle">{{$category->category}}</div>
                </div>
                <div class="product-price" id="productprice">Rp. {{$data->price}}</div>

                <div class="description" id="descunderprice">
                    {{$data->desc}}
                </div>

                <div class="label" for="label">QTY</div>
                <input type="text" name='id' hidden value={{$data->id}}>
                <input type="number" name="qty" required>
                <div class="option">
                    <?php $a = 0;?>
                    @foreach ($category->opsi as $opsi)
                    <div class="pilihan">
                        <div class="label" for="pilihan">Pilih {{$opsi->name}}</div>
                            
                        <!-- special tag -->
                        {{-- <div class="custom-select" style="width:200px;"> --}}
                            <select name="{{$opsi->name}}" id="cars" required>
                            <?php $a++;?>
                                <option value="">{{$opsi->name}} : </option>
                                @foreach ($opsi->variasi as $variasi)
                                <option value="{{$opsi->name}} : {{$variasi->name}}">{{$variasi->name}}</option>
                                @endforeach
                            </select>
                        {{-- </div> --}}
                        <!-- special tag -->
                    </div>
                    @endforeach
                </div>

                <div class="btn-group">
                    <button type="submit" id="adtucart" class="btn">ADD TO CHART</button>
                    <div class="btn" id="gaskeun">BUY NOW</div>
                </div>
                </form>
            </div>
        </div>
        
    </div>
