<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use App\Models\Category;
use App\Models\Custom;
use Illuminate\Http\Request;
use Livewire\Component;

class DetailsProduct extends Component
{
    public $ide;

    public function render()
    {
        $data = Barang::find($this->ide);
        $category = Category::where('category', $data->category)->first();
        $opsi = Custom::where('parent_type', 'SUPER')->where('parent_name', $category->category)->get();
        $category->opsi = $opsi;
        foreach ($category->opsi as $o) {
            $variasi = Custom::where('parent_type', 'CHILD')->where('parent_name', $o->id)->get();
            $o->variasi = $variasi;
        }
        return view('livewire.details-product', [
            'data' => $data,
            'category' => $category
        ]);
    }

    public function test(Request $request)
    {
        dd($request);
    }
}
