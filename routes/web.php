<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'index']);
Route::get('/home', function () {
    return redirect('/');
});

Route::get('/details/{id}', [UserController::class, 'detailwithlivewire']);
Route::get('/details/custom/{id}', [UserController::class, 'detailwithlivewire']);
Route::get('/lowcal', [UserController::class, 'lowcal']);
Route::get('/custom', [UserController::class, 'custom']);
Route::get('/order', [UserController::class, 'myorder']);

// Route::get('/addtocart', [UserController::class, 'getcart']);
Route::post('/addtocart', [UserController::class, 'addtocart']);
Route::get('/delete/chart/{id}', [UserController::class, 'deleteitemcart']);
Route::get('/cart', [UserController::class, 'cart']);
Route::get('/confirmation', [UserController::class, 'formkonfirmasi']);
Route::get('/confirmation/store', function () {
    return redirect('/cart');
});
Route::post('/confirmation/store', [UserController::class, 'postkonfirmasi']);

Route::get('/whoami', [AdminController::class, 'login'])->middleware('guest')->name('login');
Route::post('/whoami', [AdminController::class, 'loginStore']);
Route::get('/logout', [AdminController::class, 'loginlogout']);
Route::get('/whoami/regist', [AdminController::class, 'regist']);
Route::post('/whoami/regist', [AdminController::class, 'registStore']);

Route::middleware('auth')->group(function () {

    Route::get('/admin', function () {
        return redirect('/admin/list');
    });
    Route::get('/admin/list', [AdminController::class, 'list']);
    Route::get('/admin/list/{id}', [AdminController::class, 'addDelete']);

    Route::get('/admin/add', [AdminController::class, 'add']);
    Route::post('/admin/add', [AdminController::class, 'addStore']);

    Route::get('/admin/edit/{id}', [AdminController::class, 'addEdit']);
    Route::post('/admin/edit/{id}', [AdminController::class, 'addEditStore']);

    Route::get('/admin/order', [AdminController::class, 'order']);
    Route::get('/admin/other', [AdminController::class, 'other']);

    Route::get('/admin/payment', [AdminController::class, 'payment']);
});
