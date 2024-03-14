<?php

use App\Models\Outlet;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TeritoryController;
use App\Http\Controllers\DarsboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\SubTeritoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Authentication
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [DarsboardController::class, 'index'])->middleware('auth');

Route::group(['middleware' => ['auth', 'ceklevel:IT']], function()
{
    //user
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user/store', [UserController::class, 'store']);
    Route::get('/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('/user/update/{id}', [UserController::class, 'update']);
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);

    //area
    Route::get('/area', [AreaController::class, 'index'])->name('area');
    Route::get('/area/create', [AreaController::class, 'create'])->name('create.area');
    Route::post('/area', [AreaController::class, 'store'])->name('add.area');
    Route::get('/area/edit/{id}', [AreaController::class, 'edit'])->name('edit.area');
    Route::post('/area/update/{id}', [AreaController::class, 'update'])->name('update.area');
    Route::delete('/area/delete/{id}', [AreaController::class, 'destroy'])->name('delete.area');

    //branch
    Route::get('/branch', [BranchController::class, 'index'])->name('branch');
    Route::get('/branch/create', [BranchController::class, 'create'])->name('create.branch');
    Route::post('/branch', [BranchController::class, 'store'])->name('add.branch');
    Route::get('/branch/edit/{id}', [BranchController::class, 'edit'])->name('edit.branch');
    Route::post('/branch/update/{id}', [BranchController::class, 'update'])->name('update.branch');
    Route::delete('/branch/delete/{id}', [BranchController::class, 'destroy'])->name('destroy.branch');


    //teritory
    Route::get('/teritory', [TeritoryController::class, 'index'])->name('teritory');
    Route::get('/teritory/create', [TeritoryController::class, 'create'])->name('teritory.create');
    Route::post('/teritory/store', [TeritoryController::class, 'store'])->name('add.teritory');
    Route::get('/teritory/edit/{id}', [TeritoryController::class, 'edit'])->name('edit.teritory');
    Route::post('/teritory/update/{id}', [TeritoryController::class, 'update'])->name('update.teritory');
    Route::delete('/teritory/delete/{id}', [TeritoryController::class, 'destroy'])->name('delete.teritory');

    //sub_teritory
    Route::get('/sub_teritory', [SubTeritoryController::class, 'index'])->name('sub_teritory');
    Route::get('/sub_teritory/create', [SubTeritoryController::class, 'create'])->name('sub_teritory.create');
    Route::post('/sub_teritory/store', [SubTeritoryController::class, 'store'])->name('add.sub_teritory');
    Route::get('/sub_teritory/edit/{id}', [SubTeritoryController::class, 'edit'])->name('edit.sub_teritory');
    Route::post('/sub_teritory/update/{id}', [SubTeritoryController::class, 'update'])->name('update.sub_teritory');
    Route::delete('/sub_teritory/delete/{id}', [SubTeritoryController::class, 'destroy'])->name('delete.sub_teritory');

    //product
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('add.product');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('edit.product');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('update.product');
    Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('delete.product');

    //Customer
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer/store', [CustomerController::class, 'store'])->name('add.customer');
    Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('edit.customer');
    Route::post('/customer/update/{id}', [CustomerController::class, 'update'])->name('update.customer');
    Route::delete('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('delete.customer');

    //Outlet
    Route::get('/outlet', [OutletController::class, 'index'])->name('outlet');
    Route::get('/outlet/create', [OutletController::class, 'create'])->name('outlet.create');
    Route::post('/outlet/store', [OutletController::class, 'store'])->name('add.outlet');
    Route::get('/outlet/edit/{id}', [OutletController::class, 'edit'])->name('edit.outlet');
    Route::post('/outlet/update/{id}', [OutletController::class, 'update'])->name('update.outlet');
    Route::delete('/outlet/delete/{id}', [OutletController::class, 'destroy'])->name('delete.outlet');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
});


