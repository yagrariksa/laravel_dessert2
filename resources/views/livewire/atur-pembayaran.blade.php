<div class="">

    <h1>form Rekening</h1>
    @if (!$editmode)
        <form wire:submit.prevent='postpay' method="post">
        @else
        <form wire:submit.prevent='editpay' method="post">
    @endif
        <div class="label text t-m t-uppercase">Nama Metode Pembayaran</div>
        <div class="">
            <small>Ex : OVO, BNI, BRI</small> 
        </div>
        <input required type="text" wire:model='payname'>
        <div class="label text t-m t-uppercase">Nomor Rekening</div>
        <input required type="text" wire:model='paycode'>
        <div class="label text t-m t-uppercase">Atas Nama (pemilik rekening)</div>
        <input required type="text" wire:model='payowner'>
        
    @if (!$editmode)
        <button type="submit" class="btn btn-save text t-sm" style="width: fit-content;">
            Tambah Rekening
        </button>
        @else
        <button type="submit" class="btn btn-save text t-sm" style="width: fit-content;">
            Edit Rekening
        </button>
    @endif
    </form>

    <h3>{{$payname}}</h3>
    <h3>{{$paycode}}</h3>

    <h1>daftar rekening</h1>
    <table width="80%">
        <thead>
            <tr>
                <th style="border: 1px solid; border-color: transparent black black black">metode</th>
                <th style="border: 1px solid; border-color: transparent black black transparent">rekening</th>
                <th style="border: 1px solid; border-color: transparent black black transparent">atasnama</th>
                <th style="border: 1px solid; border-color: transparent black black transparent">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
            <tr style="height: fit-content">
                <td style="border: 1px solid; border-color: transparent black black black">{{$d->metode}}</td>
                <td style="border: 1px solid; border-color: transparent black black transparent">{{$d->rekening}}</td>
                <td style="border: 1px solid; border-color: transparent black black transparent">{{$d->atasnama}}</td>
                <td style="border: 1px solid; border-color: transparent black black transparent; cursor: pointer; padding: 10px;"><span style="padding: 5px; background-color: rgb(123, 255, 123);" wire:click='edit({{$d->id}})'>EDIT</span> <span style="padding: 5px; background-color: rgb(255, 125, 125);" wire:click='hapus({{$d->id}})'>HAPUS</span></td>
            </tr>
        
            @endforeach
        </tbody>
    </table>

</div>
    