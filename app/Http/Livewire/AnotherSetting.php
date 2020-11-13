<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Custom;
use Livewire\Component;

class AnotherSetting extends Component
{
    public $kat;
    public $opsi;
    public $varkat;
    public $formopsi;
    public $varopsi;
    public $varval;

    public function render()
    {
        $category = Category::all();

        foreach ($category as $a) {
            $opsi = Custom::where('parent_type', 'SUPER')->where('parent_name', $a->category)->get();
            $a->opsi = $opsi;
            foreach ($a->opsi as $o) {
                $variasi = Custom::where('parent_type', 'CHILD')->where('parent_name', $o->id)->get();
                $o->variasi = $variasi;
            }
        }

        if ($this->varkat != null) {
            $name = Category::find($this->varkat)->category;
            $this->formopsi = Custom::where('parent_type', 'SUPER')->where('parent_name', $name)->get();
        } else {
            $this->formopsi = null;
        }
        return view('livewire.another-setting', [
            'category' => $category,
        ]);
    }

    public function postOpsi()
    {
        if ($this->kat == null) {
            $this->opsi = 'ERROR';
        } else {
            $data = new Custom();
            $data->parent_type = 'SUPER';
            $data->parent_name = $this->kat;
            $data->name = $this->opsi;
            $data->save();

            $this->resetOpsi();
        }
    }

    public function resetOpsi()
    {
        $this->category = null;
        $this->category_id = null;
        $this->opsi = null;
    }

    public function delete($id)
    {
        $data = Custom::find($id);
        $variasi = Custom::where('parent_name', $id)->get();
        foreach ($variasi as $v) {
            $v->delete();
        }
        // dd($data);
        $data->delete();
    }

    public function postVariasi()
    {
        if ($this->varopsi == null || $this->varval == null) {
            $this->varval = 'ERROR';
        } else {
            $data = new Custom();
            $data->parent_type = 'CHILD';
            $data->parent_name = $this->varopsi;
            $data->name = $this->varval;
            // dd($data);
            $data->save();

            $this->resetVariasi();
        }
    }

    public function resetVariasi()
    {
        // $this->varkat = null;
        $this->varopsi = null;
        $this->formopsi = null;
        $this->varval = null;
    }
}
