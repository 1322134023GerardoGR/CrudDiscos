<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\AlbumController;
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
Route::get('albums/create', [AlbumController::class,'create'])->name('albums.create');
Route::match(['post','put'],'albums/store', [AlbumController::class,'store'])->name('albums.store');
/* Leer */
Route::get('albums/details/{id}', [AlbumController::class,'show'])->name('albums.details');
/* Actualizar */
Route::get('albums/edit/{id}', [AlbumController::class,'edit'])->name('albums.edit');
Route::put('albums/test/update/{id}', [AlbumController::class,'update'])->name('albums.test.update');

/* Eliminar */
Route::put('albums/delete/{id}', [AlbumController::class,'delete'])->name('albums.delete');
/* vista principal*/
Route::get('/albums', [AlbumController::class,'albums'])->name('albums');

// Rutas CRUD Cantantes
/* Crear */
Route::get('singers/create', [SingerController::class,'create'])->name('singers.create');
Route::match(['post','put'],'singers/store', [SingerController::class,'store'])->name('singers.store');
/* Leer */
Route::get('singers/show/{id}', [SingerController::class,'show'])->name('singers.details');
/* Actualizar */
Route::get('singers/edit/{id}', [SingerController::class,'edit'])->name('singers.edit');
Route::put('singers/test/update/{id}', [SingerController::class,'update'])->name('singers.test.update');

/* Eliminar */
Route::put('singers/delete/{id}', [SingerController::class,'delete'])->name('singers.delete');
/* vista principal*/
Route::get('/singers', [SingerController::class,'Singers'])->name('singers');


// Rutas CRUD Artistas
/* Crear */
Route::get('artists/create', [ArtistController::class,'create'])->name('artist.create');
Route::match(['post','put'],'Artist/store', [ArtistController::class,'store'])->name('artist.store');
/* Leer */
Route::get('artists/details/{id}', [ArtistController::class,'show'])->name('artist.details');
/* Actualizar */
Route::get('artists/edit/{id}', [ArtistController::class,'edit'])->name('artist.edit');
Route::put('artists/test/update/{id}', [ArtistController::class,'update'])->name('artist.test.update');

/* Eliminar */
Route::put('artists/delete/{id}', [ArtistController::class,'delete'])->name('artist.delete');

/* Vista Principal */
Route::get('artist', [ArtistController::class,'artist'])->name('artist');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
