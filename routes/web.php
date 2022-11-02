<?php

use Illuminate\Support\Facades\Route;
use App\Models\Perjanjian;
use App\Http\Controllers\PerjanjianController;
use App\Models\Category;

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

Route::get('/', [PerjanjianController::class, 'index'])->name('dashboard');

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Categories',
        'categories' => Category::all()
    ]);
})->name('kategori');

// Route::get('/categories/{category:slug}', unction(Category $category) {
//     return view('perjanjian', [
//         'title' => "Perjanjian By Category : $category->name",
//         'perjanjians' => $category->perjanjian
//     ]);
// })->name('category');

Route::get('/{category:slug}', [PerjanjianController::class, 'getPerjanjian'])->name('perjanjian');