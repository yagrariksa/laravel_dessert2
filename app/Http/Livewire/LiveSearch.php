<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use Livewire\Component;

class LiveSearch extends Component
{
    public $cari = null;
    public $aksi = false;

    public function render()
    {
        $data = null;
        if ($this->cari == null) {
            $this->aksi = false;
        } else {
            if ($this->aksi) {
                $data = Barang::where('name', 'like', '%' . $this->cari . '%')->get();
            }
        }
        return view('livewire.live-search', [
            'livesearch' => $data,
        ]);
    }

    public function carisekarang()
    {
        if ($this->cari != null) {
            $this->aksi = true;
        }
    }
}
