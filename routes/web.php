<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlatosController;

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

/* Route::get('/platos', function () {
    return view('platos.index');
});

Route::get('/platos/create',[PlatosController::class,'create']); */

Route::resource('platos',PlatosController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
