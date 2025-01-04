<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NinjaController;

Route::get('/', function () {
    return view('welcome');
});

// INDEX - ALL NINJAS
Route::get('/ninjas', [NinjaController::class, 'index'])->name('ninjas.index');

// CREATE
Route::get('/ninjas/create', [NinjaController::class, 'create'])->name('ninjas.create');

// SHOW - ONE NINJA
Route::get('/ninjas/{id}', [NinjaController::class, 'show'])->name('ninjas.show');

// CREATE
Route::post('/ninjas', [NinjaController::class, 'store'])->name('ninjas.store');

// DELETE 
Route::delete('/ninjas/{id}', [NinjaController::class, 'destroy'])->name('ninjas.destroy');