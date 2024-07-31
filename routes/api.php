<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ColourController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DistinctValueController;
use App\Http\Controllers\EmailCodeController;
use App\Http\Controllers\FuelTypeController;
use App\Http\Controllers\GenerationController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ModelCarController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\TransmissionController;
use App\Http\Controllers\TypeCarController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::name('api.')
    ->middleware('api')->group(function () {
        Route::group(['prefix' => 'auth'], function () {
            Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:300,1');
            Route::post('/register', [AuthController::class, 'register']);

            Route::group(['middleware' => 'jwt'], function () {
                Route::post('/logout', [AuthController::class, 'logout']);
                Route::post('/refresh', [AuthController::class, 'refresh']);
                Route::get('/me', [AuthController::class, 'me']);
            });
        });

        Route::apiResource('image', ImageController::class)->only(['index', 'store', 'show', 'destroy']);

        Route::apiResource('/email-code', EmailCodeController::class)->only(['store']);

        Route::apiResource('/cities', CityController::class)->only(['index']);
        Route::apiResource('/countries', CountryController::class)->only(['index']);

        Route::apiResource('/brands', BrandController::class)->only(['index']);
        Route::apiResource('/model-cars', ModelCarController::class)->only(['index']);
        Route::apiResource('/generations', GenerationController::class)->only(['index']);
        Route::apiResource('/categories', CategoryController::class)->only(['index']);
        Route::apiResource('/fuel-types', FuelTypeController::class)->only(['index']);
        Route::apiResource('/transmissions', TransmissionController::class)->only(['index']);

        Route::apiResource('/options', OptionController::class)->only(['index']);
        Route::apiResource('/type-cars', TypeCarController::class)->only(['index']);

        Route::apiResource('distinct-value', DistinctValueController::class)->only(['index']);

        Route::apiResource('/colours', ColourController::class)->only(['index']);

        Route::apiResource('/operations', OperationController::class)->only(['index', 'store']);

        Route::apiResource('/users', UserController::class)->only(['index', 'show']);

        Route::apiResource('/cars', CarController::class);
    });
