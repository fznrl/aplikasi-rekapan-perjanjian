<?php

use Illuminate\Support\Facades\Route;
use App\Models\Perjanjian;
use App\Http\Controllers\PerjanjianController;

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

Route::get('/', [PerjanjianController::class, 'index']);
