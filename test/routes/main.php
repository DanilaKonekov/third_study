<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCardController;
use App\Http\Controllers\SourceItemController;
use App\Http\Middleware\LogMiddleware;


Route::resource('product_cards', ProductCardController::class);
Route::resource('source_items', SourceItemController::class);
Route::post('product_cards/{productCard}/associate/{sourceItem}', [ProductCardController::class, 'associate']);

Route::get('/product_cards', 'ProductCardController@index');

Route::middleware([LogMiddleware::class])->group(function () {
    // маршруты здесь
});

//  должен быть в самом низу
Route::fallback(function (){
    return 'Fallback';
});
