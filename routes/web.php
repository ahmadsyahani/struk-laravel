<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StrukController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/struk/create', [StrukController::class, 'create'])->name('struk.create');
Route::post('/struk/store', [StrukController::class, 'store'])->name('struk.store');
