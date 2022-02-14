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

Route::get('/', function () {
    return view('welcome');
});

//estas rutas son generadas por la instalación de UI, se comentan ya que no se va a usar el backend de UI sino el de Fortify (con las vistas modificadas de UI)
// Auth::routes()

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
