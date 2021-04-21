<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name('index');
Route::post('/etudiant', [App\Http\Controllers\User\EtudiantController::class, 'store'])->name('etudiant.store');

Auth::routes();

Route::resource('/home', App\Http\Controllers\Admin\HomeController::class);
Route::resource('/filliere', App\Http\Controllers\Admin\FilliereController::class);
Route::resource('/etablissement', App\Http\Controllers\Admin\EtablissementController::class);
Route::resource('/membre', App\Http\Controllers\Admin\MembreController::class);
