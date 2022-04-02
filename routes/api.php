<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth', [AuthController::class, 'authenticate']);

Route::middleware('auth:sanctum')->group(function() {
    Route::resource('/customers', CustomerController::class);

    Route::resource('/opportunities', OpportunityController::class);

    Route::resource('/sellers', SellerController::class);

    Route::resource('/products', ProductController::class);

    Route::post('/opportunities/{id}/approve', [OpportunityController::class, 'approve']);

    Route::post('/opportunities/{id}/refuse', [OpportunityController::class, 'refuse']);
});


