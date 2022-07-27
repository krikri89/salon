<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaloonController as S;
use App\Http\Controllers\ServiceController as Serv;
use App\Http\Controllers\MasterController as M;
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

Route::get('/saloons', [S::class, 'index'])->name('saloons-index')->middleware('roleblade:user');
Route::get('/saloons/create', [S::class, 'create'])->name('saloons-create')->middleware('roleblade:admin');
Route::post('/saloons', [S::class, 'store'])->name('saloons-store')->middleware('roleblade:admin');
Route::get('/saloons/edit/{saloon}', [S::class, 'edit'])->name('saloons-edit')->middleware('roleblade:admin');
Route::put('/saloons/{saloon}', [S::class, 'update'])->name('saloons-update')->middleware('roleblade:admin');
Route::delete('/saloons/{saloon}', [S::class, 'destroy'])->name('saloons-delete')->middleware('roleblade:admin');
Route::get('/saloons/show/{id}', [S::class, 'show'])->name('saloons-show')->middleware('roleblade:user');

//Services
Route::get('/services', [Serv::class, 'index'])->name('services-index')->middleware('roleblade:user');
Route::get('/services/create', [Serv::class, 'create'])->name('services-create')->middleware('roleblade:admin');
Route::post('/services', [Serv::class, 'store'])->name('services-store')->middleware('roleblade:admin');
Route::get('/services/edit/{service}', [Serv::class, 'edit'])->name('services-edit')->middleware('roleblade:admin');
Route::put('/services/{service}', [Serv::class, 'update'])->name('services-update')->middleware('roleblade:admin');
Route::delete('/services/{service}', [Serv::class, 'destroy'])->name('services-delete')->middleware('roleblade:admin');
Route::get('/services/show/{id}', [Serv::class, 'show'])->name('services-show')->middleware('roleblade:user');

//Masters
Route::get('/masters', [M::class, 'index'])->name('masters-index')->middleware('roleblade:user');
Route::get('/masters/create', [M::class, 'create'])->name('masters-create')->middleware('roleblade:admin');
Route::post('/masters', [M::class, 'store'])->name('masters-store')->middleware('roleblade:admin');
Route::get('/masters/edit/{master}', [M::class, 'edit'])->name('masters-edit')->middleware('roleblade:admin');
Route::put('/masters/{master}', [M::class, 'update'])->name('masters-update')->middleware('roleblade:admin');
Route::delete('/masters/{master}', [M::class, 'destroy'])->name('masters-delete')->middleware('roleblade:admin');
Route::get('/masters/show/{id}', [M::class, 'show'])->name('masters-show')->middleware('roleblade:user');
