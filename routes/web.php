<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemQueryController;
use App\Http\Controllers\ItemSetController;

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
})->name('home');

Route::prefix('items')->group(function () {
    Route::get('/{item_id}', [ItemController::class, 'show'])->name('items.show');
    Route::post('/search', [ItemController::class, 'search'])->name('items.search');
});

Route::get('/flip-finder', function () {
    return view('flip-finder');
})->name('flip-finder');

Route::prefix('flip-finder')->group(function () {
    Route::get('/', function() {
        return view('flip-finder');
    })->name('flip-finder');

    Route::get('/highest-profit-margin', [ItemQueryController::class, 'getTopItemsWithHighestProfitMargin'])->name('flip-finder.highest-profit-margin');
});

Route::prefix('profit-calcs')->group(function () {
    Route::get('/', function() {
        return view('profit-calcs');
    })->name('profit-calcs');
    Route::get('/item-sets', [ItemSetController::class, 'index'])->name('profit-calcs.item-sets');
});