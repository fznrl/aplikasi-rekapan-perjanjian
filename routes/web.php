<?php

use App\Http\Controllers\AuthController;
use App\Models\Category;
use App\Models\Perjanjian;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerjanjianController;
use Illuminate\Support\Facades\Auth;

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

Route::group(['prefix'=>'/'], function(){
    Route::get('dashboard', [PerjanjianController::class, 'index'])->middleware('auth')->name('dashboard');
    Route::get('', [AuthController::class, 'login'])->middleware('guest')->name('login');
    Route::post('login', [AuthController::class, 'authenticate'])->name('authLogin');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'storeRegister'])->name('store_register');
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
});

Route::group(['prefix'=>'perjanjian'], function(){
    Route::get('tambah', [PerjanjianController::class, 'create'])->name('tambah');
    Route::post('store', [PerjanjianController::class, 'store'])->name('store');
    Route::get('hapus/{perjanjian:id}', [PerjanjianController::class, 'destroy'])->name('hapus');
    Route::get('edit/{perjanjian:id}', [PerjanjianController::class, 'edit'])->name('edit');
    Route::post('update/{perjanjian:id}', [PerjanjianController::class, 'update'])->name('update');
    Route::get('/{slug}/{id}', [PerjanjianController::class, 'getPerjanjian'])->name('perjanjian');
});
// Route::get('/categories', function() {
//     return view('categories', [
//         'title' => 'Categories',
//         'categories' => Category::all()
//     ]);
// })->name('kategori');

Route::controller(PerjanjianController::class)->group(function(){
    Route::get('perjanjian-export', 'export')->name('perjanjian.export');
    Route::post('perjanjian-import', 'import')->name('perjanjian.import');
});
