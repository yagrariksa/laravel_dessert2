<div class="livewire">
    <div class="form">
        <div class="title">Form Diskon</div>
        <input type="number" wire:model='besar'>
        <select wire:model='status' name="" id="">
            <option value="">pilih status</option>
            <option value="true">aktif</option>
            <option value="false">tidak aktif</option>
        </select>
        <button wire:click='kirim'>submit</button>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Besar Diskon</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 0; ?>
            @foreach ($data as $d)
            <tr>
                <?php $nomor++;?>
                <td> {{$nomor}} </td>
                <td> {{$d->besar}} </td>
                <td> {{($d->status)? 'aktif' : 'tidak aktif'}} </td>
                <td> <button wire:click='edit({{$d->id}})'>edit</button> </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
</div>
