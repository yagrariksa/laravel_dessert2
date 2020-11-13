<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangbeli;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Client;
use App\Models\Custom;
use App\Models\Pembayaran;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //

    public function index()
    {
        $data = Barang::where('category', 'not like', "%custom%")->get();
        return view('user.home', [
            'data' => $data,
        ]);
    }

    public function detailwithlivewire($id)
    {
        return view('user.detailproduct', [
            'ide' => $id,
        ]);
    }


    public function lowcal()
    {
        $data = Barang::where('category', 'low calorie')->get();
        return view('user.lowcalorie', [
            'data' => $data
        ]);
    }

    public function custom()
    {
        $normal = Barang::where('category', 'custom - normal')->first();
        $lowcal = Barang::where('category', 'custom - low calorie')->first();

        return view('user.custom', [
            'normal' => $normal,
            'lowcal' => $lowcal,
        ]);
    }

    public function detailcustom()
    {
        return view('user.customdetails');
    }

    public function detailnormal()
    {
        return view('user.details');
    }

    public function keranjang()
    {
        return view('user.keranjang');
    }

    public function confirmation()
    {
        return view('user.confirmation');
    }

    public function payment()
    {
        return view('user.payment');
    }

    public function myorder()
    {
        return view('user.order');
    }

    public function cart(Request $request)
    {
        $cart = null;
        if (Session::has('cart')) {
            $cart = Session::get('cart', '');
            foreach ($cart->items as $item) {
                $item->benda = Barang::find($item->barang_id);
            }
        }
        return view('user.keranjang', [
            'cart' => $cart,
        ]);
    }

    public function addtocart(Request $request)
    {
        $form = $request;
        $barang = Barang::find($form->id);
        $beli = new Barangbeli();
        $beli->barang_id = $barang->id;
        $beli->qty = $form->qty;
        $beli->price = $barang->price;
        $beli->subtotal = $beli->price * $beli->qty;

        $arabos = array();
        foreach ($form->request as $f) {
            if ($f != null) {
                array_push($arabos, $f);
            }
        }

        $beli->desc = join(", ", array_slice($arabos, 3));
        $oldcart = $request->session()->get('cart', '');
        $cart = new Cart($oldcart);
        $cart->addBarang($beli);


        $request->session()->put('cart', $cart);
        // dd($oldcart, $cart, $request->session()->get('cart', 'kosong'));

        return redirect('/cart');
    }
    public function getcart(Request $request)
    {
        // $request->session()->put('cart', 'heyho');
        dd($request->session()->get('cart', 'kosong'));
    }

    public function deleteitemcart($id)
    {
        $oldcart = Session::get('cart', '');
        $oldcart->removeBarang($id);
        if (sizeof($oldcart->items) == '0') {
            Session::forget('cart');
        } else {
            $cart = new Cart($oldcart);
            Session::put('cart', $cart);
        }

        return redirect()->back();
    }

    public function formkonfirmasi()
    {
        if (!Session::has('cart')) {
            return redirect('cart');
        }
        $oldcart = Session::get('cart', '');
        foreach ($oldcart->items as $item) {
            $barang = Barang::find($item->barang_id);
            $item->barang = $barang;
        }

        $metode = Pembayaran::latest()->get();

        return view('user.confirmation', [
            'cart' => $oldcart,
            'metode' => $metode,
        ]);
    }

    public function postkonfirmasi(Request $request)
    {
        // dd($request, Session::get('cart'));

        $client = new Client();
        $client->email = $request->email;
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->addr = $request->addr;
        $client->kecamatan = $request->kecamatan;
        $client->kota = $request->kota;
        $client->kodepos = $request->kodepos;
        $client->save();


        $transaksi = new Transaksi();
        $transaksi->client_id = $client->id;
        $transaksi->payment = $request->metode;
        $transaksi->status = 'menunggu pembayaran';
        $transaksi->total = Session::get('cart')->total;
        $transaksi->totalqty = Session::get('cart')->qty;
        $kode = $this->getName(8);
        while (Transaksi::where('kode', $kode)->first() != null) {
            $kode = $this->getName(8);
        }
        $transaksi->kode = $kode;
        $transaksi->save();

        $cart = $request->session()->get('cart', '');
        $datastore = array();
        foreach ($cart->items as $item) {
            $barang = new Barangbeli();
            $barang->trans_id = $transaksi->id;
            $barang->barang_id = $item->barang_id;
            $barang->qty = $item->qty;
            $barang->deskripsi = $item->desc;
            $barang->price = $item->price;
            $barang->subtotal = $item->subtotal;
            $barang->save();
            array_push($datastore, $barang);
        }

        Session::forget('cart');

        // dd($client, $transaksi, $datastore, Session::get('cart', 'kosong lur'));
        return view('user.payment', [
            'kode' => $transaksi->kode,
            'payment' => $transaksi->payment,
        ]);
    }

    public function getName($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}
