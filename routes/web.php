<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TiendaController;
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

// Rutas CRUD
/* Crear */
Route::get('Tienda/crear', [TiendaController::class,'crear'])->name('Tienda/crear');
Route::put('Tienda/store', [TiendaController::class,'store'])->name('Tienda/store');

/* Leer */
Route::get('Tienda/show/{id}', [TiendaController::class,'show'])->name('Tienda/detalles');

/* Actualizar */
Route::get('Tienda/actualizar/{id}', [TiendaController::class,'actualizar'])->name('Tienda/actualizar');
Route::put('Tienda/prueba/update/{id}', [TiendaController::class,'update'])->name('Tienda/prueba/update');

/* Eliminar */
Route::put('Tienda/eliminar/{id}', [TiendaController::class,'eliminar'])->name('Tienda/eliminar');

/* Vista Principal */
Route::get('/Tienda', [TiendaController::class,'index'])->name('Tienda/');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
