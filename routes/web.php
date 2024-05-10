<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DeliveryController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')->group(function () {
    Route::get('delivery/send', [DeliveryController::class, 'send'])->name('delivery.send');
});
