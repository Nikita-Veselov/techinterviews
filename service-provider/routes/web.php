<?php

use Illuminate\Support\Facades\Route;


Route::get('/providers', [\App\Http\Controllers\ServiceProvider::class, 'index'])->name('providers.index');
Route::get('/providers/{id}', [\App\Http\Controllers\ServiceProvider::class, 'show'])->name('providers.show');
