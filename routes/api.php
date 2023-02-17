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
    //    USERS
    Route::apiResource(
        "users",
        \App\Http\Controllers\API\UserController::class
    );
    Route::post(
        "getUserByEmail",
        "\App\Http\Controllers\API\UserController@getUserByEmail"
    );

    //    CUSTOMERS
    Route::apiResource(
        "customers",
        \App\Http\Controllers\API\CustomerController::class
    );
    Route::post(
        "customers/bulkDelete",
        "App\Http\Controllers\API\CustomerController@bulkDelete"
    );
    Route::post(
        "customers/getProjectsForCustomer",
        "App\Http\Controllers\API\CustomerController@getProjectsForCustomer"
    );

    //    SUPPLIERS
    Route::apiResource(
        "suppliers",
        \App\Http\Controllers\API\SupplierController::class
    );

    //    PURCHASES
    Route::apiResource(
        "purchases",
        \App\Http\Controllers\API\PurchaseController::class
    );

    //    PURCHASE ITEMS
    Route::apiResource(
        "purchase-items",
        \App\Http\Controllers\API\PurchaseItemController::class
    );

    //    UNITS
    Route::apiResource(
        "units",
        \App\Http\Controllers\API\UnitController::class
    );

    //    PRODUCTS
    Route::apiResource(
        "products",
        \App\Http\Controllers\API\ProductController::class
    );

    //    PROJECT TYPES
    Route::apiResource(
        "project-types",
        \App\Http\Controllers\API\ProjectTypeController::class
    );
    Route::post(
        "project-types/bulkDelete",
        "App\Http\Controllers\API\ProjectTypeController@bulkDelete"
    );

    //    PROJECTS
    Route::apiResource(
        "projects",
        \App\Http\Controllers\API\ProjectController::class
    );
    Route::post(
        "projects/bulkDelete",
        "App\Http\Controllers\API\ProjectController@bulkDelete"
    );

    //    SITE CONFIG
    Route::apiResource(
        "site-configs",
        \App\Http\Controllers\API\SiteConfigController::class
    );
    Route::get(
        "getSiteConfig",
        "\App\Http\Controllers\API\SiteConfigController@getSiteConfig"
    );

    Route::get(
        "refresh",
        "App\\Http\\Controllers\\API\\LoginController@refresh"
    );
});
