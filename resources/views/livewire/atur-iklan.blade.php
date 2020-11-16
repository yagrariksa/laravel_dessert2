<div class="livewireuhuy">
    <div class="form" > 
        <div class="title">Form</div>
        <textarea  type="text" placeholder="isian" wire:model='value'></textarea>
        <select  name="" id="" wire:model='tipe'>
            <option value="">pilih iklan</option>
            <option value="pengumuman">pengumuman</option>
            <option value="iklan">iklan</option>
        </select>
        <button wire:click='kirim' >laksanakan</button>
        @if (strpos($erorbro, 'berhasil') !== false)
            <span class="sukses">{{$erorbro}}</span>
        @endif
        @if (strpos($erorbro, 'gagal') !== false)
            <span class="gagal">{{$erorbro}}</span>
        @endif
    </div>
    {{-- <h2>{{$value}}</h2>
    <h2>{{$tipe}}</h2> --}}

    <div class="pengumuman"> 
        <div class="title">Pengumuman</div>
        <p>
            @if ($pengumuman != null)
            {{$pengumuman->link}}
            @endif
            {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla alias totam odio illo eveniet debitis. --}}
        </p>
        <button wire:click='ganti'>edit</button> <br>
    </div>

    <div class="iklan"> 
        <div class="title">foto</div>
        @if ($iklan != null)
            
        @foreach ($iklan as $i)
        <div class="objek">
            <small style="margin-top:5px;"> 
                {{$i->link}}
            </small>
            <button wire:click='hapus({{$i->id}})'>hapus</button> <br>
            <div style="background-image: url(http://drive.google.com/uc?export=view&id={{$i->link}})" class="gambariklan">
            <br>
        </div>
        @endforeach

        @endif

    </div>


</div>
