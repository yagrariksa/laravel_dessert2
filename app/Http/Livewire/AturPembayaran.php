<?php

namespace App\Http\Livewire;

use App\Models\Pembayaran;
use Livewire\Component;

class AturPembayaran extends Component
{
    public $payname;
    public $paycode;
    public $payowner;
    public $editmode = false;

    public function render()
    {
        $data = Pembayaran::latest()->get();
        return view('livewire.atur-pembayaran', [
            'data' => $data,
        ]);
    }

    public function postpay()
    {
        $data = new Pembayaran();
        $data->metode = $this->payname;
        $data->rekening = $this->paycode;
        $data->atasnama = $this->payowner;
        $data->save();

        $this->clearform();
    }

    public function clearform()
    {
        $this->payname = null;
        $this->paycode = null;
        $this->payowner = null;
    }

    public function edit($id)
    {
        $data = Pembayaran::find($id);
        $this->payname = $data->metode;
        $this->paycode = $data->rekening;
        $this->payowner = $data->atasnama;
        $this->editmode = $id;
    }

    public function editpay()
    {
        $data = Pembayaran::find($this->editmode);
        $data->metode = $this->payname;
        $data->rekening = $this->paycode;
        $data->atasnama = $this->payowner;
        $data->save();

        $this->clearform();
        $this->editmode = false;
    }

    public function hapus($id)
    {
        $data = Pembayaran::find($id);
        $data->delete();
    }
}
