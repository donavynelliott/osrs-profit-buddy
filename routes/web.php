<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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
    return view('home');
});

Route::prefix('items')->group(function () {
    Route::get('/{item_id}', [ItemController::class, 'show'])->name('items.show');
    Route::post('/search', [ItemController::class, 'search'])->name('items.search');
});