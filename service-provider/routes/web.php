<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ServiceProvider;

Route::get('/', function () {
    return redirect()->route('providers.index');
});
Route::get('/providers', [ServiceProvider::class, 'index'])->name('providers.index');
Route::get('/providers/{provider}', [ServiceProvider::class, 'show'])->name('providers.show');
