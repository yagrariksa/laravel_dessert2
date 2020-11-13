
    <div class="container">
        <div class="row bag-1">
            <div class="col left">
                <img src="https://drive.google.com/uc?export=view&id={{$data->imagelink}}" alt="">
                <div class="description">
                    {{$data->desc}}
                </div>
            </div>
            <div class="col">
                <form method="POST" action="/addtocart">
                    @csrf
                <div class="product-name">{{$data->name}} 
                    <div class="subtitle">{{$category->category}}</div>
                </div>
                <div class="product-price">Rp. {{$data->price}}</div>

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
                    <button type="submit" class="btn">ADD TO CHART</button>
                    <div class="btn">BUY NOW</div>
                </div>
                </form>
            </div>
        </div>
        
    </div>
