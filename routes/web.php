<?php

use App\Http\Controllers\blogController;
use App\Http\Controllers\contactoController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\nosotrosController;
use App\Http\Controllers\servicosController;
use Illuminate\Support\Facades\Route;

// Controladores Panel Administrador
// use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;


// use App\Http\Controllers\Admin\BlogController;

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
Route::post('contacto', [contactoController::class, 'store'])->name('contacto.store');
// rutas blog
Route::get('blog', [blogController::class, 'index'])->name('blog.index');
Route::get('blog/{post}', [blogController::class, 'vistas'])->name('blog.vistas');
Route::post('blog/{post}/edit', [blogController::class, 'comment'])->name('blog.comment');



// RUTAS PARA PANEL ADMINISTRADOR

Route::get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin');

// Rutas para administrador
Route::get('/admin/users', [App\Http\Controllers\Admin\AdminController::class, 'users'])->name('users');
Route::get('/admin/users/filtro', [App\Http\Controllers\Admin\AdminController::class, 'filtro'])->name('users_filtro');
Route::post('/admin/users/create', [App\Http\Controllers\Admin\AdminController::class, 'createUser'])->name('user-create');
Route::get('/admin/users/show/{id}', [App\Http\Controllers\Admin\AdminController::class, 'showUser'])->name('user-show');
Route::post('/admin/users/update', [App\Http\Controllers\Admin\AdminController::class, 'updateUser'])->name('user-update');
Route::get('/admin/users/delete/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteUser'])->name('user-delete');
// Administrar Cargos
// Route::get('/admin/sistema/cargos', 'AdminController@cargos')->name('cargos');
// Route::post('/admin/sistema/agg_cargo', 'AdminController@agg_cargo');


// Rutas para BLOG
Route::get('/admin/blog', [App\Http\Controllers\Admin\BlogController::class, 'index'])->name('admin.blog');
Route::get('/admin/blog/post/crear', [App\Http\Controllers\Admin\BlogController::class, 'crear']);
Route::post('/admin/blog/post/crear', [App\Http\Controllers\Admin\BlogController::class, 'crear_post']);
Route::get('/admin/blog/post/ver/{id}', [App\Http\Controllers\Admin\BlogController::class, 'ver']);
Route::get('/admin/blog/post/delete/{id}', [App\Http\Controllers\Admin\BlogController::class, 'delete'])->name('post.delete');
Route::get('/admin/blog/post/delete/media/{id}', [App\Http\Controllers\Admin\BlogController::class, 'delete_media']);
//Rutas para promociones
Route::get('/admin/promociones', [App\Http\Controllers\Admin\PromocionesController::class, 'index'])->name('admin.promociones');
Route::post('/admin/promociones/crear', [App\Http\Controllers\Admin\PromocionesController::class, 'store'])->name('promociones-store');
Route::get('/admin/promociones/show/{id}', [App\Http\Controllers\Admin\PromocionesController::class, 'show'])->name('promociones-show');
Route::post('/admin/promociones/update', [App\Http\Controllers\Admin\PromocionesController::class, 'update'])->name('promociones-update');
Route::get('/admin/promociones/delete/{id}', [App\Http\Controllers\Admin\PromocionesController::class, 'delete'])->name('promociones-delete');
// Rutas para informacion principal
Route::get('/admin/informacion/principal', [App\Http\Controllers\Admin\InformacionController::class, 'index'])->name('informacion-principal');
Route::post('/admin/informacion/principal/crear', [App\Http\Controllers\Admin\InformacionController::class, 'store'])->name('informacion-store');



Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mail/template', function () { return view('mails.template'); });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
