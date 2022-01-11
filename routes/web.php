<?php

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
//route::get (url,                                                   metedo en el controlador)
Route::get('/index', [App\Http\Controllers\personaController::class,'index']);
Route::get('/crear', [App\Http\Controllers\personaController::class,'crear']);
Route::get('/editar/{id}', [App\Http\Controllers\personaController::class,'editar']);
Route::get('/borrar/{id}', [App\Http\Controllers\personaController::class,'borrar']);

Route::post('/crear', [App\Http\Controllers\personaController::class,'crearPersona'])->name('crear.crearPersona');
Route::post('/editar', [App\Http\Controllers\personaController::class,'editarPersona'])->name('editar.editarPersona');


//ruta de provincias
Route::get('/provincias', [App\Http\Controllers\provinciaController::class,'provincia']);
Route::get('/crearProvincia', [App\Http\Controllers\provinciaController::class,'crearProvincia']);
Route::get('/editarProvincia/{id}', [App\Http\Controllers\provinciaController::class,'editar']);
Route::get('/borrarProvincia/{id}', [App\Http\Controllers\provinciaController::class,'borrarProvincia']);

Route::post('/crearProvincia', [App\Http\Controllers\provinciaController::class,'crear'])->name('crearProvincia.crearProvincia');
Route::post('/editarProvincia', [App\Http\Controllers\provinciaController::class,'editarProvincia'])->name('editarProvincia.editarProvincia');