<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaloonController as S;
use Illuminate\Support\Facades\Auth;


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

//Saloon

Route::get('/saloons', [S::class, 'index'])->name('saloons-index');
Route::get('/saloons/create', [S::class, 'create'])->name('saloons-create');
Route::post('/saloons', [S::class, 'store'])->name('saloons-store');
Route::get('/saloons/edit/{saloon}', [S::class, 'edit'])->name('saloons-edit');
Route::put('/saloons/{saloon}', [S::class, 'update'])->name('saloons-update');
Route::delete('/saloons/{saloon}', [S::class, 'destroy'])->name('saloons-delete');
Route::get('/saloons/show/{id}', [S::class, 'show'])->name('saloons-show');
