<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiwaliSaleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello', function () {
    return "Hello World!";
});

Route::post('/sale/rule1', [DiwaliSaleController::class, 'getProductItemsRuleOne']);
Route::post('/sale/rule2', [DiwaliSaleController::class, 'getProductItemsRuleTwo']);
Route::post('/sale/rule3', [DiwaliSaleController::class, 'getProductItemsRuleThree']);
