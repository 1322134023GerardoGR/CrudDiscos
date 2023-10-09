<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/data', 'App\Http\Controllers\apiController@getData');
Route::get('/discos', 'App\Http\Controllers\apiController@index'); //muestra todos los registros
Route::post('/discos', 'App\Http\Controllers\apiController@store'); // crea un registro
Route::put('/discos/{id}', 'App\Http\Controllers\apiController@update'); // actualiza un registro
Route::delete('/discos/{id}', 'App\Http\Controllers\apiController@destroy'); //elimina un registro
