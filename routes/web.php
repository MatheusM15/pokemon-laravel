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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->get('/marca',function(){
    return view('marca');
});

Route::middleware('auth')->get('/pokemon',function(){
    return view('pokemon');
})->name('pokemon');

Route::middleware('auth')->get('/treinador',function(){
    return view('treinador');
})->name('treinador');

Route::middleware('auth')->get('/perfil/{id}',function(){
    return view('perfil');
});