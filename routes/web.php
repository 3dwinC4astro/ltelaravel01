<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AspiranteController;
use App\Http\Controllers\EgresadoController;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('aspirantes', AspiranteController::class)->middleware('role:administrador|director|docente');


Route::get('/home', [UserController::class, 'index'])->name('users.index');
Route::post('/home/{user}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');
Route::delete('/home/{user}/remove-role/{role}', [UserController::class, 'removeRole'])->name('users.removeRole');

Route::middleware(['auth'])->group(function () {
    Route::get('/aspirantes', [AspiranteController::class, 'index'])->name('aspirantes.index');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('aspirantes', AspiranteController::class);
});

Route::resource('egresados', EgresadoController::class);
