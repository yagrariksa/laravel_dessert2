<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use App\Models\Client;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Type\Integer;

class AdminController extends Controller
{

    public function login()
    {
        $data = User::latest()->get();
        return view('admin.login', [
            'data' => $data,
        ]);
    }

    public function loginStore(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/admin/list');
        }
        return redirect()->back();
    }

    public function loginlogout()
    {
        Auth::logout();

        return redirect('/whoami');
    }
    public function regist()
    {
        $data = User::latest()->get();
        return view('admin.reg', [
            'data' => $data,
            'rusak' => ''
        ]);
    }

    public function registStore(Request $request)
    {
        $data = new User();
        $data->name = $request->username;
        $data->email = $request->username;
        $data->password = Hash::make($request->username);
        try {
            $data->save();
        } catch (\Throwable $th) {
            return redirect()->back();
        }

        return redirect('/whoami');
    }

    public function list()
    {
        $tipe = 'list';
        $data = Barang::latest()->get();
        return view('admin.listbarang', [
            'tipe' => $tipe,
            'data' => $data,
        ]);
    }

    public function add()
    {
        $tipe = 'add';
        $category = Category::all();
        return view('admin.tambahbarang', [
            'tipe' => $tipe,
            'category' => $category
        ]);
    }

    public function addStore(Request $request)
    {
        $data = new Barang();
        $data->name = $request->name;
        $data->price = $request->price;
        $data->available = ($request->ketersediaan == 'true') ? true : false;
        $data->category = $request->kategori;
        $data->imagelink = $request->imagelink;
        $data->desc = $request->desc;
        $data->save();

        return redirect('/admin/list');
    }

    public function addEdit($id)
    {
        $data = Barang::where('id', $id)->first();
        $tipe = 'list';
        $category = Category::all();
        return view('admin.editbarang', [
            'tipe' => $tipe,
            'data' => $data,
            'category' => $category,
        ]);
    }

    public function addEditStore(Request $request, $id)
    {
        $data = Barang::where('id', $id)->first();
        $data->name = $request->name;
        $data->price = $request->price;
        $data->available = ($request->ketersediaan == 'true') ? true : false;
        $data->category = $request->kategori;
        $data->imagelink = $request->imagelink;
        $data->desc = $request->desc;
        $data->save();

        return redirect('/admin/list');
    }



    public function addDelete($id)
    {
        $data = Barang::where('id', $id)->first();
        $data->delete();

        return redirect('/admin/list');
    }

    public function order()
    {

        return view('admin.aturorder', [
            'tipe' => 'order',
        ]);
    }

    public function other()
    {
        return view('admin.another', [
            'tipe' => 'other',
        ]);
    }

    public function payment()
    {
        return view('admin.payment', [
            'tipe' => 'payment',
        ]);
    }
}
