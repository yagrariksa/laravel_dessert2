<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use App\Models\Barangbeli;
use App\Models\Client;
use App\Models\Transaksi;
use Livewire\Component;

class UserMyOrder extends Component
{
    public $kodok;
    public $detail = false;
    public $transaksi = null;
    public $client = null;
    public $barang = null;
    public $error = null;

    public function render()
    {
        return view('livewire.user-my-order');
    }

    public function detail()
    {
        $this->error = null;
        $this->transaksi = Transaksi::where('kode', $this->kodok)->first();
        // dd($this->transaksi);
        if ($this->transaksi == null) {
            $this->error = 'transaksi tidak ditemukan';
        } else {
            $id = $this->transaksi->id;
            $this->client = Client::find($this->transaksi->client_id);
            $this->barang = Barangbeli::where('trans_id', $id)->get();
            foreach ($this->barang as $b) {
                $b->benda = Barang::find($b->barang_id);
            }
            $this->detail = true;
        }
        $this->kode = null;
    }

    public function search()
    {
        $this->detail = false;
    }
}
