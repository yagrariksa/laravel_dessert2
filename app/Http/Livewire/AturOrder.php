<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use App\Models\Barangbeli;
use App\Models\Client;
use App\Models\Transaksi;
use Livewire\Component;

class AturOrder extends Component
{
    public $detail = false;
    public $transaksi = null;
    public $client = null;
    public $barang = null;

    public $ubahstatus = false;
    public $statusbayar;

    public $filter;
    public $filterfix = null;

    public function render()
    {
        if ($this->filterfix != null) {
            $data = Transaksi::where('status', $this->filterfix)->paginate(4);
        } else {
            $data = Transaksi::latest()->paginate(4);
        }
        foreach ($data as $d) {
            $client = Client::find($d->client_id);
            $d->namaewa = $client->name;
        }
        return view('livewire.atur-order', [
            'data' => $data,
        ]);
    }

    public function filter()
    {
        $this->filterfix = $this->filter;
    }

    public function resetfilter()
    {
        $this->filter = null;
        $this->filterfix = null;
    }

    public function detail($id)
    {
        $this->detail = true;
        $this->transaksi = Transaksi::find($id);
        $this->client = Client::find($this->transaksi->client_id);
        $this->barang = Barangbeli::where('trans_id', $id)->get();
        foreach ($this->barang as $b) {
            $b->benda = Barang::find($b->barang_id);
        }
    }

    public function back()
    {
        $this->detail = false;
    }

    public function ubah()
    {
        $this->ubahstatus = true;
        $this->statusbayar = $this->transaksi->status;
    }

    public function postubah()
    {
        $transaksi = Transaksi::find($this->transaksi->id);
        $transaksi->status = $this->statusbayar;
        $transaksi->save();

        $this->ubahstatus = false;
        $this->statusbayar = null;
        $this->detail($transaksi->id);
    }
}
