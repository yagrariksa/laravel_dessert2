
<div class="">
    <div class="row top">
        <div class="col">
            <div class="title">Category</div>
            @foreach ($category as $c)
            <div class="list">{{$c->category}}</div>
            @endforeach
        </div>
        <div class="col form">
            <div class="title">
                tambahkan opsi
            </div>
            <select  wire:model='kat' style="width:250px;" >
                <option value="">Select Category : </option>
                @foreach ($category as $c)
                <option value="{{$c->category}}">{{$c->category}}</option>
                @endforeach
            </select>
            <input type="text" placeholder="value" wire:model='opsi' style="width:250px;">
            <div class="btn tambahkan" wire:click='postOpsi'>
                tambahkan
            </div>
            <small>{{$kat}} ## {{$opsi}} </small>
        </div>
        <div class="col form">
            <div class="title">
                tambahkan variasi
            </div>
            <select wire:model='varkat' style="width:250px;" >
                <option value="">Select Category : </option>
                @foreach ($category as $c)
                <option value="{{$c->id}}">{{$c->category}}</option>
                @endforeach
            </select>
            <select wire:model='varopsi' style="width:250px;" >
                <option value="">Select Opsi : </option>
                @if ($formopsi != null)
                @foreach ($formopsi as $f)
                <option value="{{$f->id}}">{{$f->name}}</option>
                @endforeach
                @endif
            </select>
            <input wire:model='varval' type="text" placeholder="value" style="width:250px;">
            <div class="btn tambahkan" wire:click='postVariasi'>
                tambahkan
            </div>
        </div>
    </div>

    <div class="row main">
        @foreach ($category as $c)
        <div class="col">
            <div class="title">{{$c->category}}</div>
            @foreach ($c->opsi as $o)
            <div class="opsi">{{$o->name}}
                <span wire:click='delete({{$o->id}})' class="btn" style="padding: 3px; font-size: small; cursor:pointer; width: fit-content; background-color: red; color:white; border-radius: 10px">hapus</span> </li>
            </div>
            @foreach ($o->variasi as $variasi)
                <div class="list">>> {{$variasi->name}}</div>
            @endforeach
            @endforeach

        </div>
        @endforeach
    </div>
</div>
