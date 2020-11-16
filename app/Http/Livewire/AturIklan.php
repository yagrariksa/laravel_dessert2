<?php

namespace App\Http\Livewire;

use App\Models\Iklan;
use Livewire\Component;

class AturIklan extends Component
{
    public $value;
    public $tipe;
    public $erorbro = null;

    public function render()
    {
        $iklan = Iklan::where('tipe', 'iklan')->get();
        $pengumuman = Iklan::where('tipe', 'pengumuman')->first();
        return view('livewire.atur-iklan', [
            'iklan' => $iklan,
            'pengumuman' => $pengumuman,
        ]);
    }

    public function kirim()
    {
        if ($this->value != null && ($this->tipe == 'pengumuman' || $this->tipe == 'iklan')) {
            if ($this->tipe == 'pengumuman') {
                $this->kirimp();
            } else {
                $this->kirimi();
            }
            $this->bersihkan();
        } else {
            $this->erorbro = 'gagal - salah';
        }
    }

    public function kirimp()
    {
        $data = Iklan::where('tipe', 'pengumuman')->count();
        if ($data == null) {
            $data = new Iklan();
            $this->erorbro = 'berhasil -> data baru';
        } else {
            $data = Iklan::get()->first();
            $this->erorbro = 'berhasil -> data update';
        }
        $data->tipe = $this->tipe;
        $data->link = $this->value;
        $data->save();
    }

    public function kirimi()
    {
        $data = Iklan::where('tipe', 'iklan')->count();
        if ($data < 3) {
            $data = new Iklan();
            $this->erorbro = 'berhasil -> data baru';
            $data->tipe = $this->tipe;
            $data->link = $this->value;
            $data->save();
        } else {
            $this->erorbro = 'gagal - foto sudah ada 3';
        }
    }

    public function hapus($id)
    {
        $data = Iklan::find($id);
        if ($data == null) {
            $this->erorbro = 'gagal - kesalahan sistem';
        } else {
            $data->delete();
            $this->erorbro = 'berhasil - menghapus item';
        }
    }

    public function bersihkan()
    {
        $this->tipe = null;
        $this->value = null;
    }

    public function ganti()
    {
        $this->tipe = 'pengumuman';
        $this->value = Iklan::where('tipe', 'pengumuman')->first()->link;
    }
}
