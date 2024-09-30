<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

Route::get('/', [ShopController::class, 'storeMenu'])->defaults('id', 1)->name('home');

Route::get('store/{id}', [ShopController::class, 'storeMenu'])->name('store');
Route::get('/filter', [ShopController::class, 'filter'])->name('filter');
Route::get('/sort', [ShopController::class, 'sort'])->name('sort');
