<?php

/**
* Este código fue desarrollado por Joselu
* Para cualquier consulta, contactar a contacto@joseluweb.com.ar
*/

use App\Http\Controllers\AutoController;
use App\Http\Controllers\InfraccionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TitularController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* TitularController */
Route::resource('titular', TitularController::class,['name'=> 'titular'])->middleware(['auth', 'verified']);
Route::get('titular/{id}', 'TitularController@show')->name('titular.show')->middleware(['auth', 'verified']);
Route::get('titular/{id}/editar', [TitularController::class,'edit'])->name('titular.edit')->middleware(['auth', 'verified']);
Route::patch('titular/{id}',  [TitularController::class,'update'])->name('titular.update')->middleware(['auth', 'verified']);

/* AutoController */
Route::resource('auto', AutoController::class,['name'=> 'auto'])->middleware(['auth', 'verified']);
Route::get('auto/{id}', 'AutoController@show')->name('auto.show')->middleware(['auth', 'verified']);
Route::get('/auto/{id}/editar', [AutoController::class,'edit'])->name('auto.edit')->middleware(['auth', 'verified']);
Route::patch('auto/{id}',  [AutoController::class,'update'])->name('auto.update')->middleware(['auth', 'verified']);

/* InfraccionController */
Route::resource('infraccion', InfraccionController::class,['name'=> 'infraccion'])->middleware(['auth', 'verified']);
Route::get('infraccion/{id}', 'InfraccionController@show')->name('infraccion.show')->middleware(['auth', 'verified']);
Route::get('infraccion/{id}/editar', [InfraccionController::class,'edit'])->name('infraccion.edit')->middleware(['auth', 'verified']);
Route::patch('infraccion/{id}',  [InfraccionController::class,'update'])->name('infraccion.update')->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';

/**
* Este código fue desarrollado por Joselu
* Para cualquier consulta, contactar a contacto@joseluweb.com.ar
*/
