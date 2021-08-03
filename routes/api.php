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

Route::post('/user/creeate', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/user/allergies', function (Request $request) {
        return $request->user();
    });
    Route::post('/user/allergies', function (Request $request) {
        return $request->user();
    });
    Route::post('/user/recommendations', function (Request $request) {
        return $request->user();
    });
});
Route::post('/system/recommendations', function (Request $request) {
    return $request->user();
});
