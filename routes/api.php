<?php

use App\Http\Controllers\Api\V1\Admin\AuthController;
use App\Http\Controllers\Api\V1\Admin\TwoDResultController;
use App\Http\Controllers\Api\V1\Admin\TwoDSessionController;
use App\Http\Controllers\Api\V1\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    // auth
    Route::post('/login', [AuthController::class, 'login']);

    //home page 
    Route::get('/home', [HomeController::class, 'home']);
    Route::get('/calendar', [HomeController::class, 'calendar']);

    Route::group(["middleware" => ['auth:sanctum']], function(){
        //logout
        Route::post('/logout', [AuthController::class, 'logout']);

        //session crud
        Route::resource('twod_sessions', TwoDSessionController::class);
        //result crud
        Route::resource('twod_results', TwoDResultController::class);
    });
});
