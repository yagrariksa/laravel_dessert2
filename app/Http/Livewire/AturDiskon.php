<?php

namespace App\Http\Livewire;

use App\Models\Diskon;
use Livewire\Component;

class AturDiskon extends Component
{
    public $untuk;
    public $status;
    public $besar;
    public $erornya;

    public function render()
    {
        $data = Diskon::get();
        return view('livewire.atur-diskon', [
            'data' => $data,
        ]);
    }

    public function kirim()
    {
        $data = Diskon::count();
        // dd($data);
        if ($data == 1) {
            $data = Diskon::first();
        } else {
            $data = new Diskon();
        }
        if ($this->besar != null && $this->status != null) {
            $data->besar = $this->besar;
            $data->untuk = 'semua';
            if ($this->status == 'true') {
                $data->status = true;
            } else {
                $data->status = false;
            }
            $data->save();
            $this->bersihkan();
        } else {
            $this->erornya = 'gagal';
        }
    }

    public function edit($id)
    {
        $data = Diskon::find($id);
        $this->besar = $data->besar;
        $this->status = ($data->status) ? 'true' : 'false';
    }
    public function bersihkan()
    {
        $this->untuk = null;
        $this->status = null;
        $this->besar = null;
    }
}
