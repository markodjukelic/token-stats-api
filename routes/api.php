<?php

use App\Http\Controllers\tokenStatsController;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'v1'],function(Router $router){
    Route::group(['prefix'=>'tokens'],function(Router $router){
        Route::get('/',[TokenStatsController::class,'all'])->middleware([\App\Http\Middleware\CustomThrottleLimiter::class]);
        Route::get('/{symbol}',[TokenStatsController::class,'get']);
        Route::get("/{symbol}/price-change",[TokenStatsController::class,'priceChange']);
    });



});
