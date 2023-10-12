<?php

use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SingersController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\AlbumsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', [TiendaController::class,'index'])->name('/index');

// Rutas CRUD de la Tienda
/* Crear */
Route::get('Tienda/crear', [TiendaController::class,'crear'])->name('Tienda.crear');
Route::match(['post','put'],'Tienda/store', [TiendaController::class,'store'])->name('Tienda.store');
/* Leer */
Route::get('Tienda/show/{id}', [TiendaController::class,'show'])->name('Tienda.detalles');
/* Actualizar */
Route::get('Tienda/actualizar/{id}', [TiendaController::class,'actualizar'])->name('Tienda.actualizar');
Route::put('Tienda/prueba/update/{id}', [TiendaController::class,'update'])->name('Tienda.prueba.update');

/* Eliminar */
Route::put('Tienda/eliminar/{id}', [TiendaController::class,'eliminar'])->name('Tienda.eliminar');

/* Vista Principal */
Route::get('/Tienda', [TiendaController::class,'index'])->name('Tienda/');

// Rutas CRUD Albums
/* Crear */
Route::get('Albums/crear', [AlbumsController::class,'crear'])->name('Albums.crear');
Route::match(['post','put'],'Albums/store', [AlbumsController::class,'store'])->name('Albums.store');
/* Leer */
Route::get('Albums/show/{id}', [AlbumsController::class,'show'])->name('Albums.detalles');
/* Actualizar */
Route::get('Albums/actualizar/{id}', [AlbumsController::class,'actualizar'])->name('Albums.actualizar');
Route::put('Albums/prueba/update/{id}', [AlbumsController::class,'update'])->name('Albums.prueba.update');

/* Eliminar */
Route::put('Albums/eliminar/{id}', [AlbumsController::class,'eliminar'])->name('Albums.eliminar');
/* vista principal*/
Route::get('/Albums', [AlbumsController::class,'albums'])->name('Albums');

// Rutas CRUD Cantantes
/* Crear */
Route::get('Singers/crear', [SingersController::class,'create'])->name('Singers.crear');
Route::match(['post','put'],'Albums/store', [SingersController::class,'store'])->name('Singers.store');
/* Leer */
Route::get('Singers/show/{id}', [SingersController::class,'show'])->name('Singers.detalles');
/* Actualizar */
Route::get('Singers/actualizar/{id}', [SingersController::class,'edit'])->name('Singers.actualizar');
Route::put('Singers/prueba/update/{id}', [SingersController::class,'update'])->name('Singers.prueba.update');

/* Eliminar */
Route::put('Singers/eliminar/{id}', [SingersController::class,'eliminar'])->name('Singers.eliminar');
/* vista principal*/
Route::get('/Singers', [SingersController::class,'Singers'])->name('Singers');


// Rutas CRUD Artistas
/* Crear */
Route::get('Artist/crear', [ArtistsController::class,'crear'])->name('Artist.crear');
Route::match(['post','put'],'Artist/store', [ArtistsController::class,'store'])->name('Artist.store');
/* Leer */
Route::get('Artist/show/{id}', [ArtistsController::class,'show'])->name('Artist.detalles');
/* Actualizar */
Route::get('Artist/actualizar/{id}', [ArtistsController::class,'actualizar'])->name('Artist.actualizar');
Route::put('Artist/prueba/update/{id}', [ArtistsController::class,'update'])->name('Artist.prueba.update');

/* Eliminar */
Route::put('Artist/eliminar/{id}', [ArtistsController::class,'eliminar'])->name('Artist.eliminar');

/* Vista Principal */
Route::get('Artist', [ArtistsController::class,'Artist'])->name('Artist');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
