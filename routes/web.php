<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\nosotrosController;
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

Route::get('/', homeController::class)->name('index');

Route::get('nosotros', [nosotrosController::class, 'index'])->name('nosotros.index');
