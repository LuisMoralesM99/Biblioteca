<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\HomeController;
Use App\Http\Controllers\LibrosController;
Use App\Http\Controllers\UsuariosController;
Use App\Http\Controllers\PrestamosController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/principal', [HomeController::class,'index']);

Route::post('/principal/create/libro', [LibrosController::class,'store']);
Route::put('/principal/edit/libro/{id}', [LibrosController::class,'update']);
Route::delete('/principal/delete/libro/{id}', [LibrosController::class,'destroy']);

Route::post('/principal/create/usuario', [UsuariosController::class,'store']);
Route::put('/principal/edit/usuario/{id}', [UsuariosController::class,'update']);
Route::delete('/principal/delete/usuario/{id}', [UsuariosController::class,'destroy']);

Route::post('/principal/create/prestamo', [PrestamosController::class,'store']);
Route::put('/principal/edit/prestamo/{id}', [PrestamosController::class,'update']);
Route::delete('/principal/delete/prestamo/{id}', [PrestamosController::class,'destroy']);

