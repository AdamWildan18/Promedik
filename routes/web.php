<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\TeritoryController;
use App\Http\Controllers\DarsboardController;
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
    Route::get('/branch/create', [BranchController::class, 'create'])->name('branch.area');

    //teritory
    Route::get('/teritory', [TeritoryController::class, 'index'])->name('teritory');
    Route::get('/teritory/create', [TeritoryController::class, 'create'])->name('teritory.create');

    //sub_teritory
    Route::get('/sub_teritory', [SubTeritoryController::class, 'index'])->name('sub_teritory');
    Route::get('/sub_teritory/create', [SubTeritoryController::class, 'create'])->name('sub_teritory.create');
});


