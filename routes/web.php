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
Route::get('store/create', [TiendaController::class,'create'])->name('store.create');
Route::match(['post','put'],'store/store', [TiendaController::class,'store'])->name('store.store');
/* Leer */
Route::get('store/show/{id}', [TiendaController::class,'show'])->name('store.details');
/* Actualizar */
Route::get('store/edit/{id}', [TiendaController::class,'edit'])->name('store.edit');
Route::put('store/test/update/{id}', [TiendaController::class,'update'])->name('store.test.update');

/* Eliminar */
Route::put('store/delete/{id}', [TiendaController::class,'delete'])->name('store.delete');

/* Vista Principal */
Route::get('/store', [TiendaController::class,'index'])->name('store');

// Rutas CRUD Albums
/* Crear */
Route::get('albums/create', [AlbumsController::class,'create'])->name('albums.create');
Route::match(['post','put'],'albums/store', [AlbumsController::class,'store'])->name('albums.store');
/* Leer */
Route::get('albums/details/{id}', [AlbumsController::class,'show'])->name('albums.details');
/* Actualizar */
Route::get('albums/edit/{id}', [AlbumsController::class,'edit'])->name('albums.edit');
Route::put('albums/test/update/{id}', [AlbumsController::class,'update'])->name('albums.test.update');

/* Eliminar */
Route::put('albums/delete/{id}', [AlbumsController::class,'delete'])->name('albums.delete');
/* vista principal*/
Route::get('/albums', [AlbumsController::class,'albums'])->name('albums');

// Rutas CRUD Cantantes
/* Crear */
Route::get('singers/create', [SingersController::class,'create'])->name('singers.create');
Route::match(['post','put'],'singers/store', [SingersController::class,'store'])->name('singers.store');
/* Leer */
Route::get('singers/show/{id}', [SingersController::class,'show'])->name('singers.details');
/* Actualizar */
Route::get('singers/edit/{id}', [SingersController::class,'edit'])->name('singers.edit');
Route::put('singers/test/update/{id}', [SingersController::class,'update'])->name('singers.test.update');

/* Eliminar */
Route::put('singers/delete/{id}', [SingersController::class,'delete'])->name('singers.delete');
/* vista principal*/
Route::get('/singers', [SingersController::class,'Singers'])->name('singers');


// Rutas CRUD Artistas
/* Crear */
Route::get('artists/create', [ArtistsController::class,'create'])->name('artist.create');
Route::match(['post','put'],'Artist/store', [ArtistsController::class,'store'])->name('artist.store');
/* Leer */
Route::get('artists/details/{id}', [ArtistsController::class,'show'])->name('artist.details');
/* Actualizar */
Route::get('artists/edit/{id}', [ArtistsController::class,'edit'])->name('artist.edit');
Route::put('artists/test/update/{id}', [ArtistsController::class,'update'])->name('artist.test.update');

/* Eliminar */
Route::put('artists/delete/{id}', [ArtistsController::class,'delete'])->name('artist.delete');

/* Vista Principal */
Route::get('artist', [ArtistsController::class,'artist'])->name('artist');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
