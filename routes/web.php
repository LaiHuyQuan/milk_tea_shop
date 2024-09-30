<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

Route::get('/', function () {
    $default = 1;
    return redirect()->route('store', ['id' => $default]);
})->name('home');

Route::get('store/{id}', [ShopController::class, 'storeMenu'])->name('store');
Route::get('/filter', [ShopController::class, 'filter'])->name('filter');
Route::get('/sort', [ShopController::class, 'sort'])->name('sort');
