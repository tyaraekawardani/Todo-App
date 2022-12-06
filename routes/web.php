<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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
//menampilkan route-route yang akan diberi hak akses 'isGuest'
Route::middleware('isGuest')->group(function() {
    Route::get('/',[TodoController::class,'index']);
    Route::post('/login', [LoginController::class, 'login'])->name('login-baru');
    Route::get('/register',[TodoController::class,'register'])->name('actionlogin');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::middleware('isLogin')->group(function() {
    Route::get('/dashboard', [TodoController::class, 'dashboard'])->name('dashboard');
    Route::get('/create', [TodoController::class, 'create'])->name('create');
    Route::post('/store', [TodoController::class, 'store'])->name('store');
    Route::get('/data', [TodoController::class, 'data'])->name('data');
    // path yang ada { } artinya path dinamis,path dinamis merupakan path yang datanya diisi dari database. path di namis ini
    // nantinya akan berubah-ubah tergantung data yang diberikan apabila dalam route nya ada path dinamis maka nantinya data path dinamis ini dapat
    // 
    Route::get('/edit/{id}',[TodoController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}',[TodoController::class, 'update'])->name('update');
    // method route buat delete data di database itu pakai delete
    Route::delete('/delete/{id}',[TodoController::class, 'destroy'])->name('destroy');
    Route::patch('/complated/{id}',[TodoController::class, 'updateToComplated'])->name('update-complated');
});

//logout
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
//end logout