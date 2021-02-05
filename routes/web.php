<?php

use App\Http\Controllers\blogController;
use App\Http\Controllers\contactoController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\nosotrosController;
use App\Http\Controllers\servicosController;
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
// ruta nosotros
Route::get('nosotros', [nosotrosController::class, 'index'])->name('nosotros.index');
// ruta servicios
Route::get('servicios',[servicosController::class, 'servicios'])->name('servicios.index');
// ruta contacto
Route::get('contacto', [contactoController::class, 'contacto'])->name('contacto');
// rutas blog
Route::get('blog', [blogController::class, 'index'])->name('blog.index');
Route::get('blog.vistas', [blogController::class, 'vistas'])->name(('blog.vistas'));

