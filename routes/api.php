<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("login", "App\\Http\\Controllers\\API\\LoginController@login");

Route::middleware("auth:api")->group(function () {
    Route::apiResource(
        "users",
        \App\Http\Controllers\API\UserController::class
    );
    Route::apiResource(
        "customers",
        \App\Http\Controllers\API\CustomerController::class
    );
    Route::apiResource(
        "suppliers",
        \App\Http\Controllers\API\SupplierController::class
    );
    Route::apiResource(
        "purchases",
        \App\Http\Controllers\API\PurchaseController::class
    );
    Route::apiResource(
        "purchase-items",
        \App\Http\Controllers\API\PurchaseItemController::class
    );
    Route::apiResource(
        "units",
        \App\Http\Controllers\API\UnitController::class
    );
    Route::apiResource(
        "products",
        \App\Http\Controllers\API\ProductController::class
    );
    Route::apiResource(
        "project-types",
        \App\Http\Controllers\API\ProjectTypeController::class
    );
    Route::apiResource(
        "projects",
        \App\Http\Controllers\API\ProjectController::class
    );

    Route::get(
        "refresh",
        "App\\Http\\Controllers\\API\\LoginController@refresh"
    );
});
